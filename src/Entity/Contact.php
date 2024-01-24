<?php

namespace App\Entity;

use App\Repository\ContactRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ContactRepository::class)]
class Contact
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 100)]
    private ?string $first_name = null;

    #[ORM\Column(length: 100)]
    private ?string $last_name = null;

    #[ORM\Column(length: 20)]
    private ?string $phone = null;

    #[ORM\Column(length: 20, nullable: true)]
    private ?string $gsm = null;

    #[ORM\Column(length: 150)]
    private ?string $mail = null;

    #[ORM\Column(length: 100, nullable: true)]
    private ?string $location = null;

    #[ORM\Column(length: 10)]
    private ?string $matricule = null;

    #[ORM\Column(length: 20)]
    private ?string $role = null;

    #[ORM\OneToMany(mappedBy: 'contact', targetEntity: ContactSoftware::class)]
    private Collection $software;

    public function __construct()
    {
        $this->software = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFirstName(): ?string
    {
        return $this->first_name;
    }

    public function setFirstName(string $first_name): static
    {
        $this->first_name = $first_name;

        return $this;
    }

    public function getLastName(): ?string
    {
        return $this->last_name;
    }

    public function setLastName(string $last_name): static
    {
        $this->last_name = $last_name;

        return $this;
    }

    public function getPhone(): ?string
    {
        return $this->phone;
    }

    public function setPhone(string $phone): static
    {
        $this->phone = $phone;

        return $this;
    }

    public function getGsm(): ?string
    {
        return $this->gsm;
    }

    public function setGsm(?string $gsm): static
    {
        $this->gsm = $gsm;

        return $this;
    }

    public function getMail(): ?string
    {
        return $this->mail;
    }

    public function setMail(string $mail): static
    {
        $this->mail = $mail;

        return $this;
    }

    public function getLocation(): ?string
    {
        return $this->location;
    }

    public function setLocation(?string $location): static
    {
        $this->location = $location;

        return $this;
    }

    public function getMatricule(): ?string
    {
        return $this->matricule;
    }

    public function setMatricule(string $matricule): static
    {
        $this->matricule = $matricule;

        return $this;
    }

    public function getRole(): ?string
    {
        return $this->role;
    }

    public function setRole(string $role): static
    {
        $this->role = $role;

        return $this;
    }

    /**
     * @return Collection<int, ContactSoftware>
     */
    public function getSoftware(): Collection
    {
        return $this->software;
    }

    public function addSoftware(ContactSoftware $software): static
    {
        if (!$this->software->contains($software)) {
            $this->software->add($software);
            $software->setContact($this);
        }

        return $this;
    }

    public function removeSoftware(ContactSoftware $software): static
    {
        if ($this->software->removeElement($software)) {
            // set the owning side to null (unless already changed)
            if ($software->getContact() === $this) {
                $software->setContact(null);
            }
        }

        return $this;
    }

    public function __toString(): string
    {
        return "$this->first_name $this->last_name";
    }
}
