<?php

 namespace App\Entity;

 use Symfony\Component\Validator\Constraints as Assert;
 Class Contact 
 {
  #[Assert\NotBlank(message: "Le prénom est obligatoire!")]
  #[Assert\Length(
    min: 2,
    max: 50,
    minMessage:"Le prénom doit contenir au moins {{ limit }} caractères",
    maxMessage:"Le prénom doit contenir au moins {{ limit }} caractères",
  )]
  #[Assert\Regex(
    pattern: '/^[\p{L}\p{M}-\'\s]+$/u',
    message: 'Le prénom contient des caractères invalides'
  )]
  private string $name;

  #[Assert\NotBlank(message: "Le mail est obligatoire")]
  #[Assert\Email(message: "L'adresse email est invalide")]
  private string $email;

  private string $service;

  #[Assert\NotBlank(message:"Le numéro de téléphone est obligatoire")]
  #[Assert\Regex(
    pattern:'/^\+?[0-9\s\-\(\)\.]{7,20}$/',
    message:"Le numéro de téléphone est invalide",
  )]
  private string $phoneNumber;

  #[Assert\NotBlank(message:"Le message est obligatoire")]
  #[Assert\Length(
    min: 10,
    max: 1000,
    minMessage:"Le message doit contenir au moins {{ limit }} caractères",
    maxMessage:"Le message doit contenir au moins {{ limit }} caractères",
  )]
  #[Assert\Regex(
    pattern:'/^[^<>]+$/',
    message:"I gotcha you weren't able to send spams'"
  )]
  private string $message;
 }

?>