<?php

namespace App\Controller;

use App\Entity\Services;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/services', name: 'services_')]
class ServicesController extends AbstractController
{
    #[Route('/', name: 'index')]
    public function index(): Response
    {
        return $this->render('services/index.html.twig');
    }

    #[Route('/{slug}', name: 'details')]
    public function details(Services $service): Response
    {
        return $this->render('services/details.html.twig', compact('service'));
    }
}