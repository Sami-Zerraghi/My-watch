<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class UserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('avatar',AvatarType::class, ['label'=>false])
            ->add('email')
            ->remove('roles')
            ->remove('password')
            ->add('plainPassword', RepeatedType::class,['type'=>PasswordType::class, 'invalid_message'=>'Les mots de passe doivent étre indentiques', 'required'=>false, 'first_options'=>['label'=>"Mot de passe"], 'second_options'=>['label'=>"Confirmation du mot de passe"], 'mapped'=>false, 'help'=>'Le mot de passe doit contenir 6 caractéres minimum.'])
            ->add('nom')
            ->add('prenom')
            ->add('telephone')
            ->remove('isVerified')
            ->add('modifier', SubmitType::class, ["attr"=>["class"=>"btn btn-custom-gold mt-3"]])
            
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
