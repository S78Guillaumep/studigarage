<?php

namespace App\Controller;

use App\Entity\Cars;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/voitures', name: 'cars_')]
class CarsController extends AbstractController
{
    #[Route('/', name: 'index')]
    public function index(): Response
    {
        return $this->render('cars/index.html.twig');
    }

    #[Route('/{slug}', name: 'details')]
    public function details(): Response
    {
        return $this->render('cars/details.html.twig', compact('car'));
    }
}