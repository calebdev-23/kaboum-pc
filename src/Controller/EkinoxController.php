<?php

namespace App\Controller;

use App\Entity\Ekinox;
use App\Form\EkinoxFormType;
use App\Repository\EkinoxRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class EkinoxController extends AbstractController
{
    private $manager;
    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->manager = $entityManager;
    }
    #[Route('/ekinox', name: 'app_ekinox')]
    public function index(EkinoxRepository $repository): Response
    {
        $makakely = $repository->findAll();
        return $this->render('ekinox/index.html.twig', [
            'controller_name' => 'Ekinox',
            'mkl'=>$makakely
        ]);
    }
    #[Route('/ekinox/ajouter', name: 'app_new_ekinox')]
    public function new(Request $request): Response
    {
        $makakely = new Ekinox();
        $makakely->setDate(new \DateTimeImmutable("now"));
        $makakely->setQuantite(1);
        $form = $this->createForm(EkinoxFormType::class, $makakely);
        $form->handleRequest($request);
        if($form->isSubmitted() and $form->isSubmitted())
        {
            $makakely = $form->getData();
            $this->manager->persist($makakely);
            $this->manager->flush();

            return  $this->redirectToRoute('app_ekinox');
        }


        return $this->render('ekinox/new.html.twig', [
            'form' => $form->createView(),
        ]);
    }


    #[Route('/ekinox/edit/{id}', name: 'app_edit_ekinox')]
    public function edit(Request $request, $id, EkinoxRepository $repository): Response
    {
        $makakely = $repository->findOneById($id);
        $form = $this->createForm(EkinoxFormType::class, $makakely);
        $form->handleRequest($request);
        if($form->isSubmitted() and $form->isSubmitted())
        {
            $makakely = $form->getData();
            $this->manager->persist($makakely);
            $this->manager->flush();

            return  $this->redirectToRoute('app_ekinox');
        }

        return $this->render('ekinox/new.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    #[Route('/ekinox/delete/{id}', name: 'app_delete_ekinox')]
    public function delete($id,EkinoxRepository $repository): Response
    {
        $mkl = $this->manager->getRepository(Ekinox::class)->findOneById($id);
        $this->manager->remove($mkl);
        $this->manager->flush();
        return $this->redirectToRoute('app_ekinox');
    }
}
