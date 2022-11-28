<?php

namespace App\Controller;

use App\Entity\UniteCentrale;
use App\Form\UcformType;
use App\Repository\UniteCentraleRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class UcController extends AbstractController
{
    private $manager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->manager = $entityManager;
    }

    #[Route('/recette-UC', name: 'app_uc')]
    public function index(): Response
    {
        $unite = $this->manager->getRepository(UniteCentrale::class)->findAll();
        return $this->render('uc/index.html.twig',[
            'unite'=> $unite
        ]);
    }
    #[Route('/recette-UC/new', name: 'app_new_uc')]
    public function new(Request $request): Response
    {
        $uc = new UniteCentrale();

        $today = new \DateTimeImmutable("now");
        $uc->setDate($today);
        $form = $this->createForm(UcformType::class, $uc);
        $form->handleRequest($request);

        if($form->isSubmitted() and $form->isSubmitted())
        {
            $unit = $form->getData();
            $this->manager->persist($unit);
            $this->manager->flush();

            return  $this->redirectToRoute('app_uc');
        }

        return $this->render('uc/new.html.twig',[
                'form'=>$form->createView(),
            ]);
    }
}
