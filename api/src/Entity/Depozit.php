<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\DepozitRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: DepozitRepository::class)]
#[ApiResource]
class Depozit
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    private $nume;

    #[ORM\Column(type: 'string', length: 255)]
    private $locatie;

    #[ORM\Column(type: 'date', nullable: true)]
    private $dataIntrare;

    #[ORM\Column(type: 'date', nullable: true)]
    private $dataIesire;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNume(): ?string
    {
        return $this->nume;
    }

    public function setNume(string $nume): self
    {
        $this->nume = $nume;

        return $this;
    }

    public function getLocatie(): ?string
    {
        return $this->locatie;
    }

    public function setLocatie(string $locatie): self
    {
        $this->locatie = $locatie;

        return $this;
    }

    public function getDataIntrare(): ?\DateTimeInterface
    {
        return $this->dataIntrare;
    }

    public function setDataIntrare(?\DateTimeInterface $dataIntrare): self
    {
        $this->dataIntrare = $dataIntrare;

        return $this;
    }

    public function getDataIesire(): ?\DateTimeInterface
    {
        return $this->dataIesire;
    }

    public function setDataIesire(?\DateTimeInterface $dataIesire): self
    {
        $this->dataIesire = $dataIesire;

        return $this;
    }
}
