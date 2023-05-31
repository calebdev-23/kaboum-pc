<?php

namespace App\Controller\Admin;

use App\Entity\Recette;
use Doctrine\ORM\EntityManagerInterface;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Config\Filters;
use EasyCorp\Bundle\EasyAdminBundle\Context\AdminContext;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\MoneyField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;


class RecetteCrudController extends AbstractCrudController
{
    private $manager;
    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->manager = $entityManager;
    }
    public static function getEntityFqcn(): string
    {
        return Recette::class;
    }


    public function configureFields(string $pageName): iterable
    {
        return [

            DateField::new('date', 'Date de sortie'),
            TextField::new('name', 'Nom du produit'),
            IntegerField::new('quantite', 'Quantité')
            ->onlyOnIndex(),

            MoneyField::new('priceunique', 'Prix Unitaire')
                ->hideOnForm()
                ->setCurrency('EUR')
            ->setNumDecimals(0),
            MoneyField::new('fullprice', 'Prix totale')
            ->hideOnForm()
            ->setCurrency('EUR')
            ->setNumDecimals(0),

            TextField::new('observation', 'Obsérvation'),

            IntegerField::new('price', 'Prix Unitaire')
                ->hideOnIndex()
            ->hideOnDetail()



        ];
    }
    public function configureActions(Actions $actions): Actions
    {
        return $actions
            ->remove(Crud::PAGE_INDEX, Action::NEW)
            ->add(Crud::PAGE_INDEX, Action::DETAIL)
            ;
    }

   public function configureFilters(Filters $filters): Filters
   {
       return $filters->add('date')
           ->add('name');
   }

   public function delete(AdminContext $context)
   {
       $recette = $context->getEntity()->getInstance();
       $oldQuantite = $recette->getQuantite();

       $produit = $recette->getProduits();
       $stock_old = $produit->getStock();
       $stock_actuel = $stock_old + $oldQuantite;
       $produit->setStock($stock_actuel);


       $this->manager->remove($recette);
       $this->manager->persist($produit);
       $this->manager->flush();

       return parent::delete($context);
   }
    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setPageTitle('index', 'Recette')
            ->setPageTitle('edit', 'Editer')
            ->setPageTitle('detail', 'Details');
    }


}
