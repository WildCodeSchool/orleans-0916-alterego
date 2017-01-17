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
use AlterEgoBundle\Entity\Reservation;
use Symfony\Component\HttpFoundation\Request;
use AlterEgoBundle\Calendar\CalendarEvent;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\Validator\Constraints\DateTime;
use AlterEgoBundle\Form\CheckType;
use AlterEgoBundle\Form\RatingType;

/**
 * @Route("/worker", name="worker")
 */
class WorkerController extends Controller
{
    /**
     * @Route("/", name="worker_index")
     * @Method({"GET", "POST"})
     */
    public function workerAction(Request $request)
    {
        $user = $this->getUser();
        $em = $this->getDoctrine()->getManager();
        $reservations = $em->getRepository('AlterEgoBundle:Reservation')->findByUser($user);

        $form = $this->createForm('AlterEgoBundle\Form\CheckType');
        $form->handleRequest($request);

        if($reservations){

            $date = new \DateTime();
            $date = $date->getTimestamp();

            foreach($reservations as $reservation) {

                $resaStamp = $reservation->getCreneau()->getDateheure()->getTimestamp() + ($reservation->getCreneau()->getDuree() * 60);

                if (!isset($nextResa) && ($resaStamp >= $date)) {
                    $nextResa = $reservation;
                }

                if (isset($nextResa) && $nextResa->getCreneau()->getDateheure() > $reservation->getCreneau()->getDateheure() && $resaStamp >= $date) {
                    $nextResa = $reservation;
                }
            }
        }

        if ($form->isSubmitted() && $form->isValid() && isset($nextResa)) {
            $em = $this->getDoctrine()->getManager();
            $nextResa->setIspresent(1);
            $em->persist($nextResa);
            $em->flush($nextResa);

        }

        if (isset($nextResa)){return $this->render('AlterEgoBundle:Worker:worker.html.twig', array(
            'reservation' => $nextResa,
            'enattente' => $reservations,
            'form' => $form->createView(),
            ));

        } else {
            return $this->render('AlterEgoBundle:Worker:worker.html.twig', array(
                'reservation' => [],
                'form' => $form->createView(),
                'enattente' => $reservations,
            ));
        }
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
     *
     *
     */
    public function reservationAction()
    {

        $em = $this->getDoctrine()->getManager();
        $reservations =$em->getRepository('AlterEgoBundle:Reservation')->findByUser($this->getUser());


        return $this->render('AlterEgoBundle:Worker:reservation.html.twig', array(
            'reservations' => $reservations
        ));
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

    /**
     * @Route("/rating", name="rating")
     * @Method({"GET", "POST"})
     */
    public function ratingAction(Request $request)
    {
        $user = $this->getUser();
        $em = $this->getDoctrine()->getManager();
        $reservations = $em->getRepository('AlterEgoBundle:Reservation')->findBy(array('user' => $user, 'noteCoach' => null, 'ispresent' => 1));

        $form = $this->createForm('AlterEgoBundle\Form\RatingType');
        $form->handleRequest($request);


            if ($form->isSubmitted() && $form->isValid()) {
                $data = $form->getData();
                foreach ($reservations as $key => $reservation)
                {

                    $reservation->setNoteCoach($data['note']);
                    $em->persist($reservation);
                    $em->flush();

                }
                $request->getSession()
                    ->getFlashBag()
                    ->add('success', 'Votre vote a bien été pris en compte!')
                ;
                return $this->redirectToRoute('rating');
        }

        return $this->render('AlterEgoBundle:Worker:rating.html.twig', array(
            'reservations' => $reservations,
            'form' => $form->createView(),
        ));

    }


}
