<?php

namespace App\Entity\Trait;
use Doctrine\ORM\Mapping as ORM;

trait DateTrait {
  #[ORM\Column(type:'datetime_immutable', nullable:true, options:['default' => 'CURRENT_TIMESTAMP'])]
  private ?\DateTimeImmutable $createdAt = null;

  #[ORM\Column(type:'datetime_immutable', nullable:true, options:['default' => 'CURRENT_TIMESTAMP'])]
  private ?\DateTimeImmutable $updatedAt = null;


  public function getCreatedAt(): ?\DateTimeImmutable {
    return $this->createdAt;
  }
    public function getUpdatedAt(): ?\DateTimeImmutable {
    return $this->updatedAt;
  }

  #[ORM\PrePersist]
  public function setCreatedAt(): self {
    $this->createdAt = new \DateTimeImmutable();

    return $this;
  }

  #[ORM\PreUpdate]
  public function setUpdatedAt(): void {
    $this->updatedAt = new \DateTimeImmutable();
  }
}
?>