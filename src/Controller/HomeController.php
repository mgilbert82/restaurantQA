<?php

namespace App\Controller;

use App\Entity\Formules;
use App\Entity\Image;
use App\Entity\Menus;
use Doctrine\ORM\EntityManagerInterface;
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
            ->select('m')
            ->from(Menus::class, 'm')
            ->getQuery();

        $menus = $query->getResult();
        //dd($menus);

        return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController',
            'carousels' => $carousel,
            'menus' => $menus,
            //'formules' => $formules,
            // 'menu_description' => $menuDescription,
            //'formules' => $formules,
        ]);
    }
}
