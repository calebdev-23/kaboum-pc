<?php

namespace App\Controller\Admin;

use App\Entity\Ekinox;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\MoneyField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class EkinoxCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Ekinox::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            DateField::new('date', 'Date d\'entré'),
            TextField::new('name','Nom du produit'),
            IntegerField::new('quantite','Quantité'),
            MoneyField::new('price', 'Prix')->setCurrency('EUR'),
            BooleanField::new('isPaid'),
        ];
    }
    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setPageTitle('index', 'Ekinox')
            ->setPageTitle('new', 'Ajouter un produit')
            ->setPageTitle('edit', 'Modification du produit');
    }

}
