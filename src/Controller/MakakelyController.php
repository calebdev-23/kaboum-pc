<?php

namespace App\Controller;

use App\Entity\MakaKely;
use App\Entity\Recette;
use App\Form\FournisseursFormType;
use App\Repository\MakaKelyRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MakakelyController extends AbstractController
{
    private $manager;
    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->manager = $entityManager;
    }
    #[Route('/makakely', name: 'app_makakely')]
    public function index(MakaKelyRepository $repository): Response
    {
        $makakely = $repository->findAll();
        return $this->render('makakely/index.html.twig', [
            'controller_name' => 'Makakely',
            'mkl'=>$makakely
        ]);
    }
    #[Route('/makakely/ajouter', name: 'app_new_makakely')]
    public function new(Request $request): Response
    {
        $makakely = new MakaKely();
        $makakely->setDate(new \DateTimeImmutable("now"));
        $makakely->setQuantite(1);
        $form = $this->createForm(FournisseursFormType::class, $makakely);
        $form->handleRequest($request);
        if($form->isSubmitted() and $form->isSubmitted())
        {
            $makakely = $form->getData();
            $this->manager->persist($makakely);
            $this->manager->flush();

            return  $this->redirectToRoute('app_makakely');
        }


        return $this->render('makakely/new.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    #[Route('/makakely/edit/{id}', name: 'app_edit_makakely')]
    public function edit(Request $request, $id, MakaKelyRepository $repository): Response
    {
        $makakely = $repository->findOneById($id);
        $form = $this->createForm(FournisseursFormType::class, $makakely);
        $form->handleRequest($request);
        if($form->isSubmitted() and $form->isSubmitted())
        {
            $makakely = $form->getData();
            $this->manager->persist($makakely);
            $this->manager->flush();

            return  $this->redirectToRoute('app_makakely');
        }

        return $this->render('makakely/new.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    #[Route('/makakely/delete/{id}', name: 'app_delete_makakely')]
    public function delete($id,MakaKelyRepository $repository): Response
    {
        $mkl = $this->manager->getRepository(MakaKely::class)->findOneById($id);
        $this->manager->remove($mkl);
        $this->manager->flush();
        return $this->redirectToRoute('app_makakely');
    }


}
