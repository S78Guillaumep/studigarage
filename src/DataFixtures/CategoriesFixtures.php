<?php

namespace App\DataFixtures;

use App\Entity\Categories;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\String\Slugger\SluggerInterface;

class CategoriesFixtures extends Fixture
{
    public function __construct(private SluggerInterface $slugger){}
    
    public function load(ObjectManager $manager): void
    {
        $category = new Categories();
        $category->setName('Citadines');
        $category->setSlug('citadines');
        $manager->persist($category);

        $category = new Categories();
        $category->setName('Compactes');
        $category->setSlug('compactes');
        $manager->persist($category);

        $category = new Categories();
        $category->setName('SUV');
        $category->setSlug('suv');
        $manager->persist($category);

        $category = new Categories();
        $category->setName('Familiales');
        $category->setSlug('familiales');
        $manager->persist($category);

        $category = new Categories();
        $category->setName('Sportives');
        $category->setSlug('sportives');
        $manager->persist($category);

        $manager->flush();
    }
}
