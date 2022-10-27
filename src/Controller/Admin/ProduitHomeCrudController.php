<?php

namespace App\Controller\Admin;

use App\Entity\ProduitHome;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
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
            TextField::new('quantite', 'Quantité'),
            TextField::new('nom', 'Nom du produit'),
            TextField::new('observation', 'Observation'),
        ];
    }

}
