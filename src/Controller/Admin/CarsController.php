<?php

namespace App\Controller\Admin;

use App\Entity\Cars;
use App\Form\CarsFormType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\String\Slugger\SluggerInterface;

#[Route('/admin/voitures', name: 'admin_cars_')]
class CarsController extends AbstractController
{
    #[Route('/', name: 'index')]
    public function index(): Response
    {
        return $this->render('admin/cars/index.html.twig');
    }

    #[Route('/ajout', name: 'add')]
    public function add(Request $request, EntityManagerInterface $em, SluggerInterface $slugger): Response
    {
        $this->denyAccessUnlessGranted('ROLE_DATA_ADMIN');

        //Création nouvelle voiture
        $car = new Cars();

        //Création du formulaire
        $carForm = $this->createForm(CarsFormType::class, $car);

        //Traitement de la requête du formulaire
        $carForm->handleRequest($request);

        //Vérification si le formulaire est soumis et valide
        if ($carForm->isSubmitted() && $carForm->isValid()) {
            $slug = $sluger->slug($car->getName());
            $car->setSlug($slug);

            $em->persist($car);
            $em->flush();

        //Redirection
        return $this->redirectToRoute('admin_cars_index');
        }

        return $this->render('admin/cars/add.html.twig',[
            'carForm' => $carForm->createView()
    ]);
    }

    #[Route('/edition/{id}', name: 'edit')]
    public function edit(Cars $car, Request $request, EntityManagerInterface $em, SluggerInterface $slugger): Response
    {
        //vérification si 'lutilisateur peut éditer avec le Voter
        $this->denyAccessUnlessGranted('CAR_EDIT', $car);

        //Création du formulaire
        $carForm = $this->createForm(CarsFormType::class, $car);

        //Traitement de la requête du formulaire
        $carForm->handleRequest($request);

        //Vérification si le formulaire est soumis et valide
        if ($carForm->isSubmitted() && $carForm->isValid()) {
            $slug = $sluger->slug($car->getName());
            $car->setSlug($slug);

            $em->persist($car);
            $em->flush();

        //Redirection
        return $this->redirectToRoute('admin_cars_index');
        }

        return $this->render('admin/cars/edit.html.twig',[
            'carForm' => $carForm->createView()
    ]);

        return $this->render('admin/cars/index.html.twig');
    }
    
    #[Route('/suppression/{id}', name: 'delete')]
    public function delete(Cars $car): Response
    {
        //vérification si 'lutilisateur peut supprimer avec le Voter
        $this->denyAccessUnlessGranted('CAR_DELETE', $car);
        return $this->render('admin/cars/index.html.twig');
    }
}