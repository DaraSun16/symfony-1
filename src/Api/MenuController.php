<?php
namespace App\Controller\Api;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

class MenuController extends AbstractController
{
  public function navbar(): Response{
    return $this->render('_partials/menu.html.twig');
  }
}

?>