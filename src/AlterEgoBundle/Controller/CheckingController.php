<?php

namespace AlterEgoBundle\Controller;

use AlterEgoBundle\AlterEgoBundle;
use Application\Sonata\UserBundle\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\DependencyInjection\ContainerAware;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;
use FOS\UserBundle\Model\UserInterface;
use AlterEgoBundle\Entity\Creneau;
use AlterEgoBundle\Entity\Activite;
use AlterEgoBundle\Entity\Reservation;
use Symfony\Component\HttpFoundation\Request;
use AlterEgoBundle\Calendar\CalendarEvent;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\Validator\Constraints\DateTime;
use AlterEgoBundle\Form\CheckType;
use AlterEgoBundle\Form\StartType;

class CheckingController extends Controller
{

    /**
     * @Route("/coach/checking/{id}", name="checking")
     * @Method({"GET"})
     */
    public function checking(Creneau $creneau)
    {
        $em = $this->getDoctrine()->getManager();
        $reservations = $em->getRepository('AlterEgoBundle:Reservation')->findByCreneau($creneau);
        $nbPresents = 0;
        $nbInscrits =0;
            foreach ($reservations as $reservation){
                if ($reservation->getIspresent() == 1 or $reservation->getIspresent() == 2){
                    $nbPresents++;
                }
                $nbInscrits++;
            }

        return $this->render('AlterEgoBundle:Coach:checking.html.twig', array(
            'seance' => $creneau,
            'nbPresents' => $nbPresents,
            'nbInscrits' => $nbInscrits,
        ));
    }

    /**
     * @Route("/coach/checking/user-info/{id}", name="user_checking")
     * @Method({"GET"})
     */
    public function userInfoCheckingAction(User $user)
    {
        $em = $this->getDoctrine()->getManager();
        $user = $em->getRepository('ApplicationSonataUserBundle:User')->find($user->getId());
        return $this->render('AlterEgoBundle:Coach:userInfoChecking.html.twig', array(
            'user' => $user,
        ));
    }

    /**
     * @Route("/checking/valid/{id}", name="checking_worker")
     * @Method({"GET"})
     */
    public function checkingWorker(Reservation $reservation)
    {

        $em = $this->getDoctrine()->getManager();
        $reservation->setIspresent(2);
        $em->persist($reservation);
        $em->flush();

        return $this->redirectToRoute('checking', [
            'id' => $reservation->getCreneau()->getId()
        ]);
    }

    /**
     * @Route("/checking/afk/{id}", name="afk_worker")
     * @Method({"GET"})
     */
    public function checkingAfkWorker(Reservation $reservation)
    {

        $em = $this->getDoctrine()->getManager();
        $reservation->setIspresent(3);
        $em->persist($reservation);
        $em->flush();

        return $this->redirectToRoute('checking', [
            'id' => $reservation->getCreneau()->getId()
        ]);
    }
}