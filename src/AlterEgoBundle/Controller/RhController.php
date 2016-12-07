<?php

namespace AlterEgoBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class RhController extends Controller
{

    /**
     * @Route("/rh")
     */
    public function rhAction()
    {
        return $this->render('AlterEgoBundle:RH:rh.html.twig');
    }
}