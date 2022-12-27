<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ChangePasswordType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder

            ->add('lastname', TextType::class, [
                'disabled' => true,
                'label' => 'Nom'
            ])
            ->add('firstname', TextType::class, [
                'disabled' => true,
                'label' => 'Prénom'
            ])
            ->add('old_password', PasswordType::class, [
                'label' => 'Mon mot de passe actuel',
                'mapped' => false,
                'attr' => [
                    'placeholder' => 'Renseigner votre mot de passe actuel',
                    'class' => 'form-control mb-4',
                ]
            ])
            ->add('new_password', RepeatedType::class, [
                'type' => PasswordType::class,
                'mapped' => false,
                'invalid_message' => 'Le mot de passe et la confirmation doivent être identique',
                'label' => 'Mon nouveau mot de passe',
                'required' => true,
                'first_options' => [
                    'label' => 'Mon nouveau mot de passe',
                    'attr' => [
                        'placeholder' => 'Renseigner votre nouveau mot de passe',
                        'class' => 'form-control mb-4',
                    ]
                ],
                'second_options' => [
                    'label' => 'Ressaisir votre nouveau mot de passe',
                    'attr' => [
                        'placeholder' => 'Confirmer votre nouveau mot de passe',
                        'class' => 'form-control mb-4',
                    ]
                ]
            ])
            ->add('submit', SubmitType::class, [
                'label' => 'Mettre à jour mon nouveau mot de passe',
                'attr' => [
                    'class' => 'btn btn-block btn-info mt-4'
                ]
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
