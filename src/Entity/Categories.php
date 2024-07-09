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
     * @ORM\OneToMany(targetEntity=CacesDate::class, mappedBy="categories")
     */
    private $categories;

    public function __construct()
    {
        $this->categories = new ArrayCollection();
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

    public function __toString(): string
        {
            return $this->getIdNormes()->getShortName() . ' - ' . $this->getName();
        }

    /**
     * @return Collection<int, CacesDate>
     */
    public function getCategories(): Collection
    {
        return $this->categories;
    }

    public function addCategory(CacesDate $category): self
    {
        if (!$this->categories->contains($category)) {
            $this->categories[] = $category;
            $category->setCategories($this);
        }

        return $this;
    }

    public function removeCategory(CacesDate $category): self
    {
        if ($this->categories->removeElement($category)) {
            // set the owning side to null (unless already changed)
            if ($category->getCategories() === $this) {
                $category->setCategories(null);
            }
        }

        return $this;
    }

}
