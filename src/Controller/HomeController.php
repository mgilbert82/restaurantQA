<?php

namespace App\Controller;

use App\Entity\Formule;
use App\Entity\Image;
use App\Entity\Menu;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\Query\Expr\GroupBy;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    #[Route('/', name: 'app_home')]
    public function index(): Response
    {
        $carousel = $this->entityManager->getRepository(Image::class)->findAll();

        $query = $this->entityManager->createQueryBuilder()
            ->select('m.title as title', 'f.description as description', 'f.price as price')
            ->from(Formule::class, 'f')
            ->innerJoin(Menu::class, 'm', 'WITH', 'f.description = m.id')
            ->groupBy('f.description')
            ->addGroupBy('m.title', 'f.description', 'f.price')
            ->getQuery();


        $formules = $query->getResult();


        return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController',
            'carousels' => $carousel,
            //'menus' => $menus,
            'formules' => $formules,
        ]);
    }
}
