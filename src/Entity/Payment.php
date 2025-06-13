<?php

namespace App\Entity;

use App\Entity\Trait\DateTrait;
use App\Repository\PaymentRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
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

    /**
     * @var Collection<int, Order>
     */
    #[ORM\OneToMany(targetEntity: Order::class, mappedBy: 'payment')]
    private Collection $payment_order;

    public function __construct()
    {
        $this->payment_order = new ArrayCollection();
    }

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

    /**
     * @return Collection<int, Order>
     */
    public function getPaymentOrder(): Collection
    {
        return $this->payment_order;
    }

    public function addPaymentOrder(Order $paymentOrder): static
    {
        if (!$this->payment_order->contains($paymentOrder)) {
            $this->payment_order->add($paymentOrder);
            $paymentOrder->setPayment($this);
        }

        return $this;
    }

    public function removePaymentOrder(Order $paymentOrder): static
    {
        if ($this->payment_order->removeElement($paymentOrder)) {
            // set the owning side to null (unless already changed)
            if ($paymentOrder->getPayment() === $this) {
                $paymentOrder->setPayment(null);
            }
        }

        return $this;
    }
}
