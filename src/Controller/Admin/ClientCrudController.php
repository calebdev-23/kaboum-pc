<?php

namespace App\Controller\Admin;

use App\Entity\Client;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\CountryField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class ClientCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Client::class;
    }


    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('name','Nom'),
            TextField::new('adresse', 'Adresse'),
            TextField::new('Ville'),
            CountryField::new('Pays'),
            TextField::new('Tel')
        ];
    }


    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setPageTitle('index', 'Client')
            ->setPageTitle('new', 'Nouveau Client')
            ->setPageTitle('edit', 'Editer');
    }
}
