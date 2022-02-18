<?php
declare(strict_types = 1); 
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends AbstractController
{
    #[Route('/', name: 'homepage')]
    public function index(): Response
    {
        //Erreur envoie sur une fonction php (boucle)
        return $this->render('default/index.html.twig');
    }
}
