<?php

namespace App\Entity;

use App\Repository\ShowRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ShowRepository::class)
 */
class Show
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
    private $date;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $tourName;

    /**
     * @ORM\OneToOne(targetEntity=hall::class, inversedBy="hall", cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $hall;

    /**
     * @ORM\ManyToMany(targetEntity=band::class, inversedBy="concerts")
     */
    private $bands;

    public function __construct()
    {
        $this->bands = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(\DateTimeInterface $date): self
    {
        $this->date = $date;

        return $this;
    }

    public function getTourName(): ?string
    {
        return $this->tourName;
    }

    public function setTourName(?string $tourName): self
    {
        $this->tourName = $tourName;

        return $this;
    }

    public function getHall(): ?hall
    {
        return $this->hall;
    }

    public function setHall(hall $hall): self
    {
        $this->hall = $hall;

        return $this;
    }

    /**
     * @return Collection|band[]
     */
    public function getBands(): Collection
    {
        return $this->bands;
    }

    public function addBand(band $band): self
    {
        if (!$this->bands->contains($band)) {
            $this->bands[] = $band;
        }

        return $this;
    }

    public function removeBand(band $band): self
    {
        $this->bands->removeElement($band);

        return $this;
    }
}
