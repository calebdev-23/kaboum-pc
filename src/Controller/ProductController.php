<?php

namespace App\Controller;

use App\Classe\SearchProduit;
use App\Classe\SearchProduitForm;
use App\Entity\Produits;
use App\Repository\ProduitsRepository;
use Doctrine\ORM\EntityManagerInterface;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ProductController extends AbstractController
{
    private $manager;
    public function __construct(EntityManagerInterface $entityManager)
    {
        return $this->manager = $entityManager;
    }

    #[Route('/product', name: 'app_product')]
    public function index(Request $request, ProduitsRepository $repository, PaginatorInterface $paginator): Response
    {
        $searchProduit = new SearchProduit();
        $form = $this->createForm(SearchProduitForm::class, $searchProduit);
        $form->handleRequest($request);

        $produits = $repository->FilterProduit($searchProduit);

        $paginate = $paginator->paginate(
            $produits,
            $request->query->getInt('page', 1),
            14
        );

        return $this->render('product/index.html.twig', [
            'produits' => $paginate,
            'form'=> $form->createView()
        ]);
    }
}
