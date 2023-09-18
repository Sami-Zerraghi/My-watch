<?php

namespace App\Controller;

use App\Repository\CarouselRepository;
use App\Repository\HomeRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    #[Route('/home', name: 'app_home')]
    #[Route('/', name: 'app_home2')]
    public function index(CarouselRepository $carouselRepository, HomeRepository $homeRepository , ): Response
    {
        $home = $homeRepository->findOneBy(["isActive"=>true]);
        $carousels = $carouselRepository->findBy(["isActive"=>true , "tag"=>"home"], ["rankNumber"=>"ASC"])
    ;
        return $this->render('home/index.html.twig', [
            'home' => $home,
            'carousels'=>$carousels,
            
        ]);
    }
}
