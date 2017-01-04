<?php

namespace AlterEgoBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use FOS\RestBundle\Controller\Annotations\Route;

/**
 * @Route("/worker", name="worker")
 */
class WorkerController extends Controller
{
    /**
     * @Route("/", name="worker_index")
     */
    public function workerAction()
    {
        return $this->render('AlterEgoBundle:Worker:worker.html.twig');
    }

    /**
     * @Route("/badges", name="badges")
     */
    public function badgesAction()
    {
        return $this->render('AlterEgoBundle:Worker:badges.html.twig');
    }

    /**
     * @Route("/friends", name="friends")
     */
    public function friendsAction()
    {
        return $this->render('AlterEgoBundle:Worker:friends.html.twig');
    }

    /**
     * @Route("/settings", name="settings")
     */
    public function settingsAction()
    {
        return $this->render('AlterEgoBundle:Worker:settings.html.twig');
    }

    /**
     * @Route("/performances", name="performances")
     */
    public function performancesAction()
    {
        return $this->render('AlterEgoBundle:Worker:performances.html.twig');
    }

    /**
     * @Route("/reservation", name="reservation")
     */
    public function reservationAction()
    {
        return $this->render('AlterEgoBundle:Worker:reservation.html.twig');
    }

    /**
     * @Route("/seances", name="seances")
     */
    public function seancesAction()
    {
        $em=$this->getDoctrine()->getManager();
        $seances=$em->getRepository('AlterEgoBundle:Activite')->findAll();
        
        return $this->render('AlterEgoBundle:Worker:seances.html.twig', array(
            'seances' => $seances));
    }

}
