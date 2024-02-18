<?php

namespace App\DataFixtures;

use App\Entity\Cars;
use App\Entity\Categories;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;
use Symfony\Component\String\Slugger\SluggerInterface;

class CarsFixtures extends Fixture
{
    public function __construct(private SluggerInterface $slugger){}

    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create('fr_FR');

        // Récupérer toutes les catégories disponibles
        $category = $manager->getRepository(Categories::class)->findAll();

            for ($prod = 1; $prod <= 30; $prod++) {
                $car = new Cars();
                // Générer un nom de voiture en un seul mot sans espaces ni chiffres
                $carName = $faker->unique()->word;
                while (!ctype_alpha($carName)) { // Vérifier que le nom ne contient que des lettres
                    $carName = $faker->unique()->word;
                }
                $car->setName($carName);
                $car->setDescription($faker->text());
                $car->setSlug($this->slugger->slug($car->getName())->lower());
                $car->setPrice($faker->numberBetween(200, 2000));
                $car->setYear($faker->numberBetween(1990, 2023));
                $car->setDistance($faker->numberBetween(20000, 150000));
                $dateImmutable = \DateTimeImmutable::createFromMutable($faker->dateTimeBetween('2021-01-01', '2024-01-01'));
                $car->setCreatedAt($dateImmutable);

                $randomCategories = $faker->randomElement($category);
                $car->setType($randomCategories);

                $manager->persist($car);
            }

        $manager->flush();
    }
}
