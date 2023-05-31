<?php

namespace App\Controller;

use App\Entity\James;
use App\Entity\MakaKely;
use App\Form\FournisseursFormType;
use App\Form\JamesFormType;
use App\Repository\JamesRepository;
use App\Repository\MakaKelyRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class JamesController extends AbstractController
{
    private $manager;
    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->manager = $entityManager;
    }
    #[Route('/james', name: 'app_james')]
    public function index(JamesRepository $repository): Response
    {
        $makakely = $repository->findAll();
        return $this->render('james/index.html.twig', [
            'controller_name' => 'James',
            'mkl'=>$makakely
        ]);
    }

    #[Route('/james/ajouter', name: 'app_new_james')]
    public function new(Request $request): Response
    {
        $makakely = new James();
        $makakely->setDate(new \DateTimeImmutable("now"));
        $makakely->setQuantite(1);
        $form = $this->createForm(JamesFormType::class, $makakely);
        $form->handleRequest($request);
        if($form->isSubmitted() and $form->isSubmitted())
        {
            $makakely = $form->getData();
            $this->manager->persist($makakely);
            $this->manager->flush();

            return  $this->redirectToRoute('app_james');
        }


        return $this->render('james/new.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    #[Route('/james/edit/{id}', name: 'app_edit_james')]
    public function edit(Request $request, $id, JamesRepository $repository): Response
    {
        $makakely = $repository->findOneById($id);
        $form = $this->createForm(JamesFormType::class, $makakely);
        $form->handleRequest($request);
        if($form->isSubmitted() and $form->isSubmitted())
        {
            $makakely = $form->getData();
            $this->manager->persist($makakely);
            $this->manager->flush();

            return  $this->redirectToRoute('app_james');
        }

        return $this->render('makakely/new.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    #[Route('/james/delete/{id}', name: 'app_delete_james')]
    public function delete($id,JamesRepository $repository): Response
    {
        $mkl = $this->manager->getRepository(James::class)->findOneById($id);
        $this->manager->remove($mkl);
        $this->manager->flush();
        return $this->redirectToRoute('app_james');
    }
}
