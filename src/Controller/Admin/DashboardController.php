<?php

namespace App\Controller\Admin;

use App\Entity\Dish;
use App\Entity\Formule;
use App\Entity\Image;
use App\Entity\MealCategory;
use App\Entity\Menu;
use App\Entity\ScheduleDate;
use App\Entity\User;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DashboardController extends AbstractDashboardController
{
    #[Route('/admin', name: 'admin')]
    public function index(): Response
    {
        return $this->render('admin/index.html.twig');

        // Option 1. You can make your dashboard redirect to some common page of your backend
        //
        // $adminUrlGenerator = $this->container->get(AdminUrlGenerator::class);
        // return $this->redirect($adminUrlGenerator->setController(OneOfYourCrudController::class)->generateUrl());

        // Option 2. You can make your dashboard redirect to different pages depending on the user
        //
        // if ('jane' === $this->getUser()->getUsername()) {
        //     return $this->redirect('...');
        // }

        // Option 3. You can render some custom template to display a proper dashboard with widgets, etc.
        // (tip: it's easier if your template extends from @EasyAdmin/page/content.html.twig)
        //
        // return $this->render('some/path/my-dashboard.html.twig');
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Restaurant Quai Antique')
            //->disableDarkMode()
            ->setFaviconPath('favicon.ico');
    }

    public function configureMenuItems(): iterable
    {
        return [
            //yield MenuItem::linkToDashboard('Tableau de bord', 'fa fa-home'),
            yield MenuItem::section('Gestion du restaurant'),
            yield MenuItem::linkToCrud('Les horaires', 'fa fa-calendar-days', ScheduleDate::class),
            yield MenuItem::linkToCrud('Les clients', 'fa fa-user', User::class),
            yield MenuItem::linkToCrud('Le carousel', 'fa fa-image', Image::class),
            yield MenuItem::section('Gestion gourmandes'),
            yield MenuItem::linkToCrud('Les catégories', 'fa fa-hotdog', MealCategory::class),
            yield MenuItem::linkToCrud('La carte', 'fa fa-utensils', Dish::class),
            yield MenuItem::linkToCrud('Les menus', 'fa fa-pizza-slice', Menu::class),
            yield MenuItem::linkToCrud('Les formules', 'fa fa-burger', Formule::class),
        ];
    }
}
