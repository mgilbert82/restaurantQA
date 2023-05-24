<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\UserType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AccountController extends AbstractController
{
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }
    #[Route('/compte', name: 'app_account')]
    public function index(): Response
    {


        return $this->render('account/index.html.twig', [
            'controller_name' => 'AccountController',
        ]);
    }

    #[Route('/compte/ajouter-mes-informations', name: 'app_account_add_info')]
    public function add(Request $request, User $user): Response
    {
        $user = $this->getUser($user);
        $form = $this->createForm(UserType::class, $user);

        $form->handleRequest($request);


        return $this->render('account/user-information.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
