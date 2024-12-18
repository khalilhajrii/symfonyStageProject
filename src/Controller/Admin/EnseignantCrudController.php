<?php

namespace App\Controller\Admin;

use App\Entity\Enseignant;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class EnseignantCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Enseignant::class;
    }


    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('matricule')->hideOnForm(),
            TextField::new('nom'),
            TextField::new('prenom'),  
        ];
    }

}
