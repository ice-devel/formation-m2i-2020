<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ProductRepository")
 */
class Product
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="datetime")
     */
    private $createdAt;

    /**
     * @ORM\Column(type="string", length=50)
     * @Assert\NotNull()
     * @Assert\Length(max=50)
     */
    private $name;

    /**
     * @ORM\Column(type="decimal", precision=6, scale=2)
     * @Assert\NotNull()
     * @Assert\Regex(
     *     pattern     = "/^\d{1,4}((,|\.)\d{1,2})?$/"
     * )
     */
    private $price;

    /**
     * @ORM\Column(type="text")
     * @Assert\NotNull()
     * @Assert\Length(min=10)
     */
    private $description;

    /**
     * @ORM\Column(type="boolean")
     */
    private $isAvailable;

    public function __construct()
    {
        $this->setCreatedAt(new \DateTime());
        $this->setIsAvailable(true);
    }

    public function getId(): ?int
    {
        return $this->id;
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

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getPrice(): ?string
    {
        return $this->price;
    }

    public function setPrice(string $price): self
    {
        $this->price = $price;

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

    public function getIsAvailable(): ?bool
    {
        return $this->isAvailable;
    }

    public function setIsAvailable(bool $isAvailable): self
    {
        $this->isAvailable = $isAvailable;

        return $this;
    }
}
