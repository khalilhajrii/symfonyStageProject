<?php

namespace App\Form;

use App\Entity\Enseignant;
use App\Entity\Etudiant;
use App\Entity\Soutenance;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class SoutenanceType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
          ->add('dateSoutenance')
            ->add('note')
            ->add('enseignant', EntityType::class, [
                'class' => Enseignant::class,
                'choice_label' => function (Enseignant $enseignant) {
                    return $enseignant->getNom() . ' ' . $enseignant->getPrenom();
                },
                'label' => 'Enseignant',
            ])
            ->add('etudiant', EntityType::class, [
                'class' => Etudiant::class,
                'choice_label' => function (Etudiant $etudiant) {
                    return $etudiant->getNom() . ' ' . $etudiant->getPrenom();
                },
                'label' => 'Etudiant',
            ]);
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Soutenance::class,
        ]);
    }
}
