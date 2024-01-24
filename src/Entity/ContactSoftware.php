<?php

namespace App\Entity;

use App\Repository\ContactSoftwareRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ContactSoftwareRepository::class)]
class ContactSoftware
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'software')]
    private ?Contact $contact = null;

    #[ORM\ManyToOne(inversedBy: 'contact')]
    private ?Software $software = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $date = null;

    #[ORM\ManyToOne(inversedBy: 'contactSoftware')]
    private ?Order $aOrder = null;

    public function getId(): ?int
    {
        return $this->id;
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

    public function getSoftware(): ?Software
    {
        return $this->software;
    }

    public function setSoftware(?Software $software): static
    {
        $this->software = $software;

        return $this;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(\DateTimeInterface $date): static
    {
        $this->date = $date;

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
