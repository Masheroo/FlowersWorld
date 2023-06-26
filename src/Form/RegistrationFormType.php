<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\IsTrue;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;
use function Sodium\add;

class RegistrationFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('username', TextType::class, [
                'required' => true,
                'label' => 'Введите логин*'
            ])
            ->add('name', TextType::class, [
                'required' => true,
                'label' => 'Введите имя*'
            ])
            ->add('surname', TextType::class, [
                'required' => true,
                'label' => 'Введите фамилию*'
            ])
            ->add('patronymic', TextType::class, [
                'required' => false,
                'label' => 'Введите отчество'
            ])
            ->add('email', EmailType::class, [
                'required' => true,
                'label' => 'Введите email*'
            ])
            ->add('agreeTerms', CheckboxType::class, [
                'mapped' => false,
                'label' => 'Принять правила',
                'constraints' => [
                    new IsTrue([
                        'message' => 'Вы должны принять правила',
                    ]),
                ],
            ])
            ->add('password', RepeatedType::class, [
                'type' => PasswordType::class,
                'invalid_message' => 'Пароли должны совпадать',
                'options' => ['attr' => ['class' => 'password-input']],
                'required' => true,
                'first_options' => [
                    'label' => 'Пароль',
                    'constraints' => [
                        new NotBlank([
                            'message' => 'Введите пароль',
                        ]),
                        new Length([
                            'min' => 6,
                            'minMessage' => 'Пароль должен быть не менее {{ limit }} символов',
                            'max' => 4096,
                        ])]
                ],
                'second_options' => [
                    'label' => 'Повторите пароль',
                    'constraints' => [
                        new NotBlank([
                            'message' => 'Повторите пароль',
                        ]),
                    ]
                ],
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
