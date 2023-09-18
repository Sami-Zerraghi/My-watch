<?php

namespace App\Controller;

use App\Repository\BoutiqueRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class FrontBoutiqueController extends AbstractController
{   

    // fonction qui est appelé parun render controlletr dans la base et qui permet de génerer un menu déroulant avec les catégories / 
    public function renderBoutiqueDropDown(BoutiqueRepository $boutiqueRepository): Response
    {
        $boutiques = $boutiqueRepository->findBy(["isActive"=>true],);
        return $this->render('front_boutique/_boutique_dropdown.html.twig',[
            'boutiques'=>$boutiques,
        ]);
    }

    #[Route('/boutique/{slug}', name: 'app_front_boutique', methods:['GET'])]
    public function index($slug , BoutiqueRepository $boutiqueRepository): Response
    {

        if($slug=="toutes-les-montres"){
            return $this->render('front_boutique/index.html.twig', [
                'boutiques' => $boutiqueRepository->findBy(["isActive"=>true]),
            ]);

        }else{
            $boutique = $boutiqueRepository->findOneBy(["slug"=>$slug]);
            return $this->render('front_boutique/show.html.twig', [
                'boutique' => $boutique,
            ]);
        }
    }
}
