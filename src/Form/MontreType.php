<?php

namespace App\Form;

use App\Entity\Montre;
use App\Entity\Boutique;
use Symfony\Component\Form\AbstractType;
use FOS\CKEditorBundle\Form\Type\CKEditorType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\MoneyType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;

class MontreType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
        ->add('isActive',CheckboxType::class,['required'=>false, 'label'=>'Active','attr'=>['class'=>'form-check-input'], 'row_attr'=>['class'=>'form-switch mb-2']])
            ->add('nom', TextType::class, ['required'=>true])
            ->add('description', CKEditorType::class,['required'=>true])
            ->add('prix', MoneyType::class,['required'=>true] )
            ->remove('slug')
            ->add('boutique', EntityType::class,['class'=>Boutique::class, 'choice_label'=>'nom', 'required'=>true, 'label'=>'Catégorie'])
            ->add('images', CollectionType::class,['entry_type'=>ImageType::class, 'allow_add'=>true,'by_reference'=>false, 'allow_delete'=>true, 'label'=>false,'entry_options'=>['fromWatch'=>true, 'isNew'=>$options['isNew']]])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Montre::class,
            'isNew'=>true,
        ]);
    }
}
