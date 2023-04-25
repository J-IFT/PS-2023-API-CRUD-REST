<?php

namespace App\Controller;

use App\Entity\Contenu;
use App\Form\ContenuType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/contenu')]
class ContenuController extends AbstractController
{
    #[Route('/', name: 'app_contenu_index', methods: ['GET'])]
    public function index(EntityManagerInterface $entityManager): Response
    {
        $contenus = $entityManager
            ->getRepository(Contenu::class)
            ->findAll();

        return $this->render('contenu/index.html.twig', [
            'contenus' => $contenus,
        ]);
    }

    #[Route('/new', name: 'app_contenu_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $contenu = new Contenu();
        $form = $this->createForm(ContenuType::class, $contenu);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($contenu);
            $entityManager->flush();

            return $this->redirectToRoute('app_contenu_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('contenu/new.html.twig', [
            'contenu' => $contenu,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_contenu_show', methods: ['GET'])]
    public function show(Contenu $contenu): Response
    {
        return $this->render('contenu/show.html.twig', [
            'contenu' => $contenu,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_contenu_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Contenu $contenu, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(ContenuType::class, $contenu);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_contenu_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('contenu/edit.html.twig', [
            'contenu' => $contenu,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_contenu_delete', methods: ['POST'])]
    public function delete(Request $request, Contenu $contenu, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$contenu->getId(), $request->request->get('_token'))) {
            $entityManager->remove($contenu);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_contenu_index', [], Response::HTTP_SEE_OTHER);
    }
}
