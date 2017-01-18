<?php

namespace AlterEgoBundle\Controller;

use AlterEgoBundle\Entity\Activite;
use AlterEgoBundle\Entity\Creneau;
use AlterEgoBundle\Entity\InfoEmploye;
use AlterEgoBundle\Entity\Reservation;
use AlterEgoBundle\Form\CreneauType;
use Doctrine\ORM\Event\PostFlushEventArgs;
use AlterEgoBundle\Entity\TestPerf;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\Flash\FlashBag;
use AlterEgoBundle\Form\ArchiveType;


/**
 * Creneau controller.
 *
 * @Route("creneau")
 */
class CreneauController extends Controller
{
    /**
     * Lists all creneau entities.
     *
     * @Route("/", name="creneau_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();
        $creneaus = $em->getRepository('AlterEgoBundle:Creneau')->findAll();

        return $this->render('creneau/index.html.twig', array(
            'creneaus' => $creneaus,
        ));
    }

    /**
     * Creates a new creneau entity.
     *
     * @Route("/new/{id}", name="creneau_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request, Activite $activite)
    {
        $creneau = new Creneau();
        $form = $this->createForm('AlterEgoBundle\Form\CreneauType', $creneau);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($creneau);
            $capacite = $creneau->getCapacite();
            $creneau->setPlacerestantes($capacite);
            $creneau->setActivite($activite);
            $em->flush($creneau);

            return $this->redirectToRoute('creneau_show', array('id' => $creneau->getId()));
        }

        return $this->render('creneau/new.html.twig', array(
            'creneau' => $creneau,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a creneau entity.
     *
     * @Route("/{id}", name="creneau_show")
     * @Method("GET")
     */
    public function showAction(Creneau $creneau)
    {
        $deleteForm = $this->createDeleteForm($creneau);

        return $this->render('creneau/show.html.twig', array(
            'creneau' => $creneau,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing creneau entity.
     *
     * @Route("/{id}/edit", name="creneau_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Creneau $creneau)
    {
        $deleteForm = $this->createDeleteForm($creneau);
        $editForm = $this->createForm('AlterEgoBundle\Form\CreneauType', $creneau);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('creneau_edit', array('id' => $creneau->getId()));
        }

        return $this->render('creneau/edit.html.twig', array(
            'creneau' => $creneau,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a creneau entity.
     *
     * @Route("/{id}", name="creneau_archive")
     * @Method({"GET", "POST", "DELETE"})
     */
    public function archiveAction(Request $request, Creneau $creneau)
    {
        $form = $this->createDeleteForm($creneau);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $creneau = $em->getRepository('AlterEgoBundle:Creneau')->findById(array(
                'archive'=>$creneau->getArchive()
            ));
            $em->setArchive(1);
            $em->persist($creneau);
            $em->flush($creneau);
            return $this->redirectToRoute('reservation_show');
        }

        return $this->redirectToRoute('reservation_show');
    }

    /**
     * Creates a form to delete a creneau entity.
     *
     * @param Creneau $creneau The creneau entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Creneau $creneau)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('creneau_archive', array('id' => $creneau->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }

    /**
     * Finds and displays a activite entity.
     *
     * @Route("/worker/{id}", name="seance_show")
     * @Method({"GET", "POST"})
     */
    public function seancesShowAction(Request $request, Creneau $creneau)
    {

        $em = $this->getDoctrine()->getManager();
        $seance = $em->getRepository('AlterEgoBundle:Creneau')->findById($creneau);

        $reservation = new Reservation();
        $form = $this->createForm('AlterEgoBundle\Form\ReservationType', $reservation);
        $form->handleRequest($request);

        $user = $this->getUser();

        if ($form->isSubmitted() && $form->isValid() && $creneau->getPlacerestantes() > 0) {

            $testPerf = new TestPerf();
            $em->persist($testPerf);
            $testPerf->setReservation($reservation);
            $placerestantes = $creneau->getPlacerestantes();
            $creneau->setPlacerestantes($placerestantes - 1);
            $reservation->setTestsPerf($testPerf);
            $reservation->setCreneau($creneau);
            $reservation->setUser($user);

            $em = $this->getDoctrine()->getManager();
            $em->persist($reservation);

            $em->flush();

            $request->getSession()
                ->getFlashBag()
                ->add('success', 'Votre réservation a bien été prise en compte!')
            ;

            return $this->redirectToRoute('reservation_show', array('id' => $reservation->getId()));
        }

        return $this->render('activite/show_worker.html.twig', array(
            'seance' => $seance,
        ));
    }
}
