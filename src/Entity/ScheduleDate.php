<?php

namespace App\Entity;

use App\Repository\ScheduleDateRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ScheduleDateRepository::class)]
class ScheduleDate
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $dayOfTheWeek = null;

    #[ORM\Column]
    private ?bool $open = null;

    #[ORM\Column(type: Types::TIME_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $openHour = null;

    #[ORM\Column(type: Types::TIME_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $closeHour = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDayOfTheWeek(): ?string
    {
        return $this->dayOfTheWeek;
    }

    public function setDayOfTheWeek(string $dayOfTheWeek): self
    {
        $this->dayOfTheWeek = $dayOfTheWeek;

        return $this;
    }

    public function isOpen(): ?bool
    {
        return $this->open;
    }

    public function setOpen(bool $open): self
    {
        $this->open = $open;

        return $this;
    }

    public function getOpenHour(): ?\DateTimeInterface
    {
        return $this->openHour;
    }

    public function setOpenHour(?\DateTimeInterface $openHour): self
    {
        $this->openHour = $openHour;

        return $this;
    }

    public function getCloseHour(): ?\DateTimeInterface
    {
        return $this->closeHour;
    }

    public function setCloseHour(?\DateTimeInterface $closeHour): self
    {
        $this->closeHour = $closeHour;

        return $this;
    }
}
