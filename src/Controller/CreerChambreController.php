<?php

namespace App\Controller;

use App\Entity\CreerChambre;
use App\Form\CreerChambreType;
use App\Repository\CreerChambreRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/creer/chambre')]
class CreerChambreController extends AbstractController
{
    #[Route('/', name: 'app_creer_chambre_index', methods: ['GET'])]
    public function index(CreerChambreRepository $creerChambreRepository): Response
    {
        return $this->render('creer_chambre/index.html.twig', [
            'creer_chambres' => $creerChambreRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_creer_chambre_new', methods: ['GET', 'POST'])]
    public function new(Request $request, CreerChambreRepository $creerChambreRepository): Response
    {
        $creerChambre = new CreerChambre();
        $form = $this->createForm(CreerChambreType::class, $creerChambre);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $creerChambreRepository->save($creerChambre, true);

            return $this->redirectToRoute('app_creer_chambre_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('creer_chambre/new.html.twig', [
            'creer_chambre' => $creerChambre,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_creer_chambre_show', methods: ['GET'])]
    public function show(CreerChambre $creerChambre): Response
    {
        return $this->render('creer_chambre/show.html.twig', [
            'creer_chambre' => $creerChambre,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_creer_chambre_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, CreerChambre $creerChambre, CreerChambreRepository $creerChambreRepository): Response
    {
        $form = $this->createForm(CreerChambreType::class, $creerChambre);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $creerChambreRepository->save($creerChambre, true);

            return $this->redirectToRoute('app_creer_chambre_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('creer_chambre/edit.html.twig', [
            'creer_chambre' => $creerChambre,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_creer_chambre_delete', methods: ['POST'])]
    public function delete(Request $request, CreerChambre $creerChambre, CreerChambreRepository $creerChambreRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$creerChambre->getId(), $request->request->get('_token'))) {
            $creerChambreRepository->remove($creerChambre, true);
        }

        return $this->redirectToRoute('app_creer_chambre_index', [], Response::HTTP_SEE_OTHER);
    }
}
