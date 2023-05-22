<?php

namespace App\Entity;

use App\Repository\UserInfosRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: UserInfosRepository::class)]
class UserInfos
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(nullable: true)]
    private ?int $number_of_cover = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $allergies_description = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNumberOfCover(): ?int
    {
        return $this->number_of_cover;
    }

    public function setNumberOfCover(?int $number_of_cover): self
    {
        $this->number_of_cover = $number_of_cover;

        return $this;
    }

    public function getAllergiesDescription(): ?string
    {
        return $this->allergies_description;
    }

    public function setAllergiesDescription(?string $allergies_description): self
    {
        $this->allergies_description = $allergies_description;

        return $this;
    }
}
