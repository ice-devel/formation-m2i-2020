<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\CharacterRepository")
 * @ORM\Table(name="app_character")
 */
class Character
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $name;

    /**
     * @ORM\Column(type="smallint")
     */
    private $strength;

    /**
     * @ORM\Column(type="smallint")
     */
    private $health;

    /**
     * @ORM\Column(type="smallint")
     */
    private $armor;

    /**
     * @ORM\Column(type="text")
     */
    private $description;

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

    public function getStrength(): ?int
    {
        return $this->strength;
    }

    public function setStrength(int $strength): self
    {
        $this->strength = $strength;

        return $this;
    }

    public function getHealth(): ?int
    {
        return $this->health;
    }

    public function setHealth(int $health): self
    {
        $this->health = $health;

        return $this;
    }

    public function getArmor(): ?int
    {
        return $this->armor;
    }

    public function setArmor(int $armor): self
    {
        $this->armor = $armor;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function attack(Character $attackedCharacter) {
        // la vie du 2eme perso baisse d'un nombre de points
        // correspondant à la force du 1er moins l'armure du deuxième
        $newHealth = $attackedCharacter->getHealth() - ($this->getStrength() - $attackedCharacter->getArmor());

        $attackedCharacter->setHealth($newHealth);

        // on peut retourner $this, si il n'y a pas de valeurs particulières à retourner
        // (cela permettra de "chainer" les fonctions)
        return $this;
    }

    public function heal() {
        $health = rand(1, 10);
        $newHealth = $this->getHealth() + $health;
        $this->setHealth($newHealth);

        // on peut retourner $this, si il n'y a pas de valeurs particulières à retourner
        // (cela permettra de "chainer" les fonctions)
        return $this;
    }
}