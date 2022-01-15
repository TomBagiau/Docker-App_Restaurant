<?php

namespace App\Entity;

use App\Repository\CommandeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CommandeRepository::class)]
class Commande
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'integer')]
    private $numeroCommande;

    #[ORM\ManyToOne(targetEntity: user::class, inversedBy: 'commandes')]
    #[ORM\JoinColumn(nullable: false)]
    private $user;

    #[ORM\Column(type: 'integer')]
    private $prixCommande;

    #[ORM\ManyToOne(targetEntity: restaurant::class, inversedBy: 'commandes')]
    #[ORM\JoinColumn(nullable: false)]
    private $restaurant;

    #[ORM\ManyToMany(targetEntity: produit::class)]
    private $produit;

    #[ORM\Column(type: 'string', length: 255)]
    private $quantitÃe;

    public function __construct()
    {
        $this->produit = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNumeroCommande(): ?int
    {
        return $this->numeroCommande;
    }

    public function setNumeroCommande(int $numeroCommande): self
    {
        $this->numeroCommande = $numeroCommande;

        return $this;
    }

    public function getUser(): ?user
    {
        return $this->user;
    }

    public function setUser(?user $user): self
    {
        $this->user = $user;

        return $this;
    }

    public function getPrixCommande(): ?int
    {
        return $this->prixCommande;
    }

    public function setPrixCommande(int $prixCommande): self
    {
        $this->prixCommande = $prixCommande;

        return $this;
    }

    public function getRestaurant(): ?restaurant
    {
        return $this->restaurant;
    }

    public function setRestaurant(?restaurant $restaurant): self
    {
        $this->restaurant = $restaurant;

        return $this;
    }

    /**
     * @return Collection|produit[]
     */
    public function getProduit(): Collection
    {
        return $this->produit;
    }

    public function addProduit(produit $produit): self
    {
        if (!$this->produit->contains($produit)) {
            $this->produit[] = $produit;
        }

        return $this;
    }

    public function removeProduit(produit $produit): self
    {
        $this->produit->removeElement($produit);

        return $this;
    }

    public function getQuantitÃe(): ?string
    {
        return $this->quantitÃe;
    }

    public function setQuantitÃe(string $quantitÃe): self
    {
        $this->quantitÃe = $quantitÃe;

        return $this;
    }
}
