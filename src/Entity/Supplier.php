<?php

namespace App\Entity;

use App\Repository\SupplierRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: SupplierRepository::class)]
class Supplier
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 100)]
    private ?string $name = null;

    #[ORM\Column(length: 250, nullable: true)]
    private ?string $address = null;

    #[ORM\Column(length: 100, nullable: true)]
    private ?string $city = null;

    #[ORM\Column(length: 6, nullable: true)]
    private ?string $postal_code = null;

    #[ORM\Column(length: 100, nullable: true)]
    private ?string $pays = null;

    #[ORM\Column(length: 10, nullable: true)]
    private ?string $phone = null;

    #[ORM\Column(length: 10, nullable: true)]
    private ?string $fax = null;

    #[ORM\Column(length: 250, nullable: true)]
    private ?string $mail = null;

    #[ORM\Column(length: 12)]
    private ?string $vat_number = null;

    #[ORM\Column(length: 12, nullable: true)]
    private ?string $sap_number = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $text_supplier = null;

    #[ORM\Column(nullable: true)]
    private ?bool $status = null;

    #[ORM\Column]
    private ?bool $favorite = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }

    public function getAddress(): ?string
    {
        return $this->address;
    }

    public function setAddress(?string $address): static
    {
        $this->address = $address;

        return $this;
    }

    public function getCity(): ?string
    {
        return $this->city;
    }

    public function setCity(?string $city): static
    {
        $this->city = $city;

        return $this;
    }

    public function getPostalCode(): ?string
    {
        return $this->postal_code;
    }

    public function setPostalCode(?string $postal_code): static
    {
        $this->postal_code = $postal_code;

        return $this;
    }

    public function getPays(): ?string
    {
        return $this->pays;
    }

    public function setPays(?string $pays): static
    {
        $this->pays = $pays;

        return $this;
    }

    public function getPhone(): ?string
    {
        return $this->phone;
    }

    public function setPhone(?string $phone): static
    {
        $this->phone = $phone;

        return $this;
    }

    public function getFax(): ?string
    {
        return $this->fax;
    }

    public function setFax(?string $fax): static
    {
        $this->fax = $fax;

        return $this;
    }

    public function getMail(): ?string
    {
        return $this->mail;
    }

    public function setMail(?string $mail): static
    {
        $this->mail = $mail;

        return $this;
    }

    public function getVatNumber(): ?string
    {
        return $this->vat_number;
    }

    public function setVatNumber(string $vat_number): static
    {
        $this->vat_number = $vat_number;

        return $this;
    }

    public function getSapNumber(): ?string
    {
        return $this->sap_number;
    }

    public function setSapNumber(?string $sap_number): static
    {
        $this->sap_number = $sap_number;

        return $this;
    }

    public function getTextSupplier(): ?string
    {
        return $this->text_supplier;
    }

    public function setTextSupplier(?string $text_supplier): static
    {
        $this->text_supplier = $text_supplier;

        return $this;
    }

    public function isStatus(): ?bool
    {
        return $this->status;
    }

    public function setStatus(?bool $status): static
    {
        $this->status = $status;

        return $this;
    }

    public function isFavorite(): ?bool
    {
        return $this->favorite;
    }

    public function setFavorite(bool $favorite): static
    {
        $this->favorite = $favorite;

        return $this;
    }
}
