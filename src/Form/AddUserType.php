<?php

namespace App\Form;

use App\Entity\Users;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\NotBlank;

class AddUserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('email', EmailType::class, [
                'constraints' => [
                    new NotBlank([
                        'message' => 'Merci de saisir une adresse email'
                    ])
                ],
                'required' => true,
                'attr' => [
                    'class' => 'form-control '
                ]
            ])
            ->add('plainPassword', PasswordType::class, [
                'label' => 'Password',
                'attr' => ["class" => 'form-control ']])
            ->add('username', TextType::class, ['attr' => ["class" => 'form-control']])
            ->add('nameInGame', TextType::class, ['attr' => ["class" => 'form-control']])
            ->add('twitchName', TextType::class, ['attr' => ["class" => 'form-control']])
            ->add('discordName', TextType::class, ['attr' => ["class" => 'form-control']])
            ->add('roles', ChoiceType::class, [
                'attr' => [
                'class' => ' '
                ],
                'choices' => [
                    'Utilisateur' => 'ROLE_USEUR',
                    'Sherpa' => 'ROLE_SHERPA',
                    'Modérateur' => 'ROLE_MODERATOR',
                    'Admin' => 'ROLE_ADMIN'
                ],
                'expanded' => true,
                'multiple' => true,
                'label' => 'Rôles'

            ])
            ->add('Valider', SubmitType::class);;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Users::class,
        ]);
    }
}
