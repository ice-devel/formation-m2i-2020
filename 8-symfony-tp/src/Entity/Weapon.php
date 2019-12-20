<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\WeaponRepository")
 */
class Weapon
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="smallint")
     */
    private $strengh;

    /**
     * @ORM\Column(type="boolean")
     */
    private $isZoneDamaged;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Character", mappedBy="weapon")
     */
    private $characters;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $name;

    public function __construct()
    {
        $this->characters = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getStrengh(): ?int
    {
        return $this->strengh;
    }

    public function setStrengh(int $strengh): self
    {
        $this->strengh = $strengh;

        return $this;
    }

    public function getIsZoneDamaged(): ?bool
    {
        return $this->isZoneDamaged;
    }

    public function setIsZoneDamaged(bool $isZoneDamaged): self
    {
        $this->isZoneDamaged = $isZoneDamaged;

        return $this;
    }

    /**
     * @return Collection|Character[]
     */
    public function getCharacters(): Collection
    {
        return $this->characters;
    }

    public function addCharacter(Character $character): self
    {
        if (!$this->characters->contains($character)) {
            $this->characters[] = $character;
            $character->setWeapon($this);
        }

        return $this;
    }

    public function removeCharacter(Character $character): self
    {
        if ($this->characters->contains($character)) {
            $this->characters->removeElement($character);
            // set the owning side to null (unless already changed)
            if ($character->getWeapon() === $this) {
                $character->setWeapon(null);
            }
        }

        return $this;
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

    public function getNameListederoulante() {
        return $this->getId()." - ".$this->getName();
    }

    /*
     * méthode magique toString : appelée quand on tente de convertir un objet en chaine (lors d'un affichage par exemple)
     */
    public function __toString()
    {
        return $this->getId()." - ".$this->getName();
    }
}
