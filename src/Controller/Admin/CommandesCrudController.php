<?php

namespace App\Controller\Admin;

use App\Entity\Commandes;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;

class CommandesCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Commandes::class;
    }


    public function configureFields(string $pageName): iterable
    {
        return [
            DateField::new('date_commande', 'Date de Commmande'),
            DateField::new('date_envoi', 'Date d\'envoie'),
            AssociationField::new('client', 'Client'),
        ];
    }


    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setPageTitle('index', 'Commande')
            ->setPageTitle('new', 'Nouveau Commande')
            ->setPageTitle('edit', 'Editer');
    }
}
