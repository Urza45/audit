<?php

namespace App\Entity;

use App\Repository\WorkersRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=WorkersRepository::class)
 */
class Workers
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $identifier;

    /**
     * @ORM\ManyToOne(targetEntity=Site::class, inversedBy="workers")
     * @ORM\JoinColumn(nullable=false)
     */
    private $IdSite;

    /**
     * @ORM\OneToMany(targetEntity=CacesDate::class, mappedBy="workers")
     */
    private $Workers;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $firstName;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $lastName;

    public function __construct()
    {
        $this->Workers = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdentifier(): ?string
    {
        return $this->identifier;
    }

    public function setIdentifier(string $identifier): self
    {
        $this->identifier = $identifier;

        return $this;
    }

    public function getIdSite(): ?Site
    {
        return $this->IdSite;
    }

    public function setIdSite(?Site $IdSite): self
    {
        $this->IdSite = $IdSite;

        return $this;
    }

    /**
     * @return Collection<int, CacesDate>
     */
    public function getWorkers(): Collection
    {
        return $this->Workers;
    }

    public function addWorker(CacesDate $worker): self
    {
        if (!$this->Workers->contains($worker)) {
            $this->Workers[] = $worker;
            $worker->setWorkers($this);
        }

        return $this;
    }

    public function removeWorker(CacesDate $worker): self
    {
        if ($this->Workers->removeElement($worker)) {
            // set the owning side to null (unless already changed)
            if ($worker->getWorkers() === $this) {
                $worker->setWorkers(null);
            }
        }

        return $this;
    }

    public function getFirstName(): ?string
    {
        return $this->firstName;
    }

    public function setFirstName(?string $firstName): self
    {
        $this->firstName = $firstName;

        return $this;
    }

    public function getLastName(): ?string
    {
        return $this->lastName;
    }

    public function setLastName(?string $lastName): self
    {
        $this->lastName = $lastName;

        return $this;
    }

    public function __toString()
    {
        $chaine = $this->getFirstName() . ' ' . strtoupper($this->getLastName()) ;
        if ($chaine != ' ') {
            $chaine = $this->getIdentifier() . ' - ' . $chaine;
            return $chaine;
        }
        return $this->getIdentifier();
        
    }
}
