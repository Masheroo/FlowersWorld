<?php

namespace App\Form;

use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ButtonType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\SubmitButton;
use Symfony\Component\OptionsResolver\OptionsResolver;

class LoginFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('username',  TextType::class , [
                'required' => true,
                'label' => 'Логин',
            ])
            ->add('_password', PasswordType::class, [
                'required' => true,
                'label' => 'Пароль',
                'attr' => [
                    'name' => '_password'
                ]
            ])
            ->add('btn', SubmitType::class, [
                'attr' => [
                    'class' => 'btn',
                    'type' => 'submit'
                ],
                'label' => 'Войти'
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            // Configure your form options here
        ]);
    }
}
