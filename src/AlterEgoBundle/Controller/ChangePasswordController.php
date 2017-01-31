<?php

/*
 * This file is part of the FOSUserBundle package.
 *
 * (c) FriendsOfSymfony <http://friendsofsymfony.github.com/>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace AlterEgoBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;
use FOS\UserBundle\Model\UserInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

/**
 * Controller managing the password change
 */
class ChangePasswordController extends Controller
{
    /**
     * @route("/change_password", name="change_password")
     * Change user password
     */
    public function changePasswordAction(Request $request)
    {
        $user = $this->container->get('security.context')->getToken()->getUser();
        if (!is_object($user) || !$user instanceof UserInterface) {
            throw new AccessDeniedException('This user does not have access to this section.');
        }

        $form = $this->container->get('fos_user.change_password.form');
        $formHandler = $this->container->get('fos_user.change_password.form.handler');

        $process = $formHandler->process($user);
        if ($process) {

            $request->getSession()
                ->getFlashBag()
                ->add('success', 'Mot de passe modifié avec succès');
            return new RedirectResponse($this->getRedirectionUrl($user));
        }


        return $this->render('AlterEgoBundle:Default:change_password.html.twig', [
            'form' => $form->createView(),
        ]);

    }

    /**
     * Generate the redirection url when the resetting is completed.
     *
     * @param \FOS\UserBundle\Model\UserInterface $user
     *
     * @return string
     */
    protected function getRedirectionUrl(UserInterface $user)
    {
        return $this->container->get('router')->generate('settings');
    }
//
//    /**
//     * @param string $action
//     * @param string $value
//     */
//    protected function setFlash($action, $value)
//    {
//        $this->container->get('session')->getFlashBag()->set($action, $value);
//    }
}
