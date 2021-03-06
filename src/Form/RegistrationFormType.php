<?php

namespace App\Form;

use App\Entity\Users;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\IsTrue;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;

class RegistrationFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('email', EmailType::class, [
                'attr' => ["class" => 'form-control']
            ])
            ->add('agreeTerms', CheckboxType::class, [
                'mapped' => false,
                'constraints' => [
                    new IsTrue([
                        'message' => 'You should agree to our terms.',
                    ]),
                ],
            ])
            ->add('username', TextType::class,
            ['attr' =>["class" => 'form-control'],'required'=>false, 'constraints' => [
                new Length([
                'min' => 6,
                'minMessage' => 'Your username should be at least {{ limit }} characters',
                // max length allowed by Symfony for security reasons
                'max' => 255 ,
            ]),
            ]])
            ->add('twitchName', TextType::class, ['attr' => ["class" => 'form-control']])
            ->add('discordName', TextType::class, ['attr' => ["class" => 'form-control']])
            ->add('nameInGame', TextType::class, ['attr' => ["class" => 'form-control']])
            /* ->add('plainPassword', PasswordType::class, [
                // instead of being set onto the object directly,
                // this is read and encoded in the controller
                'mapped' => false,
                'constraints' => [
                    new NotBlank([
                        'message' => 'Please enter a password',
                    ]),
                    new Length([
                        'min' => 6,
                        'minMessage' => 'Your password should be at least {{ limit }} characters',
                        // max length allowed by Symfony for security reasons
                        'max' => 255 ,
                    ]),
                ],
            ]) */
            ->add('plainPassword', RepeatedType::class, [
                'type' => PasswordType::class,
                'invalid_message' => 'Les mots de passe ne correspondent pas.',
                'options' => ['attr' => ['class' => 'password-field ']],
                'required' => false,
                'first_options'  => ['label' => 'Mot de passe', 'attr'=>['class' =>'form-control password-register-1']],
                'second_options' => ['label' => 'Confirmer le mot de passe', 'attr'=>['class' =>' form-control password-register-2']],
            ]);
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Users::class,
        ]);
    }
}
