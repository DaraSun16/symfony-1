<?php

namespace App\Entity;

use App\Entity\Trait\DateTrait;
use App\Repository\ReviewRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ReviewRepository::class)]
class Review
{
    use DateTrait;
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $review = null;

    #[ORM\Column(length: 255)]
    private ?string $description = null;

    #[ORM\Column(length: 255)]
    private ?string $commit = null;

    #[ORM\OneToOne(cascade: ['persist', 'remove'])]
    private ?Users $review_users = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getReview(): ?string
    {
        return $this->review;
    }

    public function setReview(string $review): static
    {
        $this->review = $review;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): static
    {
        $this->description = $description;

        return $this;
    }

    public function getCommit(): ?string
    {
        return $this->commit;
    }

    public function setCommit(string $commit): static
    {
        $this->commit = $commit;

        return $this;
    }

    public function getReviewUsers(): ?Users
    {
        return $this->review_users;
    }

    public function setReviewUsers(?Users $review_users): static
    {
        $this->review_users = $review_users;

        return $this;
    }
}
