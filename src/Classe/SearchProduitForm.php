<?php
namespace App\Classe;
use App\Entity\Categories;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class SearchProduitForm extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('string',TextType::class,[
                'label'=>false,
                'required'=>false,
                'attr'=>[
                    'placeholder'=> 'Votre recherche',
                    'class'=> 'mySearch sm'
                ]
            ])
          /*  ->add('categories', EntityType::class,[
                'label'=>false,
                'class'=>Categories::class,
                'expanded'=>true,
                'multiple'=>true,
            ]) */
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => SearchProduit::class,
            'method' => 'GET',
            'crsf_protection' => false,

        ]);
    }
    public function getBlockPrefix()
    {
        return "";
    }
}