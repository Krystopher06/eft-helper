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
                'attr' => ["class" => 'form-control'],
                'label' => ['Email']
            ])
            ->add('agreeTerms', CheckboxType::class, [
                'label' => 'Accepter les conditions de service',
                'mapped' => false,
                'constraints' => [
                    new IsTrue([
                        'message' => 'You should agree to our terms.',
                    ]),
                ],'attr' => ["class" => 'form-control rgpd']
            ])
            ->add('username', TextType::class,
            [   'label' => 'Pseudo',
                'attr' => ["class" => 'form-control'],'required'=>false, 'constraints' => [
                new Length([
                'min' => 6,
                'minMessage' => 'Your username should be at least {{ limit }} characters',
                // max length allowed by Symfony for security reasons
                'max' => 255 ,
            ]),
            ]])
            ->add('twitchName', TextType::class,['label' => 'Pseudo Twitch',
                'attr' => ["class" => 'form-control']
            ])
            ->add('discordName', TextType::class,['label' => 'Nom discord',
                'attr' => ["class" => 'form-control']
            ])
            ->add('nameInGame', TextType::class, ['label' => 'Pseudo dans le jeux',
                'attr' => ["class" => 'form-control']
            ])
           /*  ->add('plainPassword', RepeatedType::class, [
                // instead of being set onto the object directly,
                // this is read and encoded in the controller
                'attr' => ["class" => 'form-control']
                ,'mapped' => false,
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
            ->add('password', RepeatedType::class, [
                'type' => PasswordType::class,
                'invalid_message' => 'Les mots de passe ne correspondent pas.',
                'options' => ['attr' => ['class' => 'password-field']],
                'required' => false,
                'first_options'  => ['label' => 'Mot de passe'],
                'second_options' => ['label' => 'Confirmer le mot de passe'],
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
