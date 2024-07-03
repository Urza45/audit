<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Repository\CategoriesRepository;
use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Entity(repositoryClass=CategoriesRepository::class)
 */
class Categories
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=Normes::class, inversedBy="categories")
     * @ORM\JoinColumn(nullable=false)
     */
    private $IdNormes;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $text;

    /**
     * @ORM\ManyToMany(targetEntity=Workers::class, mappedBy="categories")
     */
    private $workers;

    public function __construct()
    {
        $this->workers = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdNormes(): ?Normes
    {
        return $this->IdNormes;
    }

    public function setIdNormes(?Normes $IdNormes): self
    {
        $this->IdNormes = $IdNormes;

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

    public function getText(): ?string
    {
        return $this->text;
    }

    public function setText(?string $text): self
    {
        $this->text = $text;

        return $this;
    }

    /**
     * @return Collection<int, Workers>
     */
    public function getWorkers(): Collection
    {
        return $this->workers;
    }

    public function addWorker(Workers $worker): self
    {
        if (!$this->workers->contains($worker)) {
            $this->workers[] = $worker;
            $worker->addCategory($this);
        }

        return $this;
    }

    public function removeWorker(Workers $worker): self
    {
        if ($this->workers->removeElement($worker)) {
            $worker->removeCategory($this);
        }

        return $this;
    }

    public function __toString(): string
        {
            return $this->getName();
        }
}
