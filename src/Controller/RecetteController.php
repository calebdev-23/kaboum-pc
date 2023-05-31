<?php

namespace App\Controller;

use App\Classe\SearchRecette;
use App\Classe\SearchRecetteForm;
use App\Entity\Recette;
use App\Form\RecetteEditFormType;
use App\Form\RecetteFormType;
use Doctrine\ORM\EntityManagerInterface;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class RecetteController extends AbstractController
{
    private $manager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->manager = $entityManager;
    }
    #[Route('/recette', name: 'app_recette')]
    public function index(Request $request, PaginatorInterface $paginator): Response
    {

        $searchRecette = new SearchRecette();
        $form = $this->createForm(SearchRecetteForm::class, $searchRecette);
        $form->handleRequest($request);
        $recette = $this->manager->getRepository(Recette::class)->Filter($searchRecette);
        $recettes = $paginator->paginate(
            $recette,
            $request->query->getInt('page', 1),
            100
        );

        return $this->render('recette/index.html.twig',[
            'recettes' => $recettes,
            'form'=>$form->createView(),
        ]);
    }

    #[Route('/recette-today', name: 'app_recette_today')]
    public function RecetteToday(Request $request, PaginatorInterface $paginator): Response
    {
        $searchRecette = new SearchRecette();
        $form = $this->createForm(SearchRecetteForm::class, $searchRecette);
        $form->handleRequest($request);

        $recette = $this->manager->getRepository(Recette::class)->RecetteToday();

        $recettes = $paginator->paginate(
            $recette,
            $request->query->getInt('page', 1),
            100
        );

        return $this->render('recette/today.html.twig',[
            'recettes' => $recettes,
            'form'=>$form->createView(),
        ]);
    }
    #[Route('/recette/new', name: 'app_new_recette')]
    public function new(Request $request): Response
    {
        $recette = new Recette();
        $recette->setDate(new \DateTimeImmutable("now"));
        $recette->setQuantite(1);
        $form = $this->createForm(RecetteFormType::class, $recette);
        $form->handleRequest($request);
        if($form->isSubmitted() and $form->isSubmitted())
        {
            $recette = $form->getData();
            $produit = $form->get('produits')->getData();
            $quantite = $form->get('quantite')->getData();
            $stock_old = $produit->getStock();
            $stock_actuel = $stock_old - $quantite;
            $produit->setStock($stock_actuel);
            $recetteName = $produit->getName();
            $recette->setName($recetteName);

           $this->manager->persist($recette, $produit);
           $this->manager->flush();

            return  $this->redirectToRoute('app_recette');
        }
        return $this->render('recette/new.html.twig',[
            'form'=>$form->createView()
        ]);
    }

    #[Route('/recette/edit/{id}', name: 'app_edit_recette')]
    public function edit(Request $request, $id): Response
    {
        $recette = $this->manager->getRepository(Recette::class)->findOneById($id);
        $oldQuantite = $recette->getQuantite();

        $produit_ancien =   $recette->getProduits();
        $stock_ancien = $produit_ancien->getStock();

        $form = $this->createForm(RecetteEditFormType::class, $recette);
        $form->handleRequest($request);


        if($form->isSubmitted() and $form->isSubmitted())
        {

            $recette = $form->getData();
            $quantite_actu = $form->get('quantite')->getData();
            $produits = $form->get('produits')->getData();
            $stcok_old = $produits->getStock();

            if( $produits != $produit_ancien )
            {
                if ($produit_ancien->getStock() == 1){

                    // ancien produit
                    $stock_ancien_produit = $oldQuantite;
                    $produit_ancien->setStock($stock_ancien_produit);
                    // nouveau produit
                    $stock_actuel = $stcok_old - $quantite_actu;
                    $produits->setStock($stock_actuel);
                    $recetteName = $produits->getName();
                    $recette->setName($recetteName);

                    $this->manager->persist($recette, $produits, $produit_ancien);
                    $this->manager->flush();
                    return $this->redirectToRoute('app_recette');
                }
                else
                {
                    $stock_actuel = $stcok_old - $quantite_actu;
                    // ancien produit
                    $stock_ancien_produit = $stock_ancien + $oldQuantite;
                    $produit_ancien->setStock($stock_ancien_produit);
                    // nouveau produit
                    $stock_actuel = $stcok_old - $quantite_actu;
                    $produits->setStock($stock_actuel);
                    $recetteName = $produits->getName();
                    $recette->setName($recetteName);

                    $this->manager->persist($recette, $produits, $produit_ancien);
                    $this->manager->flush();
                    return $this->redirectToRoute('app_recette');
                }
            }




                $stock = $stcok_old + $oldQuantite;
                $stock_actuel = $stock - $quantite_actu;
                $produits->setStock($stock_actuel);

                $recetteName = $produits->getName();
                $recette->setName($recetteName);

                $this->manager->persist($recette, $produits);
                $this->manager->flush();
            return $this->redirectToRoute('app_recette');

        }
        return $this->render('recette/edit.html.twig',[
            'form'=>$form->createView()
        ]);
    }
    #[Route('/recette/delete/{id}', name: 'app_delete_recette')]
    public function delete(Request $request, $id): Response
    {
        $recette = $this->manager->getRepository(Recette::class)->findOneById($id);
        $oldQuantite = $recette->getQuantite();
        $produit = $recette->getProduits();
        $stock_old = $produit->getStock();
        $stock_actuel = $stock_old + $oldQuantite;

        $produit->setStock($stock_actuel);
        $this->manager->persist($produit);
        $this->manager->remove($recette);
        $this->manager->flush();
        return $this->redirectToRoute('app_recette');
    }


    // Modification dans notre route recette du jour

    #[Route('/recette-today/edit/{id}', name: 'app_edit_recette_today')]
    public function edit_today(Request $request, $id): Response
    {

        $recette = $this->manager->getRepository(Recette::class)->findOneById($id);
        $oldQuantite = $recette->getQuantite();

        $produit_ancien =   $recette->getProduits();
        $stock_ancien = $produit_ancien->getStock();

        $form = $this->createForm(RecetteEditFormType::class, $recette);
        $form->handleRequest($request);


        if($form->isSubmitted() and $form->isSubmitted())
        {



            $recette = $form->getData();
            $quantite_actu = $form->get('quantite')->getData();
            $produits = $form->get('produits')->getData();
            $stcok_old = $produits->getStock();

            if( $produits != $produit_ancien )
            {
                if ($produit_ancien->getStock() == 1){

                    // ancien produit
                    $stock_ancien_produit = $oldQuantite;
                    $produit_ancien->setStock($stock_ancien_produit);
                    // nouveau produit
                    $stock_actuel = $stcok_old - $quantite_actu;
                    $produits->setStock($stock_actuel);
                    $recetteName = $produits->getName();
                    $recette->setName($recetteName);

                    $this->manager->persist($recette, $produits, $produit_ancien);
                    $this->manager->flush();
                    return $this->redirectToRoute('app_recette_today');
                }
                else
                {
                    $stock_actuel = $stcok_old - $quantite_actu;
                    // ancien produit
                    $stock_ancien_produit = $stock_ancien + $oldQuantite;
                    $produit_ancien->setStock($stock_ancien_produit);
                    // nouveau produit
                    $stock_actuel = $stcok_old - $quantite_actu;
                    $produits->setStock($stock_actuel);
                    $recetteName = $produits->getName();
                    $recette->setName($recetteName);

                    $this->manager->persist($recette, $produits, $produit_ancien);
                    $this->manager->flush();
                    return $this->redirectToRoute('app_recette_today');
                }
            }


            $stock = $stcok_old + $oldQuantite;
            $stock_actuel = $stock - $quantite_actu;
            $produits->setStock($stock_actuel);

            $recetteName = $produits->getName();
            $recette->setName($recetteName);

            $this->manager->persist($recette, $produits);
            $this->manager->flush();
            return $this->redirectToRoute('app_recette_today');

        }
        return $this->render('recette/edit.html.twig',[
            'form'=>$form->createView()
        ]);
    }


    #[Route('/recette-today/delete/{id}', name: 'app_delete_recette_today')]
    public function delete_today(Request $request, $id): Response
    {
        $recette = $this->manager->getRepository(Recette::class)->findOneById($id);
        $oldQuantite = $recette->getQuantite();
        $produit = $recette->getProduits();
        $stock_old = $produit->getStock();
        $stock_actuel = $stock_old + $oldQuantite;


        $produit->setStock($stock_actuel);
        $this->manager->persist($produit);
        $this->manager->remove($recette);
        $this->manager->flush();
        return $this->redirectToRoute('app_recette_today');
    }




}
