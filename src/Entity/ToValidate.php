<?php

namespace App\Entity;

use App\Repository\ToValidateRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ToValidateRepository::class)]
class ToValidate
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $unique_link = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUniqueLink(): ?string
    {
        return $this->unique_link;
    }

    public function setUniqueLink(string $unique_link): static
    {
        $this->unique_link = $unique_link;

        return $this;
    }
}
