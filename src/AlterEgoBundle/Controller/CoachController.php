<?php

namespace AlterEgoBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class CoachController extends Controller
{
    /**
     * @Route("/coach")
     */
    public function coachAction()
    {
        return $this->render('AlterEgoBundle:Coach:coach.html.twig');
    }
    
    /**
     * @Route("/coach/activite")
     */
    public function coachActiviteAction()
    {
        return $this->render('AlterEgoBundle:Coach:coach_activite.html.twig');
    }
}