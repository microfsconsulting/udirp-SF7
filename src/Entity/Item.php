<?php

namespace App\Entity;

use App\Repository\ItemRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ItemRepository::class)]
class Item
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $label = null;

    #[ORM\Column(length: 30)]
    private ?string $reference = null;

    #[ORM\Column]
    private ?int $amount = null;

    #[ORM\Column(length: 10)]
    private ?string $unit_price = null;

    #[ORM\Column]
    private ?bool $insurance = null;

    #[ORM\Column]
    private ?bool $mobile = null;

    #[ORM\Column(length: 30, nullable: true)]
    private ?string $otp = null;

    #[ORM\Column(nullable: true)]
    private ?bool $receive = null;

    #[ORM\Column(length: 6, nullable: true)]
    private ?string $discount = null;

    #[ORM\ManyToOne]
    private ?Contact $receiver = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $date_receive = null;

    #[ORM\ManyToOne(inversedBy: 'items')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Order $order = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLabel(): ?string
    {
        return $this->label;
    }

    public function setLabel(string $label): static
    {
        $this->label = $label;

        return $this;
    }

    public function getReference(): ?string
    {
        return $this->reference;
    }

    public function setReference(string $reference): static
    {
        $this->reference = $reference;

        return $this;
    }

    public function getAmount(): ?int
    {
        return $this->amount;
    }

    public function setAmount(int $amount): static
    {
        $this->amount = $amount;

        return $this;
    }

    public function getUnitPrice(): ?string
    {
        return $this->unit_price;
    }

    public function setUnitPrice(string $unit_price): static
    {
        $this->unit_price = $unit_price;

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

    public function isMobile(): ?bool
    {
        return $this->mobile;
    }

    public function setMobile(bool $mobile): static
    {
        $this->mobile = $mobile;

        return $this;
    }

    public function getOtp(): ?string
    {
        return $this->otp;
    }

    public function setOtp(?string $otp): static
    {
        $this->otp = $otp;

        return $this;
    }

    public function isReceive(): ?bool
    {
        return $this->receive;
    }

    public function setReceive(?bool $receive): static
    {
        $this->receive = $receive;

        return $this;
    }

    public function getDiscount(): ?string
    {
        return $this->discount;
    }

    public function setDiscount(?string $discount): static
    {
        $this->discount = $discount;

        return $this;
    }

    public function getReceiver(): ?Contact
    {
        return $this->receiver;
    }

    public function setReceiver(?Contact $receiver): static
    {
        $this->receiver = $receiver;

        return $this;
    }

    public function getDateReceive(): ?\DateTimeInterface
    {
        return $this->date_receive;
    }

    public function setDateReceive(?\DateTimeInterface $date_receive): static
    {
        $this->date_receive = $date_receive;

        return $this;
    }

    public function getOrder(): ?Order
    {
        return $this->order;
    }

    public function setOrder(?Order $order): static
    {
        $this->order = $order;

        return $this;
    }
}
