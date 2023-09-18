<?php

namespace App\Controller;

use App\Repository\MontreRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class FrontMontreController extends AbstractController
{
    #[Route('/montre/{slug}', name: 'app_front_montre')]
    public function index($slug, MontreRepository $montreRepository): Response
    {
        return $this->render('front_montre/index.html.twig', [
            'montre' => $montreRepository->findOneBy(["slug"=>$slug]),
        ]);
    }
}
