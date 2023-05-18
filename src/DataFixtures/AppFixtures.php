<?php

namespace App\DataFixtures;

use App\Entity\Dish;
use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class AppFixtures extends Fixture

{
    private UserPasswordHasherInterface $hasher;

    public function __construct(UserPasswordHasherInterface $hasher)
    {
        $this->hasher = $hasher;
    }

    public function load(ObjectManager $manager): void
    {
        $user = new User();

        $user->setCivility('Monsieur')
            ->setFirstname('admin')
            ->setLastname('studi')
            ->setEmail('adminStudi@gmail.com')
            ->setRoles(["ROLE_ADMIN"]);

        $password = $this->hasher->hashPassword($user, 'admin_1234');
        $user->setPassword($password);

        $manager->persist($user);

        //Create Dish on the database
        for ($i = 0; $i < 20; $i++) {

            $dish = new Dish();

            $dish->setTitle('Dish ' . $i)
                ->setDescription(' description of the dish ' . $i)
                ->setPrice(mt_rand(10, 100));
        }
        $manager->persist($dish);


        $manager->flush();
    }
}
