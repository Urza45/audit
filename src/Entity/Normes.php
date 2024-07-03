<?php

namespace App\Entity;

use App\Repository\NormesRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=NormesRepository::class)
 */
class Normes
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=10)
     */
    private $ShortName;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $LongName;

    /**
     * @ORM\Column(type="integer")
     */
    private $UpdateYear;

    /**
     * @ORM\OneToMany(targetEntity=Categories::class, mappedBy="IdNormes")
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

    public function getShortName(): ?string
    {
        return $this->ShortName;
    }

    public function setShortName(string $ShortName): self
    {
        $this->ShortName = $ShortName;

        return $this;
    }

    public function getLongName(): ?string
    {
        return $this->LongName;
    }

    public function setLongName(string $LongName): self
    {
        $this->LongName = $LongName;

        return $this;
    }

    public function getUpdateYear(): ?int
    {
        return $this->UpdateYear;
    }

    public function setUpdateYear(int $UpdateYear): self
    {
        $this->UpdateYear = $UpdateYear;

        return $this;
    }

    /**
     * @return Collection<int, Categories>
     */
    public function getCategories(): Collection
    {
        return $this->categories;
    }

    public function addCategory(Categories $category): self
    {
        if (!$this->categories->contains($category)) {
            $this->categories[] = $category;
            $category->setIdNormes($this);
        }

        return $this;
    }

    public function removeCategory(Categories $category): self
    {
        if ($this->categories->removeElement($category)) {
            // set the owning side to null (unless already changed)
            if ($category->getIdNormes() === $this) {
                $category->setIdNormes(null);
            }
        }

        return $this;
    }

    public function __toString(): string
        {
            return $this->getShortName(). ' - ' . $this->getLongName();
        }
}
