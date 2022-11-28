<?php

namespace App\Entity;

use App\Repository\PaymentRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PaymentRepository::class)]
class Payment
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\OneToMany(mappedBy: 'payment', targetEntity: Recette::class)]
    private Collection $recettes;

    #[ORM\OneToMany(mappedBy: 'payment', targetEntity: UniteCentrale::class)]
    private Collection $uniteCentrales;

    public function __construct()
    {
        $this->recettes = new ArrayCollection();
        $this->uniteCentrales = new ArrayCollection();
    }


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return Collection<int, Recette>
     */
    public function getRecettes(): Collection
    {
        return $this->recettes;
    }

    public function addRecette(Recette $recette): self
    {
        if (!$this->recettes->contains($recette)) {
            $this->recettes->add($recette);
            $recette->setPayment($this);
        }

        return $this;
    }

    public function removeRecette(Recette $recette): self
    {
        if ($this->recettes->removeElement($recette)) {
            // set the owning side to null (unless already changed)
            if ($recette->getPayment() === $this) {
                $recette->setPayment(null);
            }
        }

        return $this;
    }

    public function __toString(): string
    {
       return $this->getName();
    }

    /**
     * @return Collection<int, UniteCentrale>
     */
    public function getUniteCentrales(): Collection
    {
        return $this->uniteCentrales;
    }

    public function addUniteCentrale(UniteCentrale $uniteCentrale): self
    {
        if (!$this->uniteCentrales->contains($uniteCentrale)) {
            $this->uniteCentrales->add($uniteCentrale);
            $uniteCentrale->setPayment($this);
        }

        return $this;
    }

    public function removeUniteCentrale(UniteCentrale $uniteCentrale): self
    {
        if ($this->uniteCentrales->removeElement($uniteCentrale)) {
            // set the owning side to null (unless already changed)
            if ($uniteCentrale->getPayment() === $this) {
                $uniteCentrale->setPayment(null);
            }
        }

        return $this;
    }


}
