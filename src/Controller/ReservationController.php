<?php

namespace App\Controller;

use App\Entity\Reservation;
use App\Form\ReservationType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ReservationController extends AbstractController
{
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    #[Route('/reservation', name: 'app_reservation')]
    public function index(Request $request): Response
    {
        //Instantiation of a reservation
        $reservation = new Reservation();

        //Create the form to render in the view
        $form = $this->createForm(ReservationType::class, $reservation);

        //Handle the request
        $form->handleRequest($request);

        //Control the form submission
        if ($form->isSubmitted()&& $form->isValid()) {

            //Assign the value of the form on the reservation variable
            $reservation = $form->getData();

            $this->entityManager->persist($reservation);
            $this->entityManager->flush($reservation);

            return $this->redirectToRoute("app_home");
        }

        return $this->render('reservation/index.html.twig', [
            'controller_name' => 'ReservationController',
            'form' => $form->createView(),
        ]);
    }
}
