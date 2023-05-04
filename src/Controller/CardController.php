<?php

namespace App\Controller;

use App\Entity\Dish;
use App\Entity\MealCategory;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CardController extends AbstractController
{
    private $entityManager;
    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    #[Route('/menu', name: 'app_menu')]
    public function index(): Response
    {
        //$dishes = $this->entityManager->getRepository(Dish::class)->findAll();

        $query = $this->entityManager->createQueryBuilder()
            ->select('c.name as category', 'd.title as title', 'd.description as description', 'd.price as price')
            ->from(Dish::class, 'd')
            ->innerjoin(MealCategory::class, 'c', 'WITH', 'd.category = c.id')
            ->groupBy('d.category')
            ->addGroupBy('d', 'c.name')
            ->getQuery();


        $dishes = $query->getResult();

        $categories = array();
        foreach ($dishes as $dish) {
            if (!in_array($dish['category'], $categories)) {
                $categories[] = $dish['category'];
            }
        }

        return $this->render('Card/index.html.twig', [
            'controller_name' => 'CardController',
            'dishes' => $dishes,
            'categories' => $categories
        ]);
    }
}
