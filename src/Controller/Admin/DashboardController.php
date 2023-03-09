<?php

namespace App\Controller\Admin;

use App\Entity\Dessert;
use App\Entity\Image;
use App\Entity\MainCourse;
use App\Entity\Starter;
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
            ->setTitle('RestaurantQA');
    }

    public function configureMenuItems(): iterable
    {
        return [
            yield MenuItem::linkToDashboard('Tableau de bord', 'fa fa-home'),
            yield MenuItem::linkToCrud('Utilisateurs', 'fa fa-user', User::class),
            yield MenuItem::linkToCrud('Carousel', 'fa fa-image', Image::class),
            yield MenuItem::linkToCrud('Starter', 'fa fa-carrot', Starter::class),
            yield MenuItem::linkToCrud('Main Course', 'fa fa-burger', MainCourse::class),
            yield MenuItem::linkToCrud('Dessert', 'fa fa-ice-cream', Dessert::class),
        ];
    }
}
