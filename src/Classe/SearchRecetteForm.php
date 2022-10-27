<?php

namespace App\Classe;

use App\Entity\Categories;
use App\Entity\Payment;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class SearchRecetteForm extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('string',TextType::class,[
                'label'=>false,
                'required'=>false,
                'attr'=>[
                    'placeholder'=> 'Votre recherche',
                    'class'=> 'mySearch'
                ]
            ])
            ->add('date',DateType::class,[
                 'required'=>false,
                'widget'=>'choice',
                'placeholder'=>[
                    'month'=>'Mois',
                    'day'=>'Jour',
                    'year'=>'Année',
                ]
            ])
            ->add('categories', EntityType::class,[
                'label'=>'Payment',
                'required'=>false,
                'class'=>Payment::class,
                'expanded'=>true,
                'multiple'=>true,
            ])


            ->add('submit',SubmitType::class,[
                'label'=>'Filtrer',
                'attr'=>[
                    'class'=> 'btn-r'
                ]
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => SearchRecette::class,
            'method' => 'GET',
            'crsf_protection' => false,
        ]);
    }
    public function getBlockPrefix()
    {
        return "";
    }
}
