<?php

namespace App\Form;

use App\Entity\Payment;
use App\Entity\Produits;
use App\Entity\Recette;
use App\Repository\ProduitsRepository;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class RecetteFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder

            ->add('produits',EntityType::class,[
                'label'=>'Produit',
                'class'=>Produits::class,
                'query_builder'=> function(ProduitsRepository $produits){
                    return $produits->createQueryBuilder('p')
                        ->andWhere('p.stock >= 1')
                        ->orderBy('p.name', 'ASC');
                },
                'choice_label'=>'name'
            ])

            ->add('quantite',IntegerType::class,[
                'label'=>'Quantité',
            ])
            ->add('price',TextType::class,[
                'label'=>'Prix'
            ])
            /* ->add('payment',EntityType::class,[
                 'label'=>'payment',
                 'class'=>Payment::class
             ])
             ->add('lieu',ChoiceType::class,[
                 'label'=>'Lieu de livraison',
                 'choices'=>[
                     'Pas de livraison'=>'Pas de livraison',
                     'Antananarivo' => 'Antananarivo',
                     'Toamasina' => 'Toamasina',
                     'Mahjanga' => 'Mahajanga',
                     'Fianarantsoa' => 'Fianarantsoa',
                     'Toliara' => 'Toliara',
                     'Antsiranana' => 'Antsiranana',
                 ]
             ])
             ->add('observation',TextType::class,[
                 'label'=>'Observation',
                 'required'=>false
             ])
            ->add('date',DateType::class,[
                'widget'=>'single_text'
            ]) */
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Recette::class,
        ]);
    }
}
