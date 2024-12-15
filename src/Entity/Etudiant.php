<?php

namespace App\Entity;

use App\Repository\EtudiantRepository;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\ArrayCollection;


#[ORM\Entity(repositoryClass: EtudiantRepository::class)]
class Etudiant
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $nce;
    #[ORM\Column(type: 'string', length: 255)]
    private $nom;

    #[ORM\Column(type: 'string', length: 255)]
    private $prenom;

    #[ORM\OneToOne(mappedBy: 'etudiant', targetEntity: Soutenance::class)]
    private Soutenance $soutenance;

    public function getNce(): ?int
    {
        return $this->nce;
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
    public function getPrenom(): ?string
    {
        return $this->prenom;
    }
    public function setPrenom(string $prenom): self
    {
        $this->prenom = $prenom;

        return $this;
    }


    /**
     * @return Soutenance
     */
    public function getSoutenance(): Soutenance
    {
        return $this->soutenance;
    }

    public function __toString(): string
    {
        return $this->nom . ' ' . $this->prenom;
    }

}
