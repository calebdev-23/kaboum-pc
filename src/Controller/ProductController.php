<?php

namespace App\Controller;

use App\Classe\SearchProduit;
use App\Classe\SearchProduitForm;
use App\Entity\Categories;
use App\Entity\Payment;
use App\Entity\Produits;
use App\Entity\Recette;
use App\Repository\CategoriesRepository;
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
    public function index(Request $request, ProduitsRepository $repository, PaginatorInterface $paginator, CategoriesRepository $categoriesRepository): Response
    {
        $searchProduit = new SearchProduit();
        $form = $this->createForm(SearchProduitForm::class, $searchProduit);
        $form->handleRequest($request);

        $produits = $repository->FilterProduit($searchProduit);

        $paginate = $paginator->paginate(
            $produits,
            $request->query->getInt('page', 1),
            15
        );
        return $this->render('product/index.html.twig', [
            'produits' => $paginate,
            'form'=> $form->createView(),
            'categories'=> $categoriesRepository->findAll()
        ]);
    }
    #[Route('/new-recette/{id}', name: 'app_product_to_recette')]
    public function add($id): Response
    {
        $payments = $this->manager->getRepository(Payment::class)->findAll();
        $payment = $payments[1];
        $produit = $this->manager->getRepository(Produits::class)->findOneById($id);
        $price = $produit->getPrice()/100;
        $name = $produit->getName();
        $date = new \DateTime("now");
        $new_recette = new Recette();
        $new_recette->setName($name)
            ->setPrice($price)
            ->setQuantite(1)
            ->setProduits($produit)
            ->setLieu('')
            ->setPayment($payment)
            ->setDate($date);
        ;
        $stock_old = $produit->getStock();
        $stock_actu = $stock_old - 1;
        $produit->setStock($stock_actu);
        $this->manager->persist($new_recette, $produit);
        $this->manager->flush();

          return $this->redirectToRoute('app_product');

    }

}
