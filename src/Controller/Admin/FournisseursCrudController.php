<?php

namespace App\Controller\Admin;

use App\Entity\Fournisseurs;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\CountryField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class FournisseursCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Fournisseurs::class;
    }


    public function configureFields(string $pageName): iterable
    {
      return [
            TextField::new('name', 'Nom'),
            TextField::new('contact', 'Contact'),
            TextField::new('adresse', ' Adresse'),
            TextField::new('tel', 'Téléphone'),
            CountryField::new('pays','Pays'),
            TextField::new('ville', 'Ville'),

        ];
    }
    public function configureActions(Actions $actions): Actions
    {
        return $actions
            ->remove(Crud::PAGE_INDEX, Action::new('new'));
    }
}
