<?php

namespace App\Entity;

use App\Repository\EnseignantRepository;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\ArrayCollection;

#[ORM\Entity(repositoryClass: EnseignantRepository::class)]
class Enseignant
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $matricule;
    #[ORM\Column(type: 'string', length: 255)]
    private $nom;
    #[ORM\Column(type: 'string', length: 255)]
    private $prenom;
    #[ORM\OneToMany(targetEntity: Soutenance::class, mappedBy: 'enseignant')]
    private Collection $soutenances;

    public function __construct()
    {
        $this->soutenances = new ArrayCollection();
    }
    public function getMatricule(): ?int
    {
        return $this->matricule;
    }
    public function setMatricule(int $matricule): self
    {
        $this->matricule = $matricule;
        return $this;
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
     * @return Collection|Soutenance[]
     */
    public function getSoutenances(): Collection
    {
        return $this->soutenances;
    }
        public function addSoutenance(Soutenance $soutenance): self
    {
        if (!$this->soutenances->contains($soutenance)) {
            $this->soutenances[] = $soutenance;
            $soutenance->setEnseignant($this);
        }

        return $this;
    }
    public function removeSoutenance(Soutenance $soutenance): self
    {
        if ($this->soutenances->removeElement($soutenance)) {
            if ($soutenance->getEnseignant() === $this) {
                $soutenance->setEnseignant(null);
            }
        }

        return $this;
    }
    public function __toString(): string
    {
        return $this->nom . ' ' . $this->prenom;
    }
    
}
