<?php

namespace App\Entity;

use App\Repository\DeviceRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: DeviceRepository::class)]
class Device
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne]
    private ?System $system = null;

    #[ORM\ManyToOne]
    private ?Building $building = null;

    #[ORM\ManyToOne]
    private ?Brand $brand = null;

    #[ORM\ManyToOne]
    private ?DeviceType $type = null;

    #[ORM\ManyToOne]
    private ?Contact $contact = null;

    #[ORM\Column(length: 16, nullable: true)]
    private ?string $udi_number = null;

    #[ORM\Column(length: 100, nullable: true)]
    private ?string $model = null;

    #[ORM\Column(length: 100, nullable: true)]
    private ?string $serial_number = null;

    #[ORM\Column(length: 8, nullable: true)]
    private ?string $room = null;

    #[ORM\Column(length: 10, nullable: true)]
    private ?string $plug = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $comment = null;

    #[ORM\Column]
    private ?bool $support = null;

    #[ORM\Column]
    private ?bool $insurance = null;

    #[ORM\Column(length: 10, nullable: true)]
    private ?string $plug_id = null;

    #[ORM\ManyToOne]
    private ?Department $department = null;

    #[ORM\OneToMany(mappedBy: 'device', targetEntity: Mac::class)]
    private Collection $macs;

    public function __construct()
    {
        $this->macs = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getSystem(): ?System
    {
        return $this->system;
    }

    public function setSystem(?System $system): static
    {
        $this->system = $system;

        return $this;
    }

    public function getBuilding(): ?Building
    {
        return $this->building;
    }

    public function setBuilding(?Building $building): static
    {
        $this->building = $building;

        return $this;
    }

    public function getBrand(): ?Brand
    {
        return $this->brand;
    }

    public function setBrand(?Brand $brand): static
    {
        $this->brand = $brand;

        return $this;
    }

    public function getType(): ?DeviceType
    {
        return $this->type;
    }

    public function setType(?DeviceType $type): static
    {
        $this->type = $type;

        return $this;
    }

    public function getContact(): ?Contact
    {
        return $this->contact;
    }

    public function setContact(?Contact $contact): static
    {
        $this->contact = $contact;

        return $this;
    }

    public function getUdiNumber(): ?string
    {
        return $this->udi_number;
    }

    public function setUdiNumber(?string $udi_number): static
    {
        $this->udi_number = $udi_number;

        return $this;
    }

    public function getModel(): ?string
    {
        return $this->model;
    }

    public function setModel(?string $model): static
    {
        $this->model = $model;

        return $this;
    }

    public function getSerialNumber(): ?string
    {
        return $this->serial_number;
    }

    public function setSerialNumber(?string $serial_number): static
    {
        $this->serial_number = $serial_number;

        return $this;
    }

    public function getRoom(): ?string
    {
        return $this->room;
    }

    public function setRoom(?string $room): static
    {
        $this->room = $room;

        return $this;
    }

    public function getPlug(): ?string
    {
        return $this->plug;
    }

    public function setPlug(?string $plug): static
    {
        $this->plug = $plug;

        return $this;
    }

    public function getComment(): ?string
    {
        return $this->comment;
    }

    public function setComment(?string $comment): static
    {
        $this->comment = $comment;

        return $this;
    }

    public function isSupport(): ?bool
    {
        return $this->support;
    }

    public function setSupport(bool $support): static
    {
        $this->support = $support;

        return $this;
    }

    public function isInsurance(): ?bool
    {
        return $this->insurance;
    }

    public function setInsurance(bool $insurance): static
    {
        $this->insurance = $insurance;

        return $this;
    }

    public function getPlugId(): ?string
    {
        return $this->plug_id;
    }

    public function setPlugId(?string $plug_id): static
    {
        $this->plug_id = $plug_id;

        return $this;
    }

    public function getDepartment(): ?Department
    {
        return $this->department;
    }

    public function setDepartment(?Department $department): static
    {
        $this->department = $department;

        return $this;
    }

    /**
     * @return Collection<int, Mac>
     */
    public function getMacs(): Collection
    {
        return $this->macs;
    }

    public function addMac(Mac $mac): static
    {
        if (!$this->macs->contains($mac)) {
            $this->macs->add($mac);
            $mac->setDevice($this);
        }

        return $this;
    }

    public function removeMac(Mac $mac): static
    {
        if ($this->macs->removeElement($mac)) {
            // set the owning side to null (unless already changed)
            if ($mac->getDevice() === $this) {
                $mac->setDevice(null);
            }
        }

        return $this;
    }
}
