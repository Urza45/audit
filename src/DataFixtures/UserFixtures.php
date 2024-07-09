<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class UserFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $userAdmin = new User();
        $userAdmin->setUsername('admin')
            ->setRoles(['ROLE_ADMIN'])
            ->setPassword('$2y$13$TThlUkFUNz2bUzU9I4UhxOKC3JyguxQFdDE4zA.cAjNnccnMoRYcO');

        $manager->persist($userAdmin);

        $manager->flush();
    }
}
