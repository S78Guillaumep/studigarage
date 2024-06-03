<?php

namespace App\DataFixtures;

use App\Entity\Temoignages;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class TestimoniesFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create('fr_FR');

        for ($i = 0; $i < 10; $i++) { // Générer 10 témoignages fictifs
            $temoignage = new Temoignages();
            $temoignage->setNom($faker->name);
            $temoignage->setCommentaire($faker->paragraph);
            $temoignage->setNote($faker->numberBetween(1, 5));
            $temoignage->setValidated($faker->boolean);

            $manager->persist($temoignage);
        }

        $manager->flush();
    }
}
