<?php

namespace App\Controller;

use App\Entity\CreerTypeChambre;
use App\Form\CreerTypeChambreType;
use App\Repository\CreerTypeChambreRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/creer/type/chambre')]
class CreerTypeChambreController extends AbstractController
{
    #[Route('/', name: 'app_creer_type_chambre_index', methods: ['GET'])]
    public function index(CreerTypeChambreRepository $creerTypeChambreRepository): Response
    {
        return $this->render('creer_type_chambre/index.html.twig', [
            'creer_type_chambres' => $creerTypeChambreRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_creer_type_chambre_new', methods: ['GET', 'POST'])]
    public function new(Request $request, CreerTypeChambreRepository $creerTypeChambreRepository): Response
    {
        $creerTypeChambre = new CreerTypeChambre();
        $form = $this->createForm(CreerTypeChambreType::class, $creerTypeChambre);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $creerTypeChambreRepository->save($creerTypeChambre, true);

            return $this->redirectToRoute('app_creer_type_chambre_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('creer_type_chambre/new.html.twig', [
            'creer_type_chambre' => $creerTypeChambre,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_creer_type_chambre_show', methods: ['GET'])]
    public function show(CreerTypeChambre $creerTypeChambre): Response
    {
        return $this->render('creer_type_chambre/show.html.twig', [
            'creer_type_chambre' => $creerTypeChambre,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_creer_type_chambre_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, CreerTypeChambre $creerTypeChambre, CreerTypeChambreRepository $creerTypeChambreRepository): Response
    {
        $form = $this->createForm(CreerTypeChambreType::class, $creerTypeChambre);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $creerTypeChambreRepository->save($creerTypeChambre, true);

            return $this->redirectToRoute('app_creer_type_chambre_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('creer_type_chambre/edit.html.twig', [
            'creer_type_chambre' => $creerTypeChambre,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_creer_type_chambre_delete', methods: ['POST'])]
    public function delete(Request $request, CreerTypeChambre $creerTypeChambre, CreerTypeChambreRepository $creerTypeChambreRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$creerTypeChambre->getId(), $request->request->get('_token'))) {
            $creerTypeChambreRepository->remove($creerTypeChambre, true);
        }

        return $this->redirectToRoute('app_creer_type_chambre_index', [], Response::HTTP_SEE_OTHER);
    }
}
