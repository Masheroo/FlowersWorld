<?php

namespace App\Entity;

use App\Repository\CategoryRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CategoryRepository::class)]
class Category
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\OneToMany(mappedBy: 'category', targetEntity: Product::class)]
    private Collection $productsCollection;

    public function __construct()
    {
        $this->productsCollection = new ArrayCollection();
    }

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

    /**
     * @return Collection<int, Product>
     */
    public function getProductsCollection(): Collection
    {
        return $this->productsCollection;
    }

    public function addColor(Product $color): static
    {
        if (!$this->productsCollection->contains($color)) {
            $this->productsCollection->add($color);
            $color->setCategory($this);
        }

        return $this;
    }

    public function removeColor(Product $color): static
    {
        if ($this->productsCollection->removeElement($color)) {
            // set the owning side to null (unless already changed)
            if ($color->getCategory() === $this) {
                $color->setCategory(null);
            }
        }

        return $this;
    }

    public function __toString(): string
    {
        return $this->name;
    }
}
