<?php

namespace App\Controller\Admin;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/admin/services', name: 'admin_services_')]
class ServicesController extends AbstractController
{
    #[Route('/', name: 'index')]
    public function index(): Response
    {
        return $this->render('admin/services/index.html.twig');
    }

    #[Route('/ajout', name: 'add')]
    public function add(): Response
    {
        $this->denyAccessUnlessGranted('ROLE_ADMIN');
        return $this->render('admin/services/index.html.twig');
    }

    #[Route('/edition/{id}', name: 'edit')]
    public function edit(Services $service): Response
    {
        
        //vérification si 'lutilisateur peut éditer avec le Voter
        $this->denyAccessUnlessGranted('SERVICE_EDIT', $car);
        return $this->render('admin/services/index.html.twig');
    }
    
    #[Route('/suppression/{id}', name: 'delete')]
    public function delete(Services $service): Response
    {
        //vérification si 'lutilisateur peut supprimer avec le Voter
        $this->denyAccessUnlessGranted('SERVICE_DELETE', $car);
        return $this->render('admin/services/index.html.twig');
    }
}