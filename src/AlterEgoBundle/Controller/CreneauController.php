<?php

namespace AlterEgoBundle\Controller;

use AlterEgoBundle\Entity\Activite;
use AlterEgoBundle\Entity\Creneau;
use AlterEgoBundle\Entity\InfoEmploye;
use AlterEgoBundle\Entity\Reservation;
use AlterEgoBundle\Entity\TestPerf;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;


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
     * @Route("/{id}", name="creneau_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Creneau $creneau)
    {
        $form = $this->createDeleteForm($creneau);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($creneau);
            $em->flush($creneau);
        }

        return $this->redirectToRoute('creneau_index');
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
            ->setAction($this->generateUrl('creneau_delete', array('id' => $creneau->getId())))
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

        $testPerf = new TestPerf();

        if ($form->isSubmitted() && $form->isValid()) {

            $testPerf->setReservation($reservation);
            $testid = $testPerf->getId();

            $user = $this->getUser();

            $reservation->setTestsPerf($testid);
            $reservation->setCreneau($creneau);
            $reservation->setUser($user);

            $em = $this->getDoctrine()->getManager();
            $em->persist($reservation);
            $em->persist($testPerf);

            $em->flush();

            return $this->redirectToRoute('reservation_show', array('id' => $reservation->getId()));
        }

        return $this->render('activite/show_worker.html.twig', array(
            'seance' => $seance,
        ));
    }
    
    
}
