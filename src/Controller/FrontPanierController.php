<?php

namespace App\Controller;

use App\Entity\Montre;
use App\Repository\MontreRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class FrontPanierController extends AbstractController
{
    #[Route('/panier', name: 'app_front_panier')]
    public function index(SessionInterface $session , MontreRepository $montreRepository)
    {
        $panier = $session->get('panier',[]);

        // On initialise des variables 
        $data = [];
        $total = 0;

        foreach($panier as $id => $quantity){
            $montre = $montreRepository->find($id);

            $data[] = [
                'montre'=> $montre,
                'quantity' => $quantity
            ];
            $total += $montre->getPrix() * $quantity;
        }
        return $this->render('front_panier/index.html.twig', compact('data', 'total'));

    }

    #[Route('/add/{id}', name: 'app_front_panier_add')]
    public function add(Montre $montre, SessionInterface $session)
    {
        // On récupère l'id de la montre 
        $id = $montre->getId();
        
        // On récupére le panier existant
        $panier = $session->get('panier',[]);
        
        
        // On ajoute la montre dans le panier si elle n'y est pas encore 
        // Sinon en incrémante sa quantité
        if(empty($panier[$id])){
            $panier[$id] = 1;
        
        }else{
            $panier[$id]++;
        }

        $session->set('panier', $panier);
        // On redirige vers la page du panier 
        return $this->redirectToRoute('app_front_panier');
    }

    #[Route('/remove/{id}', name: 'app_front_panier_remove')]
    public function remove(Montre $montre, SessionInterface $session)
    {
        // On récupère l'id de la montre 
        $id = $montre->getId();
        
        // On récupére le panier existant
        $panier = $session->get('panier',[]);
        
        
        // On retitre la montre du panier si il n'y a qu'un exemplaire 
        // Sinon en décrémante sa quantité
        if(!empty($panier[$id])){
            if($panier[$id] > 1){
                $panier[$id]--;
            }else{
                unset($panier[$id]);
            }
        }    
        $session->set('panier', $panier);
        // On redirige vers la page du panier 
        return $this->redirectToRoute('app_front_panier');
    }
    
    #[Route('/delete/{id}', name: 'app_front_panier_delete')]
    public function delete(Montre $montre, SessionInterface $session)
    {
        // On récupère l'id de la montre 
        $id = $montre->getId();
        
        // On récupére le panier existant
        $panier = $session->get('panier',[]);
        
        
        if(!empty($panier[$id])){
            unset($panier[$id]);
        }
    
        $session->set('panier', $panier);
        // On redirige vers la page du panier 
        return $this->redirectToRoute('app_front_panier');
    }

    #[Route('/empty/', name: 'app_front_panier_empty')]
    public function empty( SessionInterface $session)
    {
        $session->remove('panier');
        return $this->redirectToRoute('app_front_panier');
    }
}