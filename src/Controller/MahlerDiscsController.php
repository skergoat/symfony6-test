<?php

namespace App\Controller;

use App\Entity\MahlerDiscs;
use App\Form\MahlerDiscsType;
use App\Repository\MahlerDiscsRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MahlerDiscsController extends AbstractController
{
    #[Route('/', name: 'app_mahler_discs_index', methods: ['GET'])]
    public function index(MahlerDiscsRepository $mahlerDiscsRepository): Response
    {
        return $this->render('mahler_discs/index.html.twig', [
            'mahler_discs' => $mahlerDiscsRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_mahler_discs_new', methods: ['GET', 'POST'])]
    public function new(Request $request, MahlerDiscsRepository $mahlerDiscsRepository): Response
    {
        $mahlerDisc = new MahlerDiscs();
        $form = $this->createForm(MahlerDiscsType::class, $mahlerDisc);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $mahlerDiscsRepository->save($mahlerDisc, true);

            return $this->redirectToRoute('app_mahler_discs_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('mahler_discs/new.html.twig', [
            'mahler_disc' => $mahlerDisc,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_mahler_discs_show', methods: ['GET'])]
    public function show(MahlerDiscs $mahlerDisc): Response
    {
        return $this->render('mahler_discs/show.html.twig', [
            'mahler_disc' => $mahlerDisc,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_mahler_discs_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, MahlerDiscs $mahlerDisc, MahlerDiscsRepository $mahlerDiscsRepository): Response
    {
        $form = $this->createForm(MahlerDiscsType::class, $mahlerDisc);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $mahlerDiscsRepository->save($mahlerDisc, true);

            return $this->redirectToRoute('app_mahler_discs_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('mahler_discs/edit.html.twig', [
            'mahler_disc' => $mahlerDisc,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_mahler_discs_delete', methods: ['POST'])]
    public function delete(Request $request, MahlerDiscs $mahlerDisc, MahlerDiscsRepository $mahlerDiscsRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$mahlerDisc->getId(), $request->request->get('_token'))) {
            $mahlerDiscsRepository->remove($mahlerDisc, true);
        }

        return $this->redirectToRoute('app_mahler_discs_index', [], Response::HTTP_SEE_OTHER);
    }
}
