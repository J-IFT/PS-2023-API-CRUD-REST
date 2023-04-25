<?php

namespace App\Controller;

use App\Entity\Morceau;
use App\Form\MorceauType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/morceau')]
class MorceauController extends AbstractController
{
    #[Route('/', name: 'app_morceau_index', methods: ['GET'])]
    public function index(EntityManagerInterface $entityManager): Response
    {
        $morceaus = $entityManager
            ->getRepository(Morceau::class)
            ->findAll();

        return $this->render('morceau/index.html.twig', [
            'morceaus' => $morceaus,
        ]);
    }

    #[Route('/new', name: 'app_morceau_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $morceau = new Morceau();
        $form = $this->createForm(MorceauType::class, $morceau);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($morceau);
            $entityManager->flush();

            return $this->redirectToRoute('app_morceau_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('morceau/new.html.twig', [
            'morceau' => $morceau,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_morceau_show', methods: ['GET'])]
    public function show(Morceau $morceau): Response
    {
        return $this->render('morceau/show.html.twig', [
            'morceau' => $morceau,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_morceau_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Morceau $morceau, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(MorceauType::class, $morceau);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_morceau_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('morceau/edit.html.twig', [
            'morceau' => $morceau,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_morceau_delete', methods: ['POST'])]
    public function delete(Request $request, Morceau $morceau, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$morceau->getId(), $request->request->get('_token'))) {
            $entityManager->remove($morceau);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_morceau_index', [], Response::HTTP_SEE_OTHER);
    }
}
