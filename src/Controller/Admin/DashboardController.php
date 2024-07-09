<?php

namespace App\Controller\Admin;

use App\Entity\CacesDate;
use App\Entity\Categories;
use App\Entity\Normes;
use App\Entity\Site;
use App\Entity\Workers;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DashboardController extends AbstractDashboardController
{
    /**
     * @Route("/admin", name="admin")
     */
    public function index(): Response
    {
        //return parent::index();
        $accounts = $this->getDoctrine()->getRepository(Normes::class)->count([]);
        $contacts = $this->getDoctrine()->getRepository(Categories::class)->count([]);
 
        return $this->render('Admin/dashboard.html.twig', [
            'accounts' => $accounts,
            'contacts' => $contacts,
        ]);
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Audit')
            ->disableUrlSignatures();
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linkToDashboard('Tableau de bord', 'fa fa-home');
        yield MenuItem::section('Caces');
        yield MenuItem::linkToCrud('Normes', 'fas fa-list', Normes::class);
        yield MenuItem::linkToCrud('Catégories', 'fas fa-list', Categories::class);
        yield MenuItem::section('Société');
        yield MenuItem::linkToCrud('Sites', 'fas fa-list', Site::class);
        yield MenuItem::linkToCrud('Employés', 'fas fa-list', Workers::class);
        yield MenuItem::section('Dates');
        yield MenuItem::linkToCrud('Dates des Caces', 'fas fa-list', CacesDate::class);
    }
}
