<?php

namespace App\Form;

use App\Entity\Categories;
use App\Entity\Fournisseurs;
use App\Entity\Home;
use App\Entity\Produits;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class HomeFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name', TextType::class, [
                'label'=> 'Nom du produit',
                'required'=>false
            ])
            ->add('produit', EntityType::class, [
                'label'=> 'produit',
                'class'=> Produits::class,

            ])
            ->add('homeCategories', EntityType::class, [
                'label'=> 'Categories',
                'class'=> Categories::class,
            ])
            ->add('quantite', TextType::class, [
                'label'=> 'Quantité',
            ])
            ->add('prix', TextType::class, [
                'label'=> 'Prix',
                'mapped'=>false
            ])
            ->add('fournisseur', EntityType::class, [
                'label'=> 'Fournisseur',
                'class'=> Fournisseurs::class,
            ])

            ->add('date', DateType::class, [
                'widget'=> 'single_text',
                'label'=> 'Date',
            ])
            ->add('submit', SubmitType::class, [
                'label'=> 'Ajouter',
                'attr'=>[
                    'class'=>'btn btn-success d-block btn-sm'
                ]
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Home::class,
        ]);
    }
}
