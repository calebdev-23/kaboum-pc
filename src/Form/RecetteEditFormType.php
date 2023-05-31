<?php

namespace App\Form;

use App\Entity\Customer;
use App\Entity\Payment;
use App\Entity\Produits;
use App\Entity\Recette;
use App\Repository\ProduitsRepository;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class RecetteEditFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('produits',EntityType::class,[
                'label'=>'Produit',
                'class'=>Produits::class,
                'choice_label'=>'name'
            ])

            ->add('quantite',IntegerType::class,[
                'label'=>'Quantité'
            ])
            ->add('price',TextType::class,[
                'label'=>'Prix'
            ])
            ->add('payment',EntityType::class,[
                'label'=>'payment',
                'class'=>Payment::class
            ])
            ->add('customer',EntityType::class,[
                'label'=>'Client',
                'class'=>Customer::class,
                'required'=>false
            ])
            ->add('observation',TextType::class,[
                'label'=>'observation',
                'required'=>false
            ])
            ->add('date',DateType::class,[
                'widget'=>'single_text'
            ])
        ;
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Recette::class,
        ]);
    }
}
