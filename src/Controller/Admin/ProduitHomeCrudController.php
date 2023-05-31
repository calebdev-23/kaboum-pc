<?php

namespace App\Controller\Admin;

use App\Entity\ProduitHome;
use Doctrine\ORM\EntityManagerInterface;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Config\Filters;
use EasyCorp\Bundle\EasyAdminBundle\Context\AdminContext;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;


class ProduitHomeCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return ProduitHome::class;
    }


    public function configureFields(string $pageName): iterable
    {
        return [

            DateField::new('date', 'Date d\'entré '),
           TextField::new('nom', 'Nom du produit')
            ->onlyOnIndex(),
            AssociationField::new('produit', 'Produit')
            ->onlyOnForms(),
            TextField::new('quantite', 'Quantité'),
            TextField::new('observation', 'Observation'),

        ];
    }
    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setPageTitle('index', 'Maison')
            ->setPageTitle('new', 'Nouveau produit')
            ->setPageTitle('edit', 'Modification du produit');
    }
    public function persistEntity(EntityManagerInterface $entityManager, $entityInstance): void
    {
        $produit = $entityInstance->getProduit();
        $produitQuantite = $produit->getQuantite();
        $produitStock = $produit->getStock();

        $quantite_home = $entityInstance->getQuantite();

        $StockActuel = $produitStock + $quantite_home;
        $QuantiteActuel = $produitQuantite + $quantite_home;

        $produit->setStock($StockActuel);
        $produit->setQuantite($QuantiteActuel);

      $name =   $entityInstance->setNom($produit->getName());

        $entityManager->persist($produit);
        $entityManager->flush();

        parent::persistEntity($entityManager, $entityInstance);
    }

    public function delete(AdminContext $context)
    {
        return parent::delete($context);
    }


    public function configureActions(Actions $actions): Actions
    {
        return $actions
            ->remove(Crud::PAGE_INDEX, Action::new('new'));
    }
    public function configureFilters(Filters $filters): Filters
    {
        return $filters
            ->add('date');
    }


}
