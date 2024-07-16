<?php

namespace App\Controller\Admin;

use App\Entity\CacesDate;
use App\Entity\Categories;
use App\Entity\Normes;
use App\Entity\Site;
use App\Entity\Workers;
use App\Repository\CacesDateRepository;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DashboardController extends AbstractDashboardController
{
    private CacesDateRepository $cacesDateRepository;
    
    public function __construct(CacesDateRepository $cacesDateRepository)
    {
        $this->cacesDateRepository = $cacesDateRepository;
    }
    
    /**
     * @Route("/admin", name="admin")
     */
    public function index(): Response
    {
        //return parent::index();

        $nbNormes = $this->getDoctrine()->getRepository(Normes::class)->count([]);
        $nbCategories = $this->getDoctrine()->getRepository(Categories::class)->count([]);
        $nbSite = $this->getDoctrine()->getRepository(Site::class)->count([]);
        $nbWorkers = $this->getDoctrine()->getRepository(Workers::class)->count([]);
        $nbDatesCaces = $this->getDoctrine()->getRepository(CacesDate::class)->count([]);
 
        return $this->render('admin/dashboard.html.twig', [
            'nbNormes' => $nbNormes,
            'nbCategories' => $nbCategories,
            'nbSite' => $nbSite,
            'nbWorkers' => $nbWorkers,
            'nbDatesCaces' => $nbDatesCaces,
            'cacesDate' => $this->cacesDateRepository->getObsoleteDate(),
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
