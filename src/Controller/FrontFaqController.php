<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class FrontFaqController extends AbstractController
{
    #[Route('/faq', name: 'app_front_faq')]
    public function index(): Response
    {
        return $this->render('front_faq/index.html.twig', [
            'controller_name' => 'FrontFaqController',
        ]);
    }
}
