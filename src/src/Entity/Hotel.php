<?php

namespace App\Entity;

use App\Repository\HotelRepository;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * ...
 * @Gedmo\SoftDeleteable(fieldName="deletedAt")
 * @ORM\Entity(repositoryClass= HotelRepository::class)
 */


class Hotel
{

    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type= "string", length= 255)
     */
    private $name;

    /**
     * @ORM\Column(type= "string", length= 255)
     */
    private $address;

    /**
     *
     * @ORM\Column(name="deleted_at", type="datetime_immutable", nullable=true)
     */
    private $deletedAt;

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

    public function getAddress(): ?string
    {
        return $this->address;
    }

    public function setAddress(string $address): self
    {
        $this->address = $address;

        return $this;
    }

//    public function getDeletedAt(): ?\DateTimeImmutable
//    {
//        return $this->deletedAt;
//    }
//
//    public function setDeletedAt(?\DateTimeImmutable $deletedAt): self
//    {
//        $this->deletedAt = $deletedAt;
//
//        return $this;
//    }
}
