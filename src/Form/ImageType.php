<?php

namespace App\Form;

use App\Entity\Image;
use App\Entity\Montre;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ImageType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('imageFile', FileType::class, ['required'=>$options['isNew'] , 'label'=>'Image', 'attr'=>['class'=>'select-image']])
            ->remove('imageName')
            ->remove('updatedAt')
            ->add('rankOrder', IntegerType::class, ['required'=>true, 'label'=>'Ordre','data'=>1 , "attr"=>["min"=>1]])
        
        ;
        if(!$options["fromWatch"]){
            $builder
            ->add('montre',EntityType::class,["class"=>Montre::class,]);
        }
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Image::class,
            'fromWatch'=>false,
            'isNew'=>true,
        ]);
    }
}
