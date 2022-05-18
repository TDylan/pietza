<?php

namespace App\Entity;

use App\Repository\PizzaRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=PizzaRepository::class)
 */
class Pizza
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $image;

    /**
     * @ORM\ManyToOne(targetEntity=Category::class, inversedBy="pizzas")
     */
    private $category;

    /**
     * @ORM\OneToMany(targetEntity=Order::class, mappedBy="pizza")
     */
    private $Orders2;



    public function __construct()
    {
        $this->orders = new ArrayCollection();
        $this->Orders2 = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(string $image): self
    {
        $this->image = $image;

        return $this;
    }

    public function getCategory(): ?category
    {
        return $this->category;
    }

    public function setCategory(?category $category): self
    {
        $this->category = $category;

        return $this;
    }

    /**
     * @return Collection<int, Order>
     */
    public function getOrders2(): Collection
    {
        return $this->Orders2;
    }

    public function addOrders2(Order $orders2): self
    {
        if (!$this->Orders2->contains($orders2)) {
            $this->Orders2[] = $orders2;
            $orders2->setPizza($this);
        }

        return $this;
    }

    public function removeOrders2(Order $orders2): self
    {
        if ($this->Orders2->removeElement($orders2)) {
            // set the owning side to null (unless already changed)
            if ($orders2->getPizza() === $this) {
                $orders2->setPizza(null);
            }
        }

        return $this;
    }


}
