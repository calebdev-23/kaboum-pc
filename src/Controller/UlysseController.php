<?php

namespace App\Controller;

use App\Entity\MakaKely;
use App\Entity\Ulysse;
use App\Form\FournisseursFormType;
use App\Form\UlysseFormType;
use App\Repository\MakaKelyRepository;
use App\Repository\UlysseRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class UlysseController extends AbstractController
{
    private $manager;
    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->manager = $entityManager;
    }
    #[Route('/ulysse', name: 'app_ulysse')]
    public function index(UlysseRepository $repository): Response
    {
        $makakely = $repository->findAll();

        return $this->render('ulysse/index.html.twig', [
            'controller_name' => 'Ulysse',
            'mkl'=>$makakely
        ]);
    }


    #[Route('/ulysse/ajouter', name: 'app_new_ulysse')]
    public function new(Request $request): Response
    {
        $makakely = new Ulysse();
        $makakely->setDate(new \DateTimeImmutable("now"));
        $makakely->setQuantite(1);
        $form = $this->createForm(UlysseFormType::class, $makakely);
        $form->handleRequest($request);
        if($form->isSubmitted() and $form->isSubmitted())
        {
            $makakely = $form->getData();
            $this->manager->persist($makakely);
            $this->manager->flush();

            return  $this->redirectToRoute('app_ulysse');
        }

        return $this->render('ulysse/new.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    #[Route('/ulysse/edit/{id}', name: 'app_edit_ulysse')]
    public function edit(Request $request, $id, UlysseRepository $repository): Response
    {
        $makakely = $repository->findOneById($id);
        $form = $this->createForm(UlysseFormType::class, $makakely);
        $form->handleRequest($request);
        if($form->isSubmitted() and $form->isSubmitted())
        {
            $makakely = $form->getData();
            $this->manager->persist($makakely);
            $this->manager->flush();

            return  $this->redirectToRoute('app_ulysse');
        }

        return $this->render('ulysse/new.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    #[Route('/ulysse/delete/{id}', name: 'app_delete_ulysse')]
    public function delete($id,UlysseRepository $repository): Response
    {
        $mkl = $this->manager->getRepository(Ulysse::class)->findOneById($id);
        $this->manager->remove($mkl);
        $this->manager->flush();
        return $this->redirectToRoute('app_ulysse');
    }
}
