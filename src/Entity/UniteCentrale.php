<?php

namespace App\Entity;

use App\Repository\UniteCentraleRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: UniteCentraleRepository::class)]
class UniteCentrale
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $date = null;

    #[ORM\Column(length: 255)]
    private ?string $Client = null;

    #[ORM\ManyToOne(inversedBy: 'uniteCentrales')]
    private ?Payment $payment = null;

    #[ORM\ManyToOne(inversedBy: 'uniteCentrales')]
    private ?Produits $mere = null;

    #[ORM\ManyToOne(inversedBy: 'Processeur')]
    private ?Produits $Processeur = null;

    #[ORM\ManyToOne(inversedBy: 'ram')]
    private ?Produits $ram = null;

    #[ORM\ManyToOne(inversedBy: 'graphique')]
    private ?Produits $graphique = null;

    #[ORM\ManyToOne(inversedBy: 'hdd')]
    private ?Produits $HDD = null;

    #[ORM\ManyToOne(inversedBy: 'SSD')]
    private ?Produits $SSD = null;

    #[ORM\ManyToOne(inversedBy: 'alimentation')]
    private ?Produits $alimentation = null;

    #[ORM\ManyToOne(inversedBy: 'boitier')]
    private ?Produits $boitier = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(\DateTimeInterface $date): self
    {
        $this->date = $date;

        return $this;
    }

    public function getClient(): ?string
    {
        return $this->Client;
    }

    public function setClient(string $Client): self
    {
        $this->Client = $Client;

        return $this;
    }

    public function getPayment(): ?Payment
    {
        return $this->payment;
    }

    public function setPayment(?Payment $payment): self
    {
        $this->payment = $payment;

        return $this;
    }

    public function getMere(): ?Produits
    {
        return $this->mere;
    }

    public function setMere(?Produits $carte_mere): self
    {
        $this->mere = $carte_mere;

        return $this;
    }

    public function getProcesseur(): ?Produits
    {
        return $this->Processeur;
    }

    public function setProcesseur(?Produits $Processeur): self
    {
        $this->Processeur = $Processeur;

        return $this;
    }

    public function getRam(): ?Produits
    {
        return $this->ram;
    }

    public function setRam(?Produits $ram): self
    {
        $this->ram = $ram;

        return $this;
    }

    public function getGraphique(): ?Produits
    {
        return $this->graphique;
    }

    public function setGraphique(?Produits $graphique): self
    {
        $this->graphique = $graphique;

        return $this;
    }

    public function getHDD(): ?Produits
    {
        return $this->HDD;
    }

    public function setHDD(?Produits $HDD): self
    {
        $this->HDD = $HDD;

        return $this;
    }

    public function getSSD(): ?Produits
    {
        return $this->SSD;
    }

    public function setSSD(?Produits $SSD): self
    {
        $this->SSD = $SSD;

        return $this;
    }

    public function getAlimentation(): ?Produits
    {
        return $this->alimentation;
    }

    public function setAlimentation(?Produits $alimentation): self
    {
        $this->alimentation = $alimentation;

        return $this;
    }

    public function getBoitier(): ?Produits
    {
        return $this->boitier;
    }

    public function setBoitier(?Produits $boitier): self
    {
        $this->boitier = $boitier;

        return $this;
    }
}
