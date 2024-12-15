<?php

namespace App\Form;

use App\Entity\Etudiant;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\Length;
class EtudiantType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
        ->add('nom', TextType::class, [
            'label' => 'Nom',
            'attr' => ['class' => 'form-control'],
            'constraints' => [
                new NotBlank([
                    'message' => 'Le nom ne peut pas être vide.',
                ]),
                new Length([
                    'min' => 3,
                    'minMessage' => 'Le nom doit comporter au moins {{ limit }} caractères.',
                    'max' => 50,
                    'maxMessage' => 'Le nom ne peut pas dépasser {{ limit }} caractères.',
                ]),
            ],
        ])
        ->add('prenom', TextType::class, [
            'label' => 'Prenom',
            'attr' => ['class' => 'form-control'],
            'constraints' => [
                new NotBlank([
                    'message' => 'Le prénom ne peut pas être vide.',
                ]),
                new Length([
                    'min' => 3,
                    'minMessage' => 'Le prénom doit comporter au moins {{ limit }} caractères.',
                    'max' => 50,
                    'maxMessage' => 'Le prénom ne peut pas dépasser {{ limit }} caractères.',
                ]),
            ],
        ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Etudiant::class,
        ]);
    }
}
