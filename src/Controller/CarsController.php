<?php

namespace App\Controller;

use App\Entity\Cars;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/voitures', name: 'cars_')]
class CarsController extends AbstractController
{
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    #[Route('/', name: 'index')]
    public function index(): Response
    {
        $cars = $this->entityManager->getRepository(Cars::class)->findAll();

        return $this->render('cars/index.html.twig', [
            'cars' => $cars,
        ]);
    }

    #[Route('/{name}', name: 'details')]
public function details($name): Response
{
    $car = $this->entityManager->getRepository(Cars::class)->findOneBy(['name' => $name]);

    return $this->render('cars/details.html.twig', [
        'car' => $car,
    ]);
}

}
