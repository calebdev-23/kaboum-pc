<?php

namespace App\Controller;

use App\Entity\PcUpgrade;
use App\Form\PcUpgradeType;
use App\Repository\PcUpgradeRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/PcUpgrade')]
class PcUpgradeController extends AbstractController
{
    #[Route('/', name: 'app_pc_upgrade_index', methods: ['GET'])]
    public function index(PcUpgradeRepository $pcUpgradeRepository): Response
    {
        return $this->render('pc_upgrade/index.html.twig', [
            'pc_upgrades' => $pcUpgradeRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_pc_upgrade_new', methods: ['GET', 'POST'])]
    public function new(Request $request, PcUpgradeRepository $pcUpgradeRepository): Response
    {
        $pcUpgrade = new PcUpgrade();
        $form = $this->createForm(PcUpgradeType::class, $pcUpgrade);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $pcUpgradeRepository->add($pcUpgrade, true);

            return $this->redirectToRoute('app_pc_upgrade_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('pc_upgrade/new.html.twig', [
            'pc_upgrade' => $pcUpgrade,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_pc_upgrade_show', methods: ['GET'])]
    public function show(PcUpgrade $pcUpgrade): Response
    {
        return $this->render('pc_upgrade/show.html.twig', [
            'pc_upgrade' => $pcUpgrade,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_pc_upgrade_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, PcUpgrade $pcUpgrade, PcUpgradeRepository $pcUpgradeRepository): Response
    {
        $form = $this->createForm(PcUpgradeType::class, $pcUpgrade);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $pcUpgradeRepository->add($pcUpgrade, true);

            return $this->redirectToRoute('app_pc_upgrade_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('pc_upgrade/edit.html.twig', [
            'pc_upgrade' => $pcUpgrade,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_pc_upgrade_delete', methods: ['POST'])]
    public function delete(Request $request, PcUpgrade $pcUpgrade, PcUpgradeRepository $pcUpgradeRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$pcUpgrade->getId(), $request->request->get('_token'))) {
            $pcUpgradeRepository->remove($pcUpgrade, true);
        }

        return $this->redirectToRoute('app_pc_upgrade_index', [], Response::HTTP_SEE_OTHER);
    }
}
