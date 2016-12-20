<?php

namespace AlterEgoBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use FOS\RestBundle\Controller\Annotations\Route;

class WorkerController extends Controller
{
    /**
     * @Route("/worker", name="worker")
     */
    public function workerAction()
    {
        return $this->render('AlterEgoBundle:Worker:worker.html.twig');
    }

    /**
     * @Route("/worker/badges", name="badges")
     */
    public function badgesAction()
    {
        return $this->render('AlterEgoBundle:Worker:badges.html.twig');
    }

    /**
     * @Route("/worker/friends", name="friends")
     */
    public function friendsAction()
    {
        return $this->render('AlterEgoBundle:Worker:friends.html.twig');
    }

    /**
     * @Route("/worker/settings", name="settings")
     */
    public function settingsAction()
    {
        return $this->render('AlterEgoBundle:Worker:settings.html.twig');
    }

    /**
     * @Route("/worker/performances", name="performances")
     */
    public function performancesAction()
    {
        return $this->render('AlterEgoBundle:Worker:performances.html.twig');
    }

    /**
     * @Route("/worker/reservation", name="reservation")
     */
    public function reservationAction()
    {
        return $this->render('AlterEgoBundle:Worker:reservation.html.twig');
    }

    /**
     * @Route("/worker/seances", name="seances")
     */
    public function seancesAction()
    {
        return $this->render('AlterEgoBundle:Worker:seances.html.twig');
    }

}
