<?php

namespace AlterEgoBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class DefaultController extends Controller
{
    /**
     * @Route("/worker")
     */
    public function workerAction()
    {
        return $this->render('AlterEgoBundle:Worker:worker.html.twig');
    }

    /**
     * @Route("/coach")
     */
    public function coachAction()
    {
        return $this->render('AlterEgoBundle:Coach:coach.html.twig');
    }
}