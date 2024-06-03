<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Temoignages;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Doctrine\ORM\EntityManagerInterface; // Import de la classe EntityManagerInterface

#[Route('/temoignages')]
class TemoignagesController extends AbstractController
{
    private $entityManager; // Propriété pour stocker l'instance de EntityManagerInterface

    // Injection de dépendance de EntityManagerInterface dans le constructeur
    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    #[Route('/valides', name: 'temoignages_valides', methods: ['GET'])]
    public function temoignagesValides(): JsonResponse
    {
        $temoignagesRepository = $this->entityManager->getRepository(Temoignages::class); // Utilisation de l'EntityManagerInterface
        $temoignagesValides = $temoignagesRepository->findBy(['validated' => true]);

        $formattedTemoignages = [];
        foreach ($temoignagesValides as $temoignage) {
            $formattedTemoignages[] = [
                'nom' => $temoignage->getNom(),
                'commentaire' => $temoignage->getCommentaire(),
                'note' => $temoignage->getNote(),
            ];
        }

        return new JsonResponse($formattedTemoignages);
    }

    #[Route('/nouveaux', name: 'temoignages_nouveaux', methods: ['POST'])]
    public function nouveauTemoignage(Request $request): JsonResponse
    {
        $data = json_decode($request->getContent(), true);

        // Traitez les données du formulaire ici (validation, sauvegarde en base de données, etc.)

        // Retournez une réponse JSON appropriée, par exemple :
        return new JsonResponse(['message' => 'Témoignage ajouté avec succès'], Response::HTTP_CREATED);
    }
}
