<?php

namespace App\Entity;

use App\Repository\CreerChambreRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CreerChambreRepository::class)]
class CreerChambre
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nom = null;

    #[ORM\Column]
    private ?int $numero = null;

    #[ORM\Column(length: 255)]
    private ?string $type = null;

    #[ORM\Column]
    private ?int $capicite = null;

    #[ORM\Column(length: 255)]
    private ?string $typeLit = null;

    #[ORM\Column(length: 255)]
    private ?string $statut = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getNumero(): ?int
    {
        return $this->numero;
    }

    public function setNumero(int $numero): self
    {
        $this->numero = $numero;

        return $this;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(string $type): self
    {
        $this->type = $type;

        return $this;
    }

    public function getCapicite(): ?int
    {
        return $this->capicite;
    }

    public function setCapicite(int $capicite): self
    {
        $this->capicite = $capicite;

        return $this;
    }

    public function getTypeLit(): ?string
    {
        return $this->typeLit;
    }

    public function setTypeLit(string $typeLit): self
    {
        $this->typeLit = $typeLit;

        return $this;
    }

    public function getStatut(): ?string
    {
        return $this->statut;
    }

    public function setStatut(string $statut): self
    {
        $this->statut = $statut;

        return $this;
    }
}
