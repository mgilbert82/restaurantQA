<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixtures
{
    public function load(ObjectManager $manager): void
    {
        $user = new User();
        // $manager->persist($product);

        $manager->flush();
    }
}
