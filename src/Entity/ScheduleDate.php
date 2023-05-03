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
    private ?\DateTimeInterface $openHourAM = null;

    #[ORM\Column(type: Types::TIME_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $closeHourAM = null;

    #[ORM\Column(type: Types::TIME_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $openHourPM = null;

    #[ORM\Column(type: Types::TIME_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $closeHourPM = null;

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

    public function getOpenHourAM(): ?\DateTimeInterface
    {
        return $this->openHourAM;
    }

    public function setOpenHourAM(?\DateTimeInterface $openHourAM): self
    {
        $this->openHourAM = $openHourAM;

        return $this;
    }

    public function getCloseHourAM(): ?\DateTimeInterface
    {
        return $this->closeHourAM;
    }

    public function setCloseHourAM(?\DateTimeInterface $closeHourAM): self
    {
        $this->closeHourAM = $closeHourAM;

        return $this;
    }

    public function getOpenHourPM(): ?\DateTimeInterface
    {
        return $this->openHourPM;
    }

    public function setOpenHourPM(?\DateTimeInterface $openHourPM): self
    {
        $this->openHourPM = $openHourPM;

        return $this;
    }

    public function getCloseHourPM(): ?\DateTimeInterface
    {
        return $this->closeHourPM;
    }

    public function setCloseHourPM(?\DateTimeInterface $closeHourPM): self
    {
        $this->closeHourPM = $closeHourPM;

        return $this;
    }
}
