<?php

namespace App\Form;

use App\Entity\PcUpgrade;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PcUpgradeType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
            $builder
                ->add('date',DateType::class,[
                    'widget'=>'single_text',
                    'label'=> 'Date d\'entré'
                ])
                ->add('name',TextType::class,[
                    'label'=>'Nom du produit',
                ])
                ->add('quantite',IntegerType::class,[
                    'label'=>'Quantité'
                ])
                ->add('price',TextType::class,[
                    'label'=>'Prix'
                ])
                ->add('observation',ChoiceType::class,[
                    'label'=>'Observation',
                    'choices'=>[
                        'Recette'=>'Recette',
                        'Dépense' => 'Dépense',
                    ]
                ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => PcUpgrade::class,
        ]);
    }
}