<?php

namespace App\Controller;

use App\Entity\ScheduleDate;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ScheduleDateController extends AbstractController
{
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    // #[Route('/schedule/date', name: 'app_schedule_date')]
    public function getSchedule(): Response
    {
        $scheduleDates = $this->entityManager->getRepository(ScheduleDate::class)->findAll();

        return $this->render('scheduleDate/_index.html.twig', [
            'controller_name' => 'ScheduleDateController',
            'scheduleDates' => $scheduleDates
        ]);
    }
}
