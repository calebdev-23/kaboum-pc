<?php

namespace App\Form;

use App\Entity\Categories;
use App\Entity\Payment;
use App\Entity\Produits;
use App\Entity\UniteCentrale;
use App\Repository\CategoriesRepository;
use App\Repository\ProduitsRepository;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class UcformType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('date',DateType::class,[
                'widget'=>'single_text'
            ])
            ->add('Client')
            ->add('payment',EntityType::class,[
                'label'=>'payment',
                'class'=>Payment::class
            ])
            ->add('mere',EntityType::class,[
                'label'=>'Carte Mere',
                'class'=>Produits::class,
                'query_builder'=> function(ProduitsRepository $produits)
                {
                    return $produits->createQueryBuilder('p')
                        ->andWhere('p.stock >= 1')
                        ->orderBy('p.name', 'ASC');
                },
                'choice_label'=>'name'
            ])
            ->add('Processeur',EntityType::class,[
                'label'=>'Processeur',
                'class'=>Produits::class,
                'query_builder'=> function(ProduitsRepository $produits){
                    return $produits->createQueryBuilder('p')
                        ->andWhere('p.stock >= 1')
                        ->orderBy('p.name', 'ASC');
                },
                'choice_label'=>'name'
            ])
            ->add('graphique',EntityType::class,[
                'label'=>'Carte Graphique',
                'class'=>Produits::class,
                'query_builder'=> function(ProduitsRepository $produits){
                    return $produits->createQueryBuilder('p')
                        ->andWhere('p.stock >= 1')
                        ->orderBy('p.name', 'ASC');
                },
                'choice_label'=>'name'
            ])
            ->add('ram',EntityType::class,[
                'label'=>'Ram',
                'class'=>Produits::class,
                'query_builder'=> function(ProduitsRepository $produits){
                    return $produits->createQueryBuilder('p')
                        ->andWhere('p.stock >= 1')
                        ->orderBy('p.name', 'ASC');
                },
                'choice_label'=>'name'
            ])
            ->add('HDD',EntityType::class,[
                'label'=>'Disque dur',
                'class'=>Produits::class,
                'query_builder'=> function(ProduitsRepository $produits){
                    return $produits->createQueryBuilder('p')
                        ->andWhere('p.stock >= 1')
                        ->orderBy('p.name', 'ASC');
                },
                'choice_label'=>'name'
            ])
            ->add('SSD',EntityType::class,[
                'label'=>'SSD',
                'class'=>Produits::class,
                'query_builder'=> function(ProduitsRepository $produits){
                    return $produits->createQueryBuilder('p')
                        ->select('p', 'c')
                        ->join('p.categorie', 'c')
                        ->andWhere('p.categorie = :ssd')
                        ->setParameter('ssd',  "ssd" );
                },
                'choice_label'=>'name'
            ])
            ->add('alimentation',EntityType::class,[
                'label'=>'Alimentation',
                'class'=>Produits::class,
                'query_builder'=> function(ProduitsRepository $produits){
                    return $produits->createQueryBuilder('p')
                        ->andWhere('p.stock >= 1')
                        ->orderBy('p.name', 'ASC');
                },
                'choice_label'=>'name'
            ])
            ->add('boitier',EntityType::class,[
                'label'=>'Boitier',
                'class'=>Produits::class,
                'query_builder'=> function(ProduitsRepository $produits){
                    return $produits->createQueryBuilder('p')
                        ->andWhere('p.stock >= 1')
                        ->orderBy('p.name', 'ASC');
                },
                'choice_label'=>'name'
            ])
            ->add('submit', SubmitType::class,[
                'label'=> 'valider',
                'attr'=>[
                    'class'=>'btn btn-sm btn-danger'
                ]
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => UniteCentrale::class,
        ]);
    }
}
