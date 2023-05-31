<?php

namespace App\Controller;


use App\Entity\Mampionina;
use App\Form\MampioninaFormType;
use App\Repository\MampioninaRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MampioninaController extends AbstractController
{
    private $manager;
    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->manager = $entityManager;
    }
    #[Route('/mampionina', name: 'app_mampionina')]
    public function index(MampioninaRepository $repository): Response
    {
        $makakely = $repository->findAll();
        return $this->render('mampionina/index.html.twig', [
            'controller_name' => 'Mampionina',
            'mkl'=>$makakely
        ]);
    }

    #[Route('/mampionina/ajouter', name: 'app_new_mampionina')]
    public function new(Request $request): Response
    {
        $makakely = new Mampionina();
        $makakely->setDate(new \DateTimeImmutable("now"));
        $makakely->setQuantite(1);
        $form = $this->createForm(MampioninaFormType::class, $makakely);
        $form->handleRequest($request);
        if($form->isSubmitted() and $form->isSubmitted())
        {
            $makakely = $form->getData();
            $this->manager->persist($makakely);
            $this->manager->flush();

            return  $this->redirectToRoute('app_mampionina');
        }


        return $this->render('mampionina/new.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    #[Route('/mampionina/edit/{id}', name: 'app_edit_mampionina')]
    public function edit(Request $request, $id, MampioninaRepository $repository): Response
    {
        $makakely = $repository->findOneById($id);
        $form = $this->createForm(MampioninaFormType::class, $makakely);
        $form->handleRequest($request);
        if($form->isSubmitted() and $form->isSubmitted())
        {
            $makakely = $form->getData();
            $this->manager->persist($makakely);
            $this->manager->flush();

            return  $this->redirectToRoute('app_mampionina');
        }

        return $this->render('mampionina/new.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    #[Route('/mampionina/delete/{id}', name: 'app_delete_mampionina')]
    public function delete($id,MampioninaRepository $repository): Response
    {
        $mkl = $this->manager->getRepository(Mampionina::class)->findOneById($id);
        $this->manager->remove($mkl);
        $this->manager->flush();
        return $this->redirectToRoute('app_mampionina');
    }
}
