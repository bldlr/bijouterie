<?php

namespace App\Form;

use App\Entity\Produit;
use App\Entity\Categories;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class ProduitType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nom')
            ->add('description')
            ->add('genre', ChoiceType::class, array(
				'choices' => array(
					'Homme' => 'homme',
                    'Femme' => 'femme')))
            ->add('matiere')
            ->add('prix')
            ->add('imageFile', FileType::class,[
                'required' => false, 
                'label' => "Image"
                ])
            ->add('categories', EntityType::class, [
                "class" => Categories::class,
                "choice_label" => "libelle"
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Produit::class,
        ]);
    }
}
