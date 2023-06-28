<?php

namespace App\Controller;

use App\Form\LoginFormType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class LoginController extends AbstractController
{
    #[Route('/login', name: 'app_login')]
    public function index(AuthenticationUtils $authenticationUtils): Response
    {
        $loginForm = $this->createForm(LoginFormType::class, null, [
            'action' => $this->generateUrl('app_login'),
            'method' => 'POST',
            'attr' => [
                'id' => 'login_form'
            ]
        ]);

        $error = $authenticationUtils->getLastAuthenticationError();

        $lastUserName = $authenticationUtils->getLastUsername();

        return $this->render('login/index.html.twig', [
            'page_name' => 'Авторизация',
            'last_username' => $lastUserName,
            'auth_error' => $error,
            'loginForm' => $loginForm->createView()
        ]);
    }
}
