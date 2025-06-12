<?php

namespace App\Entity;

use App\Entity\Trait\DateTrait;
use App\Repository\PaymentRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PaymentRepository::class)]
class Payment
{
    use DateTrait;
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 10, scale: 0)]
    private ?string $total_paid = null;

    #[ORM\Column(length: 255)]
    private ?string $stripe_checkout = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTotalPaid(): ?string
    {
        return $this->total_paid;
    }

    public function setTotalPaid(string $total_paid): static
    {
        $this->total_paid = $total_paid;

        return $this;
    }

    public function getStripeCheckout(): ?string
    {
        return $this->stripe_checkout;
    }

    public function setStripeCheckout(string $stripe_checkout): static
    {
        $this->stripe_checkout = $stripe_checkout;

        return $this;
    }
}
