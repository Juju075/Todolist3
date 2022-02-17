<?php
declare(strict_types = 1); 
namespace AppBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class SecurityController extends AbstractController
{


    #[Route("/login", name: "login")]
    public function loginAction(Request $request)
    {
        //Implementer latest login method.
        //Obj User
        $request->getUserIdentifier();
        $error = null;
        $lastUsername = null;

        return $this->render('security/login.html.twig', ['last_username' => $lastUsername,'error'=> $error]);
    }



    #[Route("/login", name: "login")]
    public function loginActionBackup(Request $request)
    {
        //Implementer latest login method.
        $authenticationUtils = $this->get('security.authentication_utils'); //: Obj
        $error = $authenticationUtils->getLastAuthenticationError();

        $lastUsername = $authenticationUtils->getLastUsername();

        return $this->render('security/login.html.twig', array(
            'last_username' => $lastUsername,
            'error'         => $error,
        ));
    }







    #[Route("/login_check", name: "login_check")]
    public function loginCheck()
    {
        // This code is never executed.
    }

    #[Route("/logout", name: "logout")]
    public function logoutCheck()
    {
        // This code is never executed.
    }
}
