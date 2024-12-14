<?php

namespace App\Controller\Admin;

use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use App\Entity\Etudiant;
use App\Entity\Enseignant;
use App\Entity\User;
class DashboardController extends AbstractDashboardController
{
    #[Route('/admin', name: 'admin')]
    public function index(): Response
    {
        $this->denyAccessUnlessGranted('ROLE_ADMIN');
        return $this->render('admin/dashboard.html.twig');
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Testsymfony');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linkToDashboard('Dashboard', 'fa fa-home');
        yield MenuItem::section('Etudiant', 'fa fa-graduation-cap');
        yield MenuItem::linkToCrud('Listes des etudiants', 'fas fa-list', Etudiant::class);
        yield MenuItem::section('Enseignant', 'fa fa-chalkboard-user');
        yield MenuItem::linkToCrud('Listes des enseignant', 'fas fa-list', Enseignant::class);
        yield MenuItem::section('Users', 'fa fa-user');
        yield MenuItem::linkToCrud('Listes des Utilisateurs', 'fas fa-list', User::class);
    }
}
