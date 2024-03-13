<?php

namespace App\Entity;

use App\Repository\OrderRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: OrderRepository::class)]
#[ORM\Table(name: '`order`')]
class Order
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false)]
    private ?Contact $udi = null;

    #[ORM\ManyToOne]
    private ?Status $status = null;

    #[ORM\ManyToOne]
    private ?Supplier $supplier = null;

    #[ORM\ManyToOne]
    private ?Entity $entity = null;

    #[ORM\ManyToOne]
    private ?Contact $contact = null;

    #[ORM\ManyToOne]
    private ?Contact $user = null;

    #[ORM\ManyToOne]
    private ?Contact $sap_send = null;

    #[ORM\ManyToOne]
    private ?Contact $sap_create = null;

    #[ORM\ManyToOne]
    private ?Contact $validator = null;

    #[ORM\ManyToOne]
    private ?Contact $tovalidate = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $date_create = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $date_send = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $date_validate = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $date_entity_number = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $date_receive = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $date_delivery = null;

    #[ORM\Column(length: 10)]
    private ?string $number = null;

    #[ORM\Column(length: 20, nullable: true)]
    private ?string $account = null;

    #[ORM\Column(length: 35, nullable: true)]
    private ?string $entity_number = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $label = null;

    #[ORM\ManyToOne]
    private ?Contact $receiver = null;

    #[ORM\ManyToOne]
    private ?Contact $deliver = null;

    #[ORM\Column(nullable: true)]
    private ?bool $atn = null;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false)]
    private ?DeliveryAddress $delivery_address = null;

    #[ORM\ManyToOne]
    private ?Contact $user_recept = null;

    #[ORM\Column(nullable: true)]
    private ?bool $market = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $date_prepa = null;

    #[ORM\Column(nullable: true)]
    private ?bool $status_prepa = null;

    #[ORM\OneToMany(mappedBy: 'aOrder', targetEntity: ContactSoftware::class)]
    private Collection $contactSoftware;

    #[ORM\OneToMany(mappedBy: 'order', targetEntity: Item::class, orphanRemoval: true)]
    private Collection $items;

    #[ORM\OneToMany(mappedBy: 'order', targetEntity: FileUploaded::class)]
    private Collection $files;

    public function __construct()
    {
        $this->contactSoftware = new ArrayCollection();
        $this->items = new ArrayCollection();
        $this->files = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUdi(): ?Contact
    {
        return $this->udi;
    }

    public function setUdi(?Contact $udi): static
    {
        $this->udi = $udi;

        return $this;
    }

    public function getStatus(): ?Status
    {
        return $this->status;
    }

    public function setStatus(?Status $status): static
    {
        $this->status = $status;

        return $this;
    }

    public function getSupplier(): ?Supplier
    {
        return $this->supplier;
    }

    public function setSupplier(?Supplier $supplier): static
    {
        $this->supplier = $supplier;

        return $this;
    }

    public function getEntity(): ?Entity
    {
        return $this->entity;
    }

    public function setEntity(?Entity $entity): static
    {
        $this->entity = $entity;

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

    public function getUser(): ?Contact
    {
        return $this->user;
    }

    public function setUser(?Contact $user): static
    {
        $this->user = $user;

        return $this;
    }

    public function getSapSend(): ?Contact
    {
        return $this->sap_send;
    }

    public function setSapSend(?Contact $sap_send): static
    {
        $this->sap_send = $sap_send;

        return $this;
    }

    public function getSapCreate(): ?Contact
    {
        return $this->sap_create;
    }

    public function setSapCreate(?Contact $sap_create): static
    {
        $this->sap_create = $sap_create;

        return $this;
    }

    public function getValidator(): ?Contact
    {
        return $this->validator;
    }

    public function setValidator(?Contact $validator): static
    {
        $this->validator = $validator;

        return $this;
    }

    public function getTovalidate(): ?Contact
    {
        return $this->tovalidate;
    }

    public function setTovalidate(?Contact $tovalidate): static
    {
        $this->tovalidate = $tovalidate;

        return $this;
    }

    public function getDateCreate(): ?\DateTimeInterface
    {
        return $this->date_create;
    }

    public function setDateCreate(\DateTimeInterface $date_create): static
    {
        $this->date_create = $date_create;

        return $this;
    }

    public function getDateSend(): ?\DateTimeInterface
    {
        return $this->date_send;
    }

    public function setDateSend(?\DateTimeInterface $date_send): static
    {
        $this->date_send = $date_send;

        return $this;
    }

    public function getDateValidate(): ?\DateTimeInterface
    {
        return $this->date_validate;
    }

    public function setDateValidate(?\DateTimeInterface $date_validate): static
    {
        $this->date_validate = $date_validate;

        return $this;
    }

    public function getDateEntityNumber(): ?\DateTimeInterface
    {
        return $this->date_entity_number;
    }

    public function setDateEntityNumber(?\DateTimeInterface $date_entity_number): static
    {
        $this->date_entity_number = $date_entity_number;

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

    public function getDateDelivery(): ?\DateTimeInterface
    {
        return $this->date_delivery;
    }

    public function setDateDelivery(?\DateTimeInterface $date_delivery): static
    {
        $this->date_delivery = $date_delivery;

        return $this;
    }

    public function getNumber(): ?string
    {
        return $this->number;
    }

    public function setNumber(string $number): static
    {
        $this->number = $number;

        return $this;
    }

    public function getAccount(): ?string
    {
        return $this->account;
    }

    public function setAccount(?string $account): static
    {
        $this->account = $account;

        return $this;
    }

    public function getEntityNumber(): ?string
    {
        return $this->entity_number;
    }

    public function setEntityNumber(?string $entity_number): static
    {
        $this->entity_number = $entity_number;

        return $this;
    }

    public function getLabel(): ?string
    {
        return $this->label;
    }

    public function setLabel(?string $label): static
    {
        $this->label = $label;

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

    public function getDeliver(): ?Contact
    {
        return $this->deliver;
    }

    public function setDeliver(?Contact $deliver): static
    {
        $this->deliver = $deliver;

        return $this;
    }

    public function isAtn(): ?bool
    {
        return $this->atn;
    }

    public function setAtn(?bool $atn): static
    {
        $this->atn = $atn;

        return $this;
    }

    public function getDeliveryAddress(): ?DeliveryAddress
    {
        return $this->delivery_address;
    }

    public function setDeliveryAddress(?DeliveryAddress $delivery_address): static
    {
        $this->delivery_address = $delivery_address;

        return $this;
    }

    public function getUserRecept(): ?Contact
    {
        return $this->user_recept;
    }

    public function setUserRecept(?Contact $user_recept): static
    {
        $this->user_recept = $user_recept;

        return $this;
    }

    public function isMarket(): ?bool
    {
        return $this->market;
    }

    public function setMarket(?bool $market): static
    {
        $this->market = $market;

        return $this;
    }

    public function getDatePrepa(): ?\DateTimeInterface
    {
        return $this->date_prepa;
    }

    public function setDatePrepa(?\DateTimeInterface $date_prepa): static
    {
        $this->date_prepa = $date_prepa;

        return $this;
    }

    public function getStatusPrepa(): ?bool
    {
        return $this->status_prepa;
    }

    public function setStatusPrepa(?bool $status_prepa): static
    {
        $this->status_prepa = $status_prepa;

        return $this;
    }

    /**
     * @return Collection<int, ContactSoftware>
     */
    public function getContactSoftware(): Collection
    {
        return $this->contactSoftware;
    }

    public function addContactSoftware(ContactSoftware $contactSoftware): static
    {
        if (!$this->contactSoftware->contains($contactSoftware)) {
            $this->contactSoftware->add($contactSoftware);
            $contactSoftware->setAOrder($this);
        }

        return $this;
    }

    public function removeContactSoftware(ContactSoftware $contactSoftware): static
    {
        if ($this->contactSoftware->removeElement($contactSoftware)) {
            // set the owning side to null (unless already changed)
            if ($contactSoftware->getAOrder() === $this) {
                $contactSoftware->setAOrder(null);
            }
        }

        return $this;
    }

    public function __toString(): string
    {
        return "$this->entity - $this->number - $this->contact";
    }

    /**
     * @return Collection<int, Item>
     */
    public function getItems(): Collection
    {
        return $this->items;
    }

    public function addItem(Item $item): static
    {
        if (!$this->items->contains($item)) {
            $this->items->add($item);
            $item->setOrder($this);
        }

        return $this;
    }

    public function removeItem(Item $item): static
    {
        if ($this->items->removeElement($item)) {
            // set the owning side to null (unless already changed)
            if ($item->getOrder() === $this) {
                $item->setOrder(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, FileUploaded>
     */
    public function getFiles(): Collection
    {
        return $this->files;
    }

    public function addFile(FileUploaded $file): static
    {
        if (!$this->files->contains($file)) {
            $this->files->add($file);
            $file->setOrder($this);
        }

        return $this;
    }

    public function removeFile(FileUploaded $file): static
    {
        if ($this->files->removeElement($file)) {
            // set the owning side to null (unless already changed)
            if ($file->getOrder() === $this) {
                $file->setOrder(null);
            }
        }

        return $this;
    }

    public function getStat(){

        if($this->getStatus() != null) {
            //Suspendu
            if ($this->getStatus()->getId() == 3) {

                return "Suspendu";

            }
            //Annule
            if ($this->getStatus()->getId() == 4) {

                return "Annulé";

            }
            //Fermé
            if ($this->getStatus()->getId() == 2) {

                return "Fermé";

            }
            if ($this->getTovalidate() == null && $this->getDateValidate() == null) {
                return "4";
            }

            //En attente de validation BLEU info
            if ($this->getDateValidate() == null) {
                return "Att validation";
            }

            //En attente de commande Orange warning
            if ($this->getDateEntityNumber() == null) {
                return "Att commande";
            }

            //En attente de reception
            if ($this->getDateReceive() == null) {
                $allReceive = false;
                if(count($this->getItems()) > 0){

                    foreach ($this->getItems() as $item){

                        if($item->getReceive() == true){

                            $allReceive = true;

                        }

                    }

                }else{

                    $allReceive = false;
                }
                if($allReceive){
                    return "Récéptionnée";
                }else{
                    return "Récéption partielle";
                }

            }

            //En attente de distribution
            if ($this->getDateDelivery() == null) {

                return "Att distribution";
            }



        }


        return "-1";





    }
}
