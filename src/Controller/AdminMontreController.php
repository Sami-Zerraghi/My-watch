<?php

namespace App\Controller;

use App\Entity\Montre;
use App\Form\MontreType;
use App\Repository\MontreRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/admin/montre')]
class AdminMontreController extends AbstractController
{
    #[Route('/', name: 'app_admin_montre_index', methods: ['GET'])]
    public function index(MontreRepository $montreRepository): Response
    {
        return $this->render('admin_montre/index.html.twig', [
            'montres' => $montreRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_admin_montre_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $montre = new Montre();
        $form = $this->createForm(MontreType::class, $montre);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($montre);
            $entityManager->flush();

            return $this->redirectToRoute('app_admin_montre_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('admin_montre/new.html.twig', [
            'montre' => $montre,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_admin_montre_show', methods: ['GET'])]
    public function show(Montre $montre): Response
    {
        return $this->render('admin_montre/show.html.twig', [
            'montre' => $montre,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_admin_montre_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Montre $montre, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(MontreType::class, $montre, ["isNew"=>false]);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_admin_montre_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('admin_montre/edit.html.twig', [
            'montre' => $montre,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_admin_montre_delete', methods: ['POST'])]
    public function delete(Request $request, Montre $montre, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$montre->getId(), $request->request->get('_token'))) {
            $entityManager->remove($montre);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_admin_montre_index', [], Response::HTTP_SEE_OTHER);
    }
}
