<?php

namespace AlterEgoBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use FOS\RestBundle\Controller\Annotations\Route;

class WorkerController extends Controller
{
    /**
     * @Route("/worker")
     */
    public function workerAction()
    {
        return $this->render('AlterEgoBundle:Worker:worker.html.twig');
    }

}
