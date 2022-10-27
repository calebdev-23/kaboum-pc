<?php

namespace App\Controller;

use App\Classe\SearchDepense;
use App\Classe\SearchDepenseForm;
use App\Entity\Depense;
use App\Form\DepenseFormeType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DepenseController extends AbstractController
{
    private $manager;
    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->manager = $entityManager;
    }
    #[Route('/depense', name: 'app_depense')]
    public function index(Request $request): Response
    {
        $searchDepense = new SearchDepense();
        $form = $this->createForm(SearchDepenseForm::class, $searchDepense);
        $form->handleRequest($request);
        $depense = $this->manager->getRepository(Depense::class)->FilterByDate($searchDepense);
        return $this->render('depense/index.html.twig',[
            'depense'=>$depense,
            'form'=> $form->createView()
        ]);
    }

    #[Route('/depense/new', name: 'app_new_depense')]
    public function new(Request $request): Response
    {
        $depense = new Depense();
        $depense->setDate(new \DateTimeImmutable("now"));

        $form = $this->createForm(DepenseFormeType::class, $depense);
        $form->handleRequest($request);
        if($form->isSubmitted() and $form->isSubmitted())
        {
            $depense = $form->getData();
            $this->manager->persist($depense);
            $this->manager->flush();

            return  $this->redirectToRoute('app_depense');
        }
        return $this->render('depense/new.html.twig',[
            'form'=>$form->createView()
        ]);
    }

    #[Route('/depense/edit/{id}', name: 'app_edit_depense')]
    public function edit(Request $request, $id): Response
    {
        $depense = $this->manager->getRepository(Depense::class)->findOneById($id);
        $form = $this->createForm(DepenseFormeType::class, $depense);
        $form->handleRequest($request);
        if($form->isSubmitted() and $form->isSubmitted())
        {
            $depense = $form->getData();
            $this->manager->persist($depense);
            $this->manager->flush();
            return  $this->redirectToRoute('app_depense');
        }
        return $this->render('depense/edit.html.twig',[
            'form'=>$form->createView()
        ]);
    }

    #[Route('/depense/delete/{id}', name: 'app_delete_depense')]
    public function delete(Request $request, $id): Response
    {
            $depense = $this->manager->getRepository(Depense::class)->findOneById($id);
            $this->manager->remove($depense);
            $this->manager->flush();
            return  $this->redirectToRoute('app_depense');

    }
}
