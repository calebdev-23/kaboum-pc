<?php

namespace App\Form;

use App\Entity\Mampionina;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class MampioninaFormType extends AbstractType
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
                ->add('submit', SubmitType::class,[
                    'label'=>'Ajouter',
                    'attr'=>[
                        'class'=>'btn btn-success btn-sm my-2'
                    ]
                ])
            ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Mampionina::class,
        ]);
    }
}
