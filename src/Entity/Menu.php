<?php

namespace App\Entity;

use App\Repository\MenuRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: MenuRepository::class)]
class Menu
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $title = null;

    #[ORM\ManyToMany(targetEntity: Formule::class, inversedBy: 'description')]
    private Collection $description;

    public function __construct()
    {
        $this->description = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    /**
     * @return Collection<int, formule>
     */
    public function getDescription(): Collection
    {
        return $this->description;
    }

    public function addDescription(formule $description): self
    {
        if (!$this->description->contains($description)) {
            $this->description->add($description);
        }

        return $this;
    }

    public function removeDescription(formule $description): self
    {
        $this->description->removeElement($description);

        return $this;
    }
}
