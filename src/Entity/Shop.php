<?php

namespace App\Entity;

use App\Entity\Trait\DateTrait;
use App\Repository\ShopRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ShopRepository::class)]
class Shop
{
    use DateTrait;
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $product_name = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 10, scale: 0)]
    private ?string $price_product = null;

    #[ORM\Column(length: 255)]
    private ?string $picture = null;

    #[ORM\Column(length: 255)]
    private ?string $small_desc_product = null;

    #[ORM\Column(length: 255)]
    private ?string $big_desc_product = null;

    #[ORM\Column(length: 255)]
    private ?string $stock = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 10, scale: 2, nullable: true)]
    private ?string $discount_percent = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 10, scale: 2, nullable: true)]
    private ?string $discount_numeric = null;

    #[ORM\OneToOne(cascade: ['persist', 'remove'])]
    private ?Categories $category = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getProductName(): ?string
    {
        return $this->product_name;
    }

    public function setProductName(string $product_name): static
    {
        $this->product_name = $product_name;

        return $this;
    }

    public function getPriceProduct(): ?string
    {
        return $this->price_product;
    }

    public function setPriceProduct(string $price_product): static
    {
        $this->price_product = $price_product;

        return $this;
    }

    public function getPicture(): ?string
    {
        return $this->picture;
    }

    public function setPicture(string $picture): static
    {
        $this->picture = $picture;

        return $this;
    }

    public function getSmallDescProduct(): ?string
    {
        return $this->small_desc_product;
    }

    public function setSmallDescProduct(string $small_desc_product): static
    {
        $this->small_desc_product = $small_desc_product;

        return $this;
    }

    public function getBigDescProduct(): ?string
    {
        return $this->big_desc_product;
    }

    public function setBigDescProduct(string $big_desc_product): static
    {
        $this->big_desc_product = $big_desc_product;

        return $this;
    }

    public function getStock(): ?string
    {
        return $this->stock;
    }

    public function setStock(string $stock): static
    {
        $this->stock = $stock;

        return $this;
    }

    public function getDiscountPercent(): ?string
    {
        return $this->discount_percent;
    }

    public function setDiscountPercent(?string $discount_percent): static
    {
        $this->discount_percent = $discount_percent;

        return $this;
    }

    public function getDiscountNumeric(): ?string
    {
        return $this->discount_numeric;
    }

    public function setDiscountNumeric(?string $discount_numeric): static
    {
        $this->discount_numeric = $discount_numeric;

        return $this;
    }

    public function getCategory(): ?Categories
    {
        return $this->category;
    }

    public function setCategory(?Categories $category): static
    {
        $this->category = $category;

        return $this;
    }
}
