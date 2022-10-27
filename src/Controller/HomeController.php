<?php

namespace App\Controller;


use App\Entity\Home;
use App\Entity\Produits;
use App\Form\HomeFormType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\String\Slugger\SluggerInterface;

class HomeController extends AbstractController
{
    private $manager;
    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->manager = $entityManager;
    }
    #[Route('/home', name: 'app_home')]
    public function index(Request $request, SluggerInterface $slugger): Response
    {
        $home = new Home();
        $nouveau_produits = new Produits();
        $home->setDate(new \DateTimeImmutable("now"));
        $form = $this->createForm(HomeFormType::class, );
        $form->handleRequest($request);

        if($form->isSubmitted() and $form->isValid())
        {
           $home = $form->getData();
           $quantite = $form->get('quantite')->getData();
           $produit = $home->getProduit();

            if(empty($home->getName()))
            {
                $produit_name =  $produit->getName();
                $home->setName($produit_name);
                $stock_before =  $produit->getStock();
                $stock_actuel =  $stock_before + $quantite;
                $produit->setStock($stock_actuel);
                $this->manager->persist($produit);
                $this->manager->flush();
            }
            else
            {
                $produi_name = $form->get('name')->getData();
                $produit_quantite = $form->get('quantite')->getData();
                $produit_stock = $form->get('quantite')->getData();
                $produit_price = $form->get('prix')->getData();;
                $produit_slug = $slugger->slug($produi_name);

                dd($produi_name, $produit_slug, $produit_price);
            }
        }
        return $this->render('home/index.html.twig',
        [
            'form'=>$form->createView()
        ]);
    }
}
