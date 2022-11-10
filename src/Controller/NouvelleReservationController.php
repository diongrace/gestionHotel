<?php

namespace App\Controller;

use App\Entity\NouvelleReservation;
use App\Form\NouvelleReservationType;
use App\Repository\NouvelleReservationRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/nouvelle/reservation')]
class NouvelleReservationController extends AbstractController
{
    #[Route('/', name: 'app_nouvelle_reservation_index', methods: ['GET'])]
    public function index(NouvelleReservationRepository $nouvelleReservationRepository): Response
    {
        return $this->render('nouvelle_reservation/index.html.twig', [
            'nouvelle_reservations' => $nouvelleReservationRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_nouvelle_reservation_new', methods: ['GET', 'POST'])]
    public function new(Request $request, NouvelleReservationRepository $nouvelleReservationRepository): Response
    {
        $nouvelleReservation = new NouvelleReservation();
        $form = $this->createForm(NouvelleReservationType::class, $nouvelleReservation);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $nouvelleReservationRepository->save($nouvelleReservation, true);

            return $this->redirectToRoute('app_nouvelle_reservation_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('nouvelle_reservation/new.html.twig', [
            'nouvelle_reservation' => $nouvelleReservation,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_nouvelle_reservation_show', methods: ['GET'])]
    public function show(NouvelleReservation $nouvelleReservation): Response
    {
        return $this->render('nouvelle_reservation/show.html.twig', [
            'nouvelle_reservation' => $nouvelleReservation,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_nouvelle_reservation_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, NouvelleReservation $nouvelleReservation, NouvelleReservationRepository $nouvelleReservationRepository): Response
    {
        $form = $this->createForm(NouvelleReservationType::class, $nouvelleReservation);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $nouvelleReservationRepository->save($nouvelleReservation, true);

            return $this->redirectToRoute('app_nouvelle_reservation_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('nouvelle_reservation/edit.html.twig', [
            'nouvelle_reservation' => $nouvelleReservation,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_nouvelle_reservation_delete', methods: ['POST'])]
    public function delete(Request $request, NouvelleReservation $nouvelleReservation, NouvelleReservationRepository $nouvelleReservationRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$nouvelleReservation->getId(), $request->request->get('_token'))) {
            $nouvelleReservationRepository->remove($nouvelleReservation, true);
        }

        return $this->redirectToRoute('app_nouvelle_reservation_index', [], Response::HTTP_SEE_OTHER);
    }
}
