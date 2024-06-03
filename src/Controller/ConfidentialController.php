<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class ConfidentialController extends AbstractController
{
    #[Route('/confidentiel', name: 'confidential_')]
    public function index(): Response
    {
        return $this->render('confidential/index.html.twig');
    }
}
