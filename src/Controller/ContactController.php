<?php

namespace App\Controller;

use App\Entity\Contact;
use App\Form\ContactForm;
use App\Form\ContactType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\HttpFoundation\Request;

final class ContactController extends AbstractController

{   #[Route('/contact', name: 'app_contact')]
    public function index(Request $request): Response
    {

        $contact = new Contact();
        $form = $this->createForm(ContactForm::class, $contact);
        $form->handleRequest($request);

        if ($form ->isSubmitted() && $form->isValid()){
            dd($form);
        }

        return $this->render('contact/index.html.twig', [
            'form' => $form->createView()
        ]);
    }
}