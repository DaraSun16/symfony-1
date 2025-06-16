<?php
namespace App\Service;

use App\Entity\Contact;
use Symfony\Bridge\Twig\Mime\TemplatedEmail;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Address;

Class ContactMailer
{
  public function __construct(
    private MailerInterface $mailer,
    private string $toEmail
  ){}
  public function sendContactMessage(Contact $contact)
  {
    $email = (new TemplatedEmail())
    ->from(new Address($contact->getEmail()))
    ->to($this->toEmail)
    ->subject('Vous avez reçu un mail !')
    ->htmlTemplate('email/contact.html.twig')
    ->context([
      'name'=>$contact->getName(),
      'senderEmail'=>$contact->getEmail(),
      'service'=>$contact->getService(),
      'phoneNumber'=>$contact->getphoneNumber(),
      'message'=>$contact->getMessage(),
    ]);
    $this->mailer->send($email);
  }
}

?>