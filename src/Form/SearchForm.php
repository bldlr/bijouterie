<?php

namespace App\Form;

use App\Data\SearchData;
use App\Entity\Categories;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;

class SearchForm extends AbstractType // Symfony saura qu'on est en présence d'un formulaire
{


        public function buildForm(FormBuilderInterface $builder, array $options) // construction du formulaire 2 arg : interface builder et tableau
        {
                $builder
                    ->add('q', TextType::class, [
                        'label' => false,
                        'required' => false, // champ non obligatoire
                        'attr' => [
                            'placeholder' => 'Rechercher' 
                        ]
                    ])

                    ->add('categories', EntityType::class, [
                        'label' => false,
                        'required' => false,
                        'class' => Categories::class,
                        'expanded' => true, // liste de chechbox : expanded et multiple
                        'multiple' => true
                    ])
                    
                    ->add('min', NumberType::class, [
                        'label' => false,
                        'required' => false,
                        'attr' => [
                            'placeholder' => 'Prix min' 
                        ]
                    ])

                    ->add('max', NumberType::class, [
                        'label' => false,
                        'required' => false,
                        'attr' => [
                            'placeholder' => 'Prix max' 
                        ]
                    ])


                    ->add('ordre', ChoiceType::class, [
                        'required' => false,
                        'label' => false,
                        'choices' => [
                            'Prix Croissant' => 1,
                            'Prix Décroissant' => 2,
                            'Nom Croissant' => 3,
                            'Nom Décroissant' => 4
                        ]
                    ])
                    
                ;
        }


        public function configureOptions(OptionsResolver $resolver) //Configurer les différentes options liées au formulaire
        {
            $resolver->setDefaults([ // définir des valeurs par défaut
                'data_class' => SearchData::class, // sur quelle classe on se sert pour représenter les données
                'method' => 'GET', // les paramètres passent par l'URL 
                'csrf_protection' => false // désactiver la protection de cross creating/serving ?
            ]);
        }

        public function getBlockPrefix() // infos dans l'url par défaut
        {
            return ''; // url vide et propre
        }

        












}