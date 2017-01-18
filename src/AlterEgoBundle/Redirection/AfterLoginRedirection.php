<?php

namespace AlterEgoBundle\Redirection;

use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\RouterInterface;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Http\Authentication\AuthenticationSuccessHandlerInterface;

class AfterLoginRedirection implements AuthenticationSuccessHandlerInterface
{
    /**
     * @var \Symfony\Component\Routing\RouterInterface
     */
    private $router;

    /**
     * @param RouterInterface $router
     */
    public function __construct(RouterInterface $router)
    {
        $this->router = $router;
    }

    /**
     * @param Request $request
     * @param TokenInterface $token
     * @return RedirectResponse
     */
    public function onAuthenticationSuccess(Request $request, TokenInterface $token)
    {
        // On récupère la liste des rôles d'un utilisateur
        $roles = $token->getRoles();
        // On transforme le tableau d'instance en tableau simple
        $rolesTab = array_map(function($role){
            return $role->getRole();
        }, $roles);
        // S'il s'agit d'un admin ou d'un super admin on le redirige vers le backoffice
        if (in_array('ROLE_ADMIN', $rolesTab, true) || in_array('ROLE_SUPER_ADMIN', $rolesTab, true))
            $redirection = new RedirectResponse($this->router->generate('sonata_admin_dashboard'));
        // sinon il s'agit d'un coach
        elseif (in_array('ROLE_COACH', $rolesTab, true))
            $redirection = new RedirectResponse($this->router->generate('coach_index'));
        // sinon il s'agit d'un worker
        elseif (in_array('ROLE_WORKER', $rolesTab, true))
            $redirection = new RedirectResponse($this->router->generate('worker_index'));
        // sinon il s'agit d'un RH
        elseif (in_array('ROLE_RH', $rolesTab, true))
            $redirection = new RedirectResponse($this->router->generate('route_rh'));
        // sinon il s'agit d'une erreur
        else
            $redirection = new RedirectResponse($this->router->generate('worker'));


        return $redirection;
    }
}