<?php

namespace App\Controller\Admin;

use App\Entity\Soutenance;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use EasyCorp\Bundle\EasyAdminBundle\Field\NumberField;

class SoutenanceCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Soutenance::class;
    }


    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('numjury')->hideOnForm(),
            DateField::new('dateSoutenance', 'Date of Soutenance'),
            NumberField::new('note', 'Score'),
            AssociationField::new('enseignant', 'Enseignant')
                ->setCrudController(EnseignantCrudController::class),
            AssociationField::new('etudiant', 'Etudiant')
                ->setCrudController(EtudiantCrudController::class),
        ];
    }

}
