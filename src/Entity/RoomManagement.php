<?php

namespace App\Entity;

use App\Repository\RoomManagementRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: RoomManagementRepository::class)]
class RoomManagement
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $numberOfGuest = null;

    #[ORM\Column(type: Types::TIME_MUTABLE)]
    private ?\DateTimeInterface $maxThreshold = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNumberOfGuest(): ?int
    {
        return $this->numberOfGuest;
    }

    public function setNumberOfGuest(int $numberOfGuest): self
    {
        $this->numberOfGuest = $numberOfGuest;

        return $this;
    }

    public function getMaxThreshold(): ?\DateTimeInterface
    {
        return $this->maxThreshold;
    }

    public function setMaxThreshold(\DateTimeInterface $maxThreshold): self
    {
        $this->maxThreshold = $maxThreshold;

        return $this;
    }
}
