<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class FrontAproposController extends AbstractController
{
    #[Route('/apropos', name: 'app_front_apropos')]
    public function index(): Response
    {
        return $this->render('front_apropos/index.html.twig', [
            'controller_name' => 'FrontAproposController',
        ]);
    }
}
