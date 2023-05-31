<?php

namespace App\Controller;

use App\Entity\Customer;
use App\Entity\Recette;
use App\Form\CustomerFormType;
use App\Form\RecetteEditFormType;
use App\Form\RecetteFormType;
use App\Repository\CustomerRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CustomerController extends AbstractController
{
    public $manager;
    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->manager = $entityManager;
    }

    #[Route('/customer', name: 'app_customer')]
    public function index(CustomerRepository $customerRepository, Request $request): Response
    {
        $customers = $customerRepository->findAll();

        $customer = new Customer();
        $form = $this->createForm(CustomerFormType::class, $customer)
            ->handleRequest($request);
        if($form->isSubmitted() and $form->isValid()){
            $customer = $form->getData();
            $this->manager->persist($customer);
            $this->manager->flush();
            return $this->redirectToRoute('app_customer');
        }

        return $this->render('customer/index.html.twig', [
            'customers'=> $customers,
            'form'=> $form->createView()
        ]);
    }

    #[Route('/customer/nouveau-client', name: 'app_new_customer')]
    public function new(Request $request): Response
    {
        $customer = new Customer();
        $form = $this->createForm(CustomerFormType::class, $customer)
            ->handleRequest($request);
        if($form->isSubmitted() and $form->isValid()){
            $customer = $form->getData();
            $this->manager->persist($customer);
            $this->manager->flush();
            return $this->redirectToRoute('app_customer');
        }
        return $this->render('customer/new.html.twig',[
            'form'=> $form->createView()
        ]);
    }

    #[Route('/customer/{id}', name: 'app_show_customer')]
    public function show(Request $request, CustomerRepository $customerRepository, $id): Response
    {
        $customer = $customerRepository->findOneById($id);
        $id  = $customer->getId();
        //formulaire
        $recette = new Recette();
        $recette->setDate(new \DateTimeImmutable("now"));
        $recette->setQuantite(1);
        $recette->setCustomer($customer);
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
            // dd($recette);
            $this->manager->persist($recette, $produit);
            $this->manager->flush();

            return $this->redirectToRoute('app_show_customer',[
                'id'=> $id
            ]);
        }
        return $this->render('customer/show.html.twig',[
            'customer'=> $customer,
            'form'=>$form->createView()
        ]);
    }

    #[Route('/recette-customer/new-recette', name: 'app_new_recette_customer')]
    public function recette(Request $request, CustomerRepository $customerRepository): Response
    {
        $customer = $_GET['customer'];
        $customers = $customerRepository->findOneByUserName($customer);
        $custom = $customers[0];
        $id = $custom->getId();
        // dd($id);
        $recette = new Recette();
        $recette->setDate(new \DateTimeImmutable("now"));
        $recette->setQuantite(1);
        $recette->setCustomer($custom);
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
            // dd($recette);
             $this->manager->persist($recette, $produit);
             $this->manager->flush();

            return $this->redirectToRoute('app_show_customer',[
                'id'=> $id
            ]);
        }
        return $this->render('customer/recette.html.twig',[
            'form'=>$form->createView()
        ]);
    }

    #[Route('/customer/delete/{id}', name: 'app_delete_recette_customer')]
    public function delete(Request $request, $id): Response
    {
        $recette = $this->manager->getRepository(Recette::class)->findOneById($id);
        $customerId =  $recette->getCustomer()->getId();
        $oldQuantite = $recette->getQuantite();
        $produit = $recette->getProduits();
        $stock_old = $produit->getStock();
        $stock_actuel = $stock_old + $oldQuantite;

        $produit->setStock($stock_actuel);
        $this->manager->persist($produit);
        $this->manager->remove($recette);
        $this->manager->flush();
        return $this->redirectToRoute('app_show_customer',[
            'id'=> $customerId
        ]);
    }


    #[Route('/customer/edit/{id}', name: 'app_edit_recette_customer')]
    public function edit_today(Request $request, $id): Response
    {

        $recette = $this->manager->getRepository(Recette::class)->findOneById($id);
        $oldQuantite = $recette->getQuantite();
        $customerId =  $recette->getCustomer()->getId();
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
                    return $this->redirectToRoute('app_show_customer',[
                        'id'=> $customerId
                    ]);
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
                    return $this->redirectToRoute('app_show_customer',[
                        'id'=> $customerId
                    ]);
                }
            }


            $stock = $stcok_old + $oldQuantite;
            $stock_actuel = $stock - $quantite_actu;
            $produits->setStock($stock_actuel);

            $recetteName = $produits->getName();
            $recette->setName($recetteName);

            $this->manager->persist($recette, $produits);
            $this->manager->flush();
            return $this->redirectToRoute('app_show_customer',[
                'id'=> $customerId
            ]);

        }
        return $this->render('recette/edit.html.twig',[
            'form'=>$form->createView()
        ]);
    }
}

