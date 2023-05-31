<?php

namespace App\Controller\Admin;

use App\Entity\Categories;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\SlugField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class CategoriesCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Categories::class;
    }


    public function configureFields(string $pageName): iterable
    {
        return [

            TextField::new('name'),
            SlugField::new('slug')->setTargetFieldName('name'),
        ];
    }
    public function configureActions(Actions $actions): Actions
    {
        return $actions
            ->remove(Crud::PAGE_INDEX, Action::new('new'));
    }
    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setPageTitle('index', 'Catégories')
            ->setPageTitle('new', 'Nouveau catégorie')
            ->setPageTitle('edit', 'Modification du catégorie');
    }


}
