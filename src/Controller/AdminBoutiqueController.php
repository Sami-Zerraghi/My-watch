<?php

namespace App\Controller;

use App\Entity\Boutique;
use App\Form\BoutiqueType;
use App\Repository\BoutiqueRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\String\Slugger\SluggerInterface;

#[Route('/admin/boutique')]
class AdminBoutiqueController extends AbstractController
{
    #[Route('/', name: 'app_admin_boutique_index', methods: ['GET'])]
    public function index(BoutiqueRepository $boutiqueRepository): Response
    {
        return $this->render('admin_boutique/index.html.twig', [
            'boutiques' => $boutiqueRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_admin_boutique_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager ,SluggerInterface $sluggerInterface): Response
    {
        $boutique = new Boutique();
        $form = $this->createForm(BoutiqueType::class, $boutique);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            //  on génére le slug de la boutique car il n'est pas obligtoire et n'est pas présent dans le formulaire //
            $boutique->setSlug($sluggerInterface->slug(strtolower($boutique->getNom())));
            $entityManager->persist($boutique);
            $entityManager->flush();
            $this->addFlash('success', 'La catégorié montre a bien été crée');

            return $this->redirectToRoute('app_admin_boutique_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('admin_boutique/new.html.twig', [
            'boutique' => $boutique,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_admin_boutique_show', methods: ['GET'])]
    public function show(Boutique $boutique): Response
    {
        return $this->render('admin_boutique/show.html.twig', [
            'boutique' => $boutique,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_admin_boutique_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Boutique $boutique, EntityManagerInterface $entityManager, SluggerInterface $sluggerInterface): Response
    {
        $form = $this->createForm(BoutiqueType::class, $boutique);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
             //  on génére le slug de la boutique car il n'est pas obligtoire et n'est pas présent dans le formulaire //
            $boutique->setSlug($sluggerInterface->slug(strtolower($boutique->getNom())));
            $entityManager->persist($boutique);
            $entityManager->flush();
            $this->addFlash('success', 'La catégorié montre a bien été modifée');

            return $this->redirectToRoute('app_admin_boutique_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('admin_boutique/edit.html.twig', [
            'boutique' => $boutique,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_admin_boutique_delete', methods: ['POST'])]
    public function delete(Request $request, Boutique $boutique, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$boutique->getId(), $request->request->get('_token'))) {
            $entityManager->remove($boutique);
            $entityManager->flush();
            $this->addFlash('success', 'La catégorié montre a bien été supprimée');
        }

        return $this->redirectToRoute('app_admin_boutique_index', [], Response::HTTP_SEE_OTHER);
    }
}
