<?php

namespace App\Controller\Admin;

use App\Entity\DetailCommande;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\MoneyField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class DetailCommandeCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return DetailCommande::class;
    }


    public function configureFields(string $pageName): iterable
    {
        return [

            AssociationField::new('produit','Produit'),
            IntegerField::new('quantite','Quantité'),
            MoneyField::new('price', 'Prix')->setCurrency('EUR'),
            AssociationField::new('commande','Commande'),
        ];
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setPageTitle('index', 'Detail du commande')
            ->setPageTitle('new', 'Nouveau')
            ->setPageTitle('edit', 'Editer');
    }
}
