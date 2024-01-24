<?php

namespace App\Entity;

use App\Repository\SoftwareRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: SoftwareRepository::class)]
class Software
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 100)]
    private ?string $company = null;

    #[ORM\Column(length: 150)]
    private ?string $product = null;

    #[ORM\Column(length: 100)]
    private ?string $version = null;

    #[ORM\Column(length: 255)]
    private ?string $serial = null;

    #[ORM\Column]
    private ?bool $status = null;

    #[ORM\OneToMany(mappedBy: 'software', targetEntity: ContactSoftware::class)]
    private Collection $contact;

    public function __construct()
    {
        $this->contact = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCompany(): ?string
    {
        return $this->company;
    }

    public function setCompany(string $company): static
    {
        $this->company = $company;

        return $this;
    }

    public function getProduct(): ?string
    {
        return $this->product;
    }

    public function setProduct(string $product): static
    {
        $this->product = $product;

        return $this;
    }

    public function getVersion(): ?string
    {
        return $this->version;
    }

    public function setVersion(string $version): static
    {
        $this->version = $version;

        return $this;
    }

    public function getSerial(): ?string
    {
        return $this->serial;
    }

    public function setSerial(string $serial): static
    {
        $this->serial = $serial;

        return $this;
    }

    public function isStatus(): ?bool
    {
        return $this->status;
    }

    public function setStatus(bool $status): static
    {
        $this->status = $status;

        return $this;
    }

    /**
     * @return Collection<int, ContactSoftware>
     */
    public function getContact(): Collection
    {
        return $this->contact;
    }

    public function addContact(ContactSoftware $contact): static
    {
        if (!$this->contact->contains($contact)) {
            $this->contact->add($contact);
            $contact->setSoftware($this);
        }

        return $this;
    }

    public function removeContact(ContactSoftware $contact): static
    {
        if ($this->contact->removeElement($contact)) {
            // set the owning side to null (unless already changed)
            if ($contact->getSoftware() === $this) {
                $contact->setSoftware(null);
            }
        }

        return $this;
    }
}
