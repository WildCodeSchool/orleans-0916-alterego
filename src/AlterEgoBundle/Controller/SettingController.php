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
use Application\Sonata\UserBundle\Entity\User;


class SettingController extends Controller
{


    /**
     * @Route("/settings", name="settings")
     */
    public function settingsShow()
    {

        $user = $this->container->get('security.context')->getToken()->getUser();
        if (!is_object($user) || !$user instanceof UserInterface) {
            throw new AccessDeniedException('This user does not have access to this section.');
        }

//        $em = $this->getDoctrine()->getManager();
//        $photo = $em->getRepository('AlterEgoBundle:Image')->findOneByUser($user);

        return $this->render('AlterEgoBundle:Default:settings.html.twig', [
            'user' => $user,
//            'photo' => $photo,
        ]);


    }

    /**
     * @Route("/settings/edit", name="settings_edit")
     */
    public function settingsEdit(Request $request)
    {

        $profile = $this->getUser();

        $form = $this->createForm('AlterEgoBundle\Form\ProfileType', $profile);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($profile);
            $em->flush($profile);

            return $this->redirectToRoute('settings', array('id' => $profile->getId()));
        }

        return $this->render('AlterEgoBundle:Default:settings_edit.html.twig', array(
            'form' => $form->createView(),
            'user' => $profile,
        ));

    }
}