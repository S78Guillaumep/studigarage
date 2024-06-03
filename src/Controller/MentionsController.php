<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class MentionsController extends AbstractController
{
    #[Route('/mentions', name: 'mentions_')]
    public function index(): Response
    {
        return $this->render('mentions/index.html.twig');
    }
}
