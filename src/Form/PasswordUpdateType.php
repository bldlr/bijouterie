<?php

namespace App\Form;

use App\Entity\PasswordUpdate;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;

class PasswordUpdateType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder

        ->add('oldPassword', PasswordType::class, array(
            
            'label' => 'Ancien mot de passe'
            
        ))

        ->add('newPassword', PasswordType::class, array(
            
            'label' => 'Nouveau mot de passe'
        ))

        ->add('confirmPassword', PasswordType::class, array(
            
            'label' => 'Confirmation du nouveau mot de passe'
        ))
       
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => PasswordUpdate::class,
        ]);
    }
}

