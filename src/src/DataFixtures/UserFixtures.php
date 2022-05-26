<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class UserFixtures extends Fixture
{
    public function __construct(UserPasswordHasherInterface $userPasswordHasher)
    {
        $this->userPasswordHasher=$userPasswordHasher;
    }

    public function load(ObjectManager $manager): void
    {
        $user =new User();
        $user->setEmail("nava@web2.com");
        $user->setPassword($this->userPasswordHasher->hashPassword($user,"1234"));
        $manager->persist($user);
        $manager->flush();
    }
}
