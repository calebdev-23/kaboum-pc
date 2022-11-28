<?php

namespace App\Controller;

use App\Entity\Categories;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CategoryController extends AbstractController
{
    #[Route('/category/{slug}', name: 'app_category')]
    public function index(?Categories $categories, PaginatorInterface $paginator, Request $request): Response
    {
       if(!$categories){
            return $this->redirectToRoute('app_product');
        }
       $table_produit = [];

       foreach ($categories->getProduits() as $produit){
           $table_produit[] = $produit;
       }

       $produit = $paginator->paginate(
           $table_produit,
           $request->query->getInt('page', 1),
          12
       );
        return $this->render('category/index.html.twig', [
            'categorie' => $categories,
            'produit'=> $produit
        ]);
    }
}
