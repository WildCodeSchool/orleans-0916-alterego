<?php

namespace AlterEgoBundle\Controller;

use AlterEgoBundle\AlterEgoBundle;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\DependencyInjection\ContainerAware;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;
use FOS\UserBundle\Model\UserInterface;
use AlterEgoBundle\Entity\Creneau;
use AlterEgoBundle\Entity\Activite;
use AlterEgoBundle\entity\Reservation;
use Symfony\Component\HttpFoundation\Request;
use AlterEgoBundle\Calendar\CalendarEvent;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\Validator\Constraints\DateTime;
use AlterEgoBundle\Form\CheckType;
use AlterEgoBundle\Form\StartType;

/**
 * @Route("/coach", name="coach")
 */
class CoachController extends Controller
{
    /**
     * @Route("/")
     */
    public function coachAction(Request $request)
    {
        $user = $this->getUser();
        $form = $this->createForm('AlterEgoBundle\Form\StartType');
        $form->handleRequest($request);
        $em = $this->getDoctrine()->getManager();
        $activites = $em->getRepository('AlterEgoBundle:Activite')->findByUser($user);      


        if ($activites) {
            foreach ($activites as $activite) {
                foreach ($activite->getCreneaux() as $seance) {
                    $date = new \DateTime();
                    if (!isset($nextSeance)) {
                        $nextSeance = $seance;
                    }

                    if ($nextSeance->getDateheure() > $seance->getDateheure() && ($seance->getDateheure() >= $date)) {
                        $nextSeance = $seance;
                    }
                }
            }
            if ($form->isSubmitted() && $form->isValid()) {
                $em = $this->getDoctrine()->getManager();
                $nextSeance->setStartseance(1);
                $em->persist($nextSeance);
                $em->flush($nextSeance);
                return $this->redirectToRoute('checking', array('id_seance' => $nextSeance->getId() ));
            }
                return $this->render('AlterEgoBundle:Coach:coach.html.twig', array(
                    'seance' => $nextSeance,
                    'form' => $form->createView(),
                    'activites' => $activites,
                ));
        }
        else {
            return $this->render('AlterEgoBundle:Coach:coach.html.twig', array(
                'seance' => $activites,
                ));
        }
    }


    /**
     * @Route("/checking/{id_seance}", name="checking")
     * @Method({"GET", "POST"})
     */
    public function checking($id_seance, Request $request)
    {
        $form = $this->createForm('AlterEgoBundle\Form\CheckType');
        $form->handleRequest($request);

        $em = $this->getDoctrine()->getManager();
        $reservations =$em->getRepository('AlterEgoBundle:Reservation')->findByCreneau($id_seance);
        $seance = $em->getRepository('AlterEgoBundle:Creneau')->findOneById($id_seance);
//        $reservation =

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $reservations->setIspresent(1);
            $em->persist($reservations);
            $em->flush($reservations);

        }

        return $this->render('AlterEgoBundle:Coach:checking.html.twig', array(
            'reservations' => $reservations,
            'seance' => $seance,
            'form' => $form->createView(),
        ));
    }



    /**
     * @Route("/activite")
     */
    public function coachActiviteAction()
    {
        return $this->render('AlterEgoBundle:Coach:coach_activite.html.twig');
    }

    /**
     * @Route("/planning")
     */
    public function coachPlanningAction()
    {
        $em = $this->getDoctrine()->getManager();
        $activites = $em->getRepository('AlterEgoBundle:Activite')->findByUser($this->getUser());


        return $this->render('AlterEgoBundle:Coach:planning.html.twig', array(
            'activites' => $activites
        ));
    }
}