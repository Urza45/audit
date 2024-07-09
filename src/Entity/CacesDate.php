<?php

namespace App\Entity;

use App\Repository\CacesDateRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CacesDateRepository::class)
 */
class CacesDate
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="date")
     */
    private $ObtentionDate;

    /**
     * @ORM\ManyToOne(targetEntity=Categories::class, inversedBy="categories")
     */
    private $categories;

    /**
     * @ORM\ManyToOne(targetEntity=Workers::class, inversedBy="Workers")
     */
    private $workers;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getObtentionDate(): ?\DateTimeInterface
    {
        return $this->ObtentionDate;
    }

    public function setObtentionDate(\DateTimeInterface $ObtentionDate): self
    {
        $this->ObtentionDate = $ObtentionDate;

        return $this;
    }

    public function getCategories(): ?Categories
    {
        return $this->categories;
    }

    public function setCategories(?Categories $categories): self
    {
        $this->categories = $categories;

        return $this;
    }

    public function getWorkers(): ?Workers
    {
        return $this->workers;
    }

    public function setWorkers(?Workers $workers): self
    {
        $this->workers = $workers;

        return $this;
    }

}
