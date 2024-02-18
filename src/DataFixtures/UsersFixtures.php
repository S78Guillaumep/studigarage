<?php

namespace App\DataFixtures;

use App\Entity\Users;
use Faker;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class UsersFixtures extends Fixture
{
    public function __construct(
        private UserPasswordHasherInterface $passwordEncoder,
        )
    {}
    public function load(ObjectManager $manager): void
    {
        $admin = new Users();
        $admin->setEmail('v.parrot@garage.com');
        $admin->setLastname('Parrot');
        $admin->setFirstname('Vincent');
        $admin->setPassword(
            $this->passwordEncoder->hashPassword($admin, '76nKtL5x')
        );
        $admin->setRoles(['ROLE_ADMIN']);

        $manager->persist($admin);

        $faker = Faker\Factory::create('fr_FR');

        for ($usr = 1; $usr < 5 ; $usr++) { 
            $user = new Users();
        $user->setEmail($faker->email);
        $user->setLastname($faker->lastName);
        $user->setFirstname($faker->firstName);
        $user->setPassword(
            $this->passwordEncoder->hashPassword($user, 'secret')
        );

        $manager->persist($user);

        }

        $manager->flush();

    }
}
