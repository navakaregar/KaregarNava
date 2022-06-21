<?php

namespace App\Entity;

use App\Repository\AttractionRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass= AttractionRepository::class)
 * @ORM\MappedSuperclass
 * @ORM\DiscriminatorColumn (name="type", type="string")
 * @ORM\DiscriminatorMap ({"location":"Location","event":"Event","attraction":"Attraction"})
 */
class Attraction
{
    /**
     * @ORM\Column(type= "integer")
     * @ORM\Id
     * @ORM\GeneratedValue
     */
    protected $id;

    /**
     * @ORM\Column(type= "string", length= 255)
     */
    protected $name;

    /**
     * @ORM\Column(type= "string", length= 255, nullable= true)
     */
    protected $shortDescription;

    /**
     * @ORM\Column(type= "string", length= 255, nullable= true)
     */
    protected $fullDescription;

    /**
     * @ORM\Column(type= "integer")
     */
    protected $score;

    /**
     * @ORM\Column(type= "datetime_immutable")
     */
    protected $createdAt;

    /**
     * @ORM\Column(type= "datetime_immutable")
     */
    protected $updatedAt;

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

    public function getShortDescription(): ?string
    {
        return $this->shortDescription;
    }

    public function setShortDescription(?string $shortDescription): self
    {
        $this->shortDescription = $shortDescription;

        return $this;
    }

    public function getFullDescription(): ?string
    {
        return $this->fullDescription;
    }

    public function setFullDescription(?string $fullDescription): self
    {
        $this->fullDescription = $fullDescription;

        return $this;
    }

    public function getScore(): ?int
    {
        return $this->score;
    }

    public function setScore(int $score): self
    {
        $this->score = $score;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeImmutable
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTimeImmutable $createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    public function getUpdatedAt(): ?\DateTimeImmutable
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt(\DateTimeImmutable $updatedAt): self
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }
}
