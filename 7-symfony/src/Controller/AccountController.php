<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\UserType;
use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

/**
 * @Route("/espace-perso")
 */
class AccountController extends AbstractController
{
    /**
     * @Route("/login", name="espaceperso_login")
     */
    public function login(AuthenticationUtils $authenticationUtils)
    {
        $error = $authenticationUtils->getLastAuthenticationError();
        // last username entered by the user
        $lastUsername = $authenticationUtils->getLastUsername();

        return $this->render('account/login.html.twig', [
            'error' => $error,
            'last_username' => $lastUsername
        ]);
    }

    /**
     * @Route("/login-check", name="espaceperso_login_check")
     */
    public function loginCheck()
    {
        // la fonction login_check ne doit rien faire
    }

    /**
     * @Route("/logout", name="espaceperso_logout")
     */
    public function logout()
    {
        // la fonction logout ne doit rien faire
    }

    /**
     * @Route("/wam", name="who_i_am")
     */
    public function whoIAm()
    {
        $userConnected = $this->getUser();
        return $this->render('account/whoiam.html.twig');
    }

}
