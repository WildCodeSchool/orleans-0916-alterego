<?php

namespace AlterEgoBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class DefaultController extends Controller
{
    
    /**
     * @Route("/coach")
     */
    public function coachAction()
    {
        return $this->render('AlterEgoBundle:Coach:coach.html.twig');
    }

    /**
     * @Route("/rh")
     */
    public function rhAction()
    {
        return $this->render('AlterEgoBundle:RH:rh.html.twig');
    }
}