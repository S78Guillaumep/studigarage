<?php

namespace App\DataFixtures;

use App\Entity\Services;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker;
use Symfony\Component\String\Slugger\SluggerInterface;


class ServicesFixtures extends Fixture
{
    public function __construct(private SluggerInterface $slugger){}
    
    public function load(ObjectManager $manager): void
    {
        $faker = Faker\Factory::create('fr_FR');
        
        $service = new Services();
        $service->setName('Révision');
        $service->setSlug('révision');
        $service->setPrice($faker->numberBetween(200, 2000));
        $service->setDescription('contrôle périodique des voitures');
        $manager->persist($service);

        $service = new Services();
        $service->setName('Vidange');
        $service->setSlug('vidange');
        $service->setPrice($faker->numberBetween(200, 2000));
        $service->setDescription('opération d\'entretien, qui consiste à changer l\'huile du moteur, le filtre à huile et le joint du bouchon de vidange');
        $manager->persist($service);

        $service = new Services();
        $service->setName('Réparation');
        $service->setSlug('réparation');
        $service->setPrice($faker->numberBetween(200, 2000));
        $service->setDescription('ensemble des réglages et le remplacement des pièces usagées ou défaillantes');
        $manager->persist($service);
        
        $manager->flush();
    }
}
