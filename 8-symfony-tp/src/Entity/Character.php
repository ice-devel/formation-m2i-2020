<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Event\LifecycleEventArgs;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\CharacterRepository")
 * @ORM\Table(name="app_character")
 * @ORM\HasLifecycleCallbacks()
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

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Weapon", inversedBy="characters", cascade={"all"})
     */
    private $weapon;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Item", inversedBy="characters", cascade={"all"})
     */
    private $items;

    /**
     * @ORM\Column(type="datetime")
     */
    private $createdAt;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $avatarFilename;

    public function __construct()
    {
        $this->items = new ArrayCollection();
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

    public function getWeapon(): ?Weapon
    {
        return $this->weapon;
    }

    public function setWeapon(?Weapon $weapon): self
    {
        $this->weapon = $weapon;

        return $this;
    }

    /**
     * @return Collection|Item[]
     */
    public function getItems(): Collection
    {
        return $this->items;
    }

    public function addItem(Item $item): self
    {
        if (!$this->items->contains($item)) {
            $this->items[] = $item;
        }

        return $this;
    }

    public function removeItem(Item $item): self
    {
        if ($this->items->contains($item)) {
            $this->items->removeElement($item);
        }

        return $this;
    }

    /**
     * @ORM\PrePersist
     */
    public function prePersist(LifecycleEventArgs $args) {
        $now = new \DateTime();
        $this->setCreatedAt($now);
    }


    /**
     * @ORM\PostPersist
     */
    public function postPersist(LifecycleEventArgs $args) {

    }


    /**
     * @ORM\PreUpdate
     */
    public function preUpdate(LifecycleEventArgs $args) {

    }


    /**
     * @ORM\PostUpdate
     */
    public function postUpdate(LifecycleEventArgs $args) {

    }

    /**
     * @ORM\PreRemove
     */
    public function preRemove(LifecycleEventArgs $args) {

    }


    /**
     * @ORM\PostRemove
     */
    public function postRemove(LifecycleEventArgs $args) {

    }

    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTimeInterface $createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    public function getAvatarFilename(): ?string
    {
        return $this->avatarFilename;
    }

    public function setAvatarFilename(string $avatarFilename): self
    {
        $this->avatarFilename = $avatarFilename;

        return $this;
    }
}