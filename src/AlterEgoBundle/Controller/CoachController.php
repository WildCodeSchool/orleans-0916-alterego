<?php

namespace AlterEgoBundle\Controller;

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

        $form = $this->createForm('AlterEgoBundle\Form\CheckType');
        $form->handleRequest($request);

        $em = $this->getDoctrine()->getManager();
        $seances = $em->getRepository('AlterEgoBundle:Activite')->findByUser($user);

        if ($seances) {
            $date = new \DateTime();
            foreach ($seances as $seance) {
                if (!isset($nextSeance)) {
                    $nextSeance = $seance;
                }

                if ($nextSeance->getActivite()->getDateheure() > $seance->getActivite()->getDateheure() && ($seance->getActivite()->getDateheure() >= $date)) {
                    $nextSeance = $seance;
                }
            }

            if ($form->isSubmitted() && $form->isValid()) {
                $em = $this->getDoctrine()->getManager();
                $em->persist($nextSeance);
                $em->flush($seances);
            }

            return $this->render('AlterEgoBundle:Coach:coach.html.twig', array(
                'seance' => $nextSeance,
                'form' => $form->createView(),
            ));

        }

        else {
            return $this->render('AlterEgoBundle:Coach:coach.html.twig', array(
                'seance' => $seances,));
        }


//        if($seances){
//            $date = new \DateTime();
//            foreach($seances as $seance) {
//                if (!isset($nextSeance)) {
//                    $nextSeance = $seance;
//                }
//                if ($nextSeance->getCreneau()->getDateheure() > $seance->getCreneau()->getDateheure() && ($seance->getCreneau()->getDateheure() >= $date)) {
//                    $nextSeance = $seance;
//                }
//            }
//
//            if ($form->isSubmitted() && $form->isValid()) {
//                $em = $this->getDoctrine()->getManager();
//                $em->persist($nextSeance);
//                $em->flush($nextSeance);
//
//            }
//
//            return $this->render('AlterEgoBundle:Coach:coach.html.twig', array(
//                'seance' => $nextSeance,
//                'form' => $form->createView(),
//            ));
//        } else {
//
//            return $this->render('AlterEgoBundle:Coach:coach.html.twig', array(
//                'seance' => $seances,));
//
//        }
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