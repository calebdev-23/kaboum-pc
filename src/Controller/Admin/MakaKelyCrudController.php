<?php

namespace App\Controller\Admin;

use App\Entity\MakaKely;
use Doctrine\ORM\EntityManagerInterface;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\ChoiceField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\MoneyField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class MakaKelyCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return MakaKely::class;
    }


    public function configureFields(string $pageName): iterable
    {
        return [
          DateField::new('date', 'Date d\'entré'),
            TextField::new('name','Nom du produit'),
            IntegerField::new('quantite','Quantité'),
            MoneyField::new('price', 'Prix')->setCurrency('EUR'),
            ChoiceField::new('observation','Obsevation')
                ->setChoices([
                    'Recette'=>'Recette',
                    'Dépense' => 'Dépense',
                ])

        ];
    }
    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setPageTitle('index', 'Makakely')
            ->setPageTitle('new', 'Ajouter un produit')
            ->setPageTitle('edit', 'Modification du produit');
    }
    public function persistEntity(EntityManagerInterface $entityManager, $entityInstance): void
    {
        $mkl = $entityInstance;
        $prix = $mkl->getPrice()/100;
        $mkl->setPrice($prix);
        parent::persistEntity($entityManager, $mkl);
    }

}
