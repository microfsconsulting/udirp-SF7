<?php

namespace App\Entity;

use App\Repository\DeviceSoftwareRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: DeviceSoftwareRepository::class)]
class DeviceSoftware
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne]
    private ?Device $device = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $date = null;

    #[ORM\ManyToOne]
    private ?Software $software = null;

    #[ORM\ManyToOne]
    private ?Order $aOrder = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDevice(): ?Device
    {
        return $this->device;
    }

    public function setDevice(?Device $device): static
    {
        $this->device = $device;

        return $this;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(?\DateTimeInterface $date): static
    {
        $this->date = $date;

        return $this;
    }

    public function getSoftware(): ?Software
    {
        return $this->software;
    }

    public function setSoftware(?Software $software): static
    {
        $this->software = $software;

        return $this;
    }

    public function getAOrder(): ?Order
    {
        return $this->aOrder;
    }

    public function setAOrder(?Order $aOrder): static
    {
        $this->aOrder = $aOrder;

        return $this;
    }
}
