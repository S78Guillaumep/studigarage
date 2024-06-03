<?php

namespace App\Controller\Admin;

use App\Entity\Cars;
use App\Entity\Users;
use App\Entity\Services;
use App\Entity\Categories;
use App\Entity\Images;
use App\Entity\Temoignages;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/admin/dashboard', name: 'admin_dashboard_')]
class ModificationController extends AbstractDashboardController
{
    #[Route('/', name: 'index')]
    public function index(): Response
    {
        return $this->render('admin/dashboard/index.html.twig', [
            'controller_name' => 'Tableau de l Administrateur',
        ]);
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Garage V Parrot: Administrateur');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linkToDashboard('Dashboard', 'fa fa-home');
        yield MenuItem::linkToCrud('les Véhicules', 'fas fa-list', CarsClass::class);
        yield MenuItem::linkToCrud('les Services', 'fas fa-list', ServicesClass::class);
        yield MenuItem::linkToCrud('les témoignages', 'fas fa-list', TemoignagesClass::class);
        yield MenuItem::linkToCrud('les Utilisateurs', 'fas fa-list', UsersClass::class);
        yield MenuItem::linkToCrud('les Catégories de véhicules', 'fas fa-list', CategoriesClass::class);
    }
}
