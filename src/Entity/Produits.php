<?php

namespace App\Entity;

use App\Repository\ProduitsRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ProduitsRepository::class)]
class Produits
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column]
    private ?int $quantite = null;

    #[ORM\Column]
    private ?float $price = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $description = null;

    #[ORM\Column]
    private ?int $stock = null;

    #[ORM\ManyToOne(inversedBy: 'produits')]
    private ?Fournisseurs $fournisseur = null;



    #[ORM\Column(length: 255)]
    private ?string $slug = null;

    #[ORM\OneToMany(mappedBy: 'produits', targetEntity: Recette::class)]
    private Collection $recette;

    #[ORM\ManyToMany(targetEntity: Categories::class, inversedBy: 'produits')]
    private Collection $categories;

    #[ORM\OneToMany(mappedBy: 'produit', targetEntity: ProduitHome::class)]
    private Collection $produitHomes;


    public function __construct()
    {

        $this->recettes = new ArrayCollection();
        $this->recette = new ArrayCollection();
        $this->homes = new ArrayCollection();
        $this->Processeur = new ArrayCollection();
        $this->ram = new ArrayCollection();
        $this->graphique = new ArrayCollection();
        $this->hdd = new ArrayCollection();
        $this->SSD = new ArrayCollection();
        $this->alimentation = new ArrayCollection();
        $this->boitier = new ArrayCollection();
        $this->categories = new ArrayCollection();
        $this->produitHomes = new ArrayCollection();
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

    public function getQuantite(): ?int
    {
        return $this->quantite;
    }

    public function setQuantite(int $quantite): self
    {
        $this->quantite = $quantite;

        return $this;
    }

    public function getPrice(): ?float
    {
        return $this->price;
    }

    public function setPrice(float $price): self
    {
        $this->price = $price;

        return $this;
    }


    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getStock(): ?int
    {
        return $this->stock;
    }

    public function setStock(int $stock): self
    {
        $this->stock = $stock;

        return $this;
    }

    public function getCategorie(): ?Categories
    {
        return $this->categorie;
    }

    public function setCategorie(?Categories $categorie): self
    {
        $this->categorie = $categorie;

        return $this;
    }

    public function getFournisseur(): ?Fournisseurs
    {
        return $this->fournisseur;
    }

    public function setFournisseur(?Fournisseurs $fournisseur): self
    {
        $this->fournisseur = $fournisseur;

        return $this;
    }


    public function getSlug(): ?string
    {
        return $this->slug;
    }

    public function setSlug(string $slug): self
    {
        $this->slug = $slug;

        return $this;
    }

    public function __toString(): string
    {
        return $this->name;
    }

    /**
     * @return Collection<int, Recette>
     */
    public function getRecette(): Collection
    {
        return $this->recette;
    }

    public function addRecette(Recette $recette): self
    {
        if (!$this->recette->contains($recette)) {
            $this->recette->add($recette);
            $recette->setProduits($this);
        }

        return $this;
    }

    public function removeRecette(Recette $recette): self
    {
        if ($this->recette->removeElement($recette)) {
            // set the owning side to null (unless already changed)
            if ($recette->getProduits() === $this) {
                $recette->setProduits(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Categories>
     */
    public function getCategories(): Collection
    {
        return $this->categories;
    }

    public function addCategory(Categories $category): self
    {
        if (!$this->categories->contains($category)) {
            $this->categories->add($category);
        }

        return $this;
    }

    public function removeCategory(Categories $category): self
    {
        $this->categories->removeElement($category);

        return $this;
    }

    /**
     * @return Collection<int, ProduitHome>
     */
    public function getProduitHomes(): Collection
    {
        return $this->produitHomes;
    }

    public function addProduitHome(ProduitHome $produitHome): self
    {
        if (!$this->produitHomes->contains($produitHome)) {
            $this->produitHomes->add($produitHome);
            $produitHome->setProduit($this);
        }

        return $this;
    }

    public function removeProduitHome(ProduitHome $produitHome): self
    {
        if ($this->produitHomes->removeElement($produitHome)) {
            // set the owning side to null (unless already changed)
            if ($produitHome->getProduit() === $this) {
                $produitHome->setProduit(null);
            }
        }

        return $this;
    }

}