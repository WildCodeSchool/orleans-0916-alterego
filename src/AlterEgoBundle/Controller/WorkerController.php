<?php

namespace AlterEgoBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use FOS\RestBundle\Controller\Annotations\Route;
use Symfony\Component\DependencyInjection\ContainerAware;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;
use FOS\UserBundle\Model\UserInterface;
use AlterEgoBundle\Entity\Creneau;
use AlterEgoBundle\Entity\Activite;
use AlterEgoBundle\entity\Reservation;

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
        $user = $this->getUser();
        $em = $this->getDoctrine()->getManager();
        $reservations = $em->getRepository('AlterEgoBundle:Reservation')->findByUser($user);
        foreach($reservations as $reservation) {
            if (!isset($nextResa)) {
                $nextResa = $reservation;
            }
            //$resaDate = $reservation->getCreneau()->getDateheure();
            if ($nextResa->getCreneau()->getDateheure() < $reservation->getCreneau()->getDateheure() ) {
                $nextResa = $reservation;
            }
        }
        return $this->render('AlterEgoBundle:Worker:worker.html.twig', array(
            'reservation' => $nextResa
        ));

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
        
        $user = $this->container->get('security.context')->getToken()->getUser();
        if (!is_object($user) || !$user instanceof UserInterface) {
            throw new AccessDeniedException('This user does not have access to this section.');
        }

        $form = $this->container->get('fos_user.profile.form');
        $formHandler = $this->container->get('fos_user.profile.form.handler');

        $process = $formHandler->process($user);
        if ($process) {
            $this->setFlash('fos_user_success', 'profile.flash.updated');

            return new RedirectResponse($this->getRedirectionUrl($user));
        }

        return $this->container->get('templating')->renderResponse(
            'AlterEgoBundle:Worker:settings.html.'.$this->container->getParameter('fos_user.template.engine'),
            array('form' => $form->createView())
        );
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
        $em = $this->getDoctrine()->getManager();
        $seances = $em->getRepository('AlterEgoBundle:Creneau')->findAll();
        return $this->render('AlterEgoBundle:Worker:seances.html.twig', array(
            'seances' => $seances,
        ));
    }



}
