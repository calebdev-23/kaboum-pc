<?php

namespace App\Controller\Admin;

use App\Entity\Produits;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\MoneyField;
use EasyCorp\Bundle\EasyAdminBundle\Field\SlugField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class ProduitsCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Produits::class;
    }


    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('name','Nom'),
            SlugField::new('slug','Slug')->setTargetFieldName('name'),
            IntegerField::new('quantite','Quantité'),
            IntegerField::new('stock','Disponible'),
            MoneyField::new('price','Prix')
                ->setCurrency("EUR")
                ->setNumDecimals(0),
            AssociationField::new('fournisseur','Fournisseurs'),
           AssociationField::new('categorie','Catégories'),
            /*  ImageField::new('illustration','Image')
                 ->setBasePath('/upload/')
                 ->setUploadDir('public/upload/'), */
        ];
    }
    public function configureActions(Actions $actions): Actions
    {
       return $actions
           ->add(Crud::PAGE_INDEX, Action::DETAIL);
    }
}
