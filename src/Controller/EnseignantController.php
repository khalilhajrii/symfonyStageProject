<?php

namespace App\Controller;

use App\Entity\Enseignant;
use App\Form\EnseignantType;
use App\Repository\EnseignantRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/enseignant')]
final class EnseignantController extends AbstractController
{
    #[Route(name: 'app_enseignant_index', methods: ['GET'])]
    public function index(EnseignantRepository $enseignantRepository): Response
    {
        $this->denyAccessUnlessGranted('ROLE_USER');

        return $this->render('enseignant/index.html.twig', [
            'enseignants' => $enseignantRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_enseignant_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $this->denyAccessUnlessGranted('ROLE_USER');
        $enseignant = new Enseignant();
        $form = $this->createForm(EnseignantType::class, $enseignant);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($enseignant);
            $entityManager->flush();

            return $this->redirectToRoute('app_enseignant_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('enseignant/new.html.twig', [
            'enseignant' => $enseignant,
            'form' => $form,
        ]);
    }

    #[Route('/{matricule}', name: 'app_enseignant_show', methods: ['GET'])]
    public function show(Enseignant $enseignant): Response
    {
        $this->denyAccessUnlessGranted('ROLE_USER');
        return $this->render('enseignant/show.html.twig', [
            'enseignant' => $enseignant,
        ]);
    }

    #[Route('/{matricule}/edit', name: 'app_enseignant_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Enseignant $enseignant, EntityManagerInterface $entityManager): Response
    {
        $this->denyAccessUnlessGranted('ROLE_USER');
        $form = $this->createForm(EnseignantType::class, $enseignant);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_enseignant_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('enseignant/edit.html.twig', [
            'enseignant' => $enseignant,
            'form' => $form,
        ]);
    }

    #[Route('/{matricule}', name: 'app_enseignant_delete', methods: ['POST'])]
    public function delete(Request $request, Enseignant $enseignant, EntityManagerInterface $entityManager): Response
    {
        $this->denyAccessUnlessGranted('ROLE_USER');
        if ($this->isCsrfTokenValid('delete'.$enseignant->getmatricule(), $request->getPayload()->getString('_token'))) {
            $entityManager->remove($enseignant);
            $entityManager->flush();
        }
        return $this->redirectToRoute('app_enseignant_index', [], Response::HTTP_SEE_OTHER);
    }
}