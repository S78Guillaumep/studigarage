<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class InfosController extends AbstractController
{
    #[Route('/infos', name: 'infos_')]
    public function index(): Response
    {
        return $this->render('infos/index.html.twig');
    }
}
