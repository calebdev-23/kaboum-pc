<?php

namespace App\Controller;

use App\Entity\James;
use App\Entity\Ks;
use App\Form\JamesFormType;
use App\Form\KsFormType;
use App\Repository\JamesRepository;
use App\Repository\KsRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class KsController extends AbstractController
{
 private $manager;
    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->manager = $entityManager;
    }
    #[Route('/ks', name: 'app_ks')]
    public function index(KsRepository $repository): Response
    {
        $makakely = $repository->findAll();
        return $this->render('ks/index.html.twig', [
            'controller_name' => 'Ks',
            'mkl'=>$makakely
        ]);
    }
    #[Route('/ks/ajouter', name: 'app_new_ks')]
    public function new(Request $request): Response
    {
        $makakely = new Ks();
        $makakely->setDate(new \DateTimeImmutable("now"));
        $makakely->setQuantite(1);
        $form = $this->createForm(KsFormType::class, $makakely);
        $form->handleRequest($request);
        if($form->isSubmitted() and $form->isSubmitted())
        {
            $makakely = $form->getData();
            $this->manager->persist($makakely);
            $this->manager->flush();

            return  $this->redirectToRoute('app_ks');
        }


        return $this->render('ks/new.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    #[Route('/ks/edit/{id}', name: 'app_edit_ks')]
    public function edit(Request $request, $id, KsRepository $repository): Response
    {
        $makakely = $repository->findOneById($id);
        $form = $this->createForm(KsFormType::class, $makakely);
        $form->handleRequest($request);
        if($form->isSubmitted() and $form->isSubmitted())
        {
            $makakely = $form->getData();
            $this->manager->persist($makakely);
            $this->manager->flush();

            return  $this->redirectToRoute('app_ks');
        }

        return $this->render('ks/new.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    #[Route('/ks/delete/{id}', name: 'app_delete_ks')]
    public function delete($id,KsRepository $repository): Response
    {
        $mkl = $this->manager->getRepository(Ks::class)->findOneById($id);
        $this->manager->remove($mkl);
        $this->manager->flush();
        return $this->redirectToRoute('app_james');
    }
}
