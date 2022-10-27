<?php
namespace App\Classe;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class SearchDepenseForm extends AbstractType{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder

            ->add('date',DateType::class,[
                'required'=>false,
                'widget'=>'choice',
                'placeholder'=>[
                    'month'=>'Mois',
                    'day'=>'Jour',
                    'year'=>'Année',
                ]
            ])
            ->add('submit',SubmitType::class,[
                'label'=>'Filtrer',
                'attr'=>[
                    'class'=> 'btn btn-sm btn-primary'
                ]
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => SearchDepense::class,
            'method' => 'GET',
            'crsf_protection' => false,
        ]);
    }
    public function getBlockPrefix()
    {
        return "";
    }

}