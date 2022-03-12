<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\DepozitRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: DepozitRepository::class)]
#[ApiResource(
    normalizationContext: ['groups' => ['read']],
    denormalizationContext: ['groups' => ['write']],
    itemOperations: [
        'get' => ['normalization_context' => ['groups' => ['get']]],
        'put',
    ],
    collectionOperations: [
        'get',
        'post',
        
    ]
)]
class Depozit
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[Groups(["get","read","write"])]
    #[ORM\Column(type: 'string', length: 255)]
    private $nume;

    #[Groups(["get","read","write"])]
    #[ORM\Column(type: 'string', length: 255)]
    private $locatie;

    #[Groups(["get","read","write"])]
    #[ORM\Column(type: 'date', nullable: true)]
    private $dataIntrare;

    #[Groups(["get","read"])]
    #[ORM\Column(type: 'date', nullable: true)]
    private $dataIesire;

    #[Groups(["get","read","write"])]
    #[ORM\OneToMany(mappedBy: 'depozit', targetEntity: Marfa::class)]
    private $marfa;

    #[Groups(["get","read","write"])]   
    #[ORM\OneToOne(inversedBy: 'depozit', targetEntity: Angajat::class, cascade: ['persist', 'remove'])]
    private $angajati;

    public function __construct()
    {
        $this->marfa = new ArrayCollection();
    }

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

    /**
     * @return Collection<int, Marfa>
     */
    public function getMarfa(): Collection
    {
        return $this->marfa;
    }

    public function addMarfa(Marfa $marfa): self
    {
        if (!$this->marfa->contains($marfa)) {
            $this->marfa[] = $marfa;
            $marfa->setDepozit($this);
        }

        return $this;
    }

    public function removeMarfa(Marfa $marfa): self
    {
        if ($this->marfa->removeElement($marfa)) {
            // set the owning side to null (unless already changed)
            if ($marfa->getDepozit() === $this) {
                $marfa->setDepozit(null);
            }
        }

        return $this;
    }

    public function getAngajati(): ?Angajat
    {
        return $this->angajati;
    }

    public function setAngajati(?Angajat $angajati): self
    {
        $this->angajati = $angajati;

        return $this;
    }
}
