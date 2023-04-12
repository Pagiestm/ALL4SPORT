<?php

namespace App\Entity;

use App\Repository\StocksRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=StocksRepository::class)
 */
class Stocks
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $quantite;

    /**
     * @ORM\Column(type="boolean")
     */
    private $stockCritique;

    /**
     * @ORM\ManyToOne(targetEntity=Magasin::class)
     * @ORM\JoinColumn(nullable=false)
     */
    private $magasin;

    /**
     * @ORM\ManyToOne(targetEntity=Produits::class)
     * @ORM\JoinColumn(nullable=false)
     */
    private $produit;

    public function isStockCritique(): bool
    {
        return $this->quantite < 10;
    }


    public function getId(): ?int
    {
        return $this->id;
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

    public function setStockCritique(bool $stockCritique): self
    {
        $this->stockCritique = $stockCritique;

        return $this;
    }

    public function getMagasin(): ?Magasin
    {
        return $this->magasin;
    }

    public function setMagasin(?Magasin $magasin): self
    {
        $this->magasin = $magasin;

        return $this;
    }

    public function getProduit(): ?Produits
    {
        return $this->produit;
    }

    public function setProduit(?Produits $produit): self
    {
        $this->produit = $produit;

        return $this;
    }
}
