<?php

namespace AlterEgoBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use FOS\RestBundle\Controller\Annotations\Route;

class WorkerController extends Controller
{
    /**
     * @Route("/worker", name="route_worker")
     */
    public function workerAction()
    {
        return $this->render('AlterEgoBundle:Worker:worker.html.twig');
    }

    /**
     * @Route("/worker/badges")
     */
    public function badgesAction()
    {
        return $this->render('AlterEgoBundle:Worker:badges.html.twig');
    }

    /**
     * @Route("/worker/friends")
     */
    public function friendsAction()
    {
        return $this->render('AlterEgoBundle:Worker:friends.html.twig');
    }

    /**
     * @Route("/worker/settings")
     */
    public function settingsAction()
    {
        return $this->render('AlterEgoBundle:Worker:settings.html.twig');
    }

}
