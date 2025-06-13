<?php

namespace App\DataFixtures;

use App\Entity\Users;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class UsersFixtures extends Fixture
{
    public function __construct(
        private UserPasswordHasherInterface $pwd
    ){}

    public function load(ObjectManager $manager): void
    {
        $user = new Users();
        $user->setEmail('admin@admin.admin');
        $user->setUserName('admin');
        $user->setPassword($this->pwd->hashPassword($user, 'admin'));
        $user->setIsVerified(true);
        $user->setRoles(['ROLE_USER']);
        $user->setFirstName('admin');
        $user->setLastName('admin');
        $user->setPhoneNumber('0000000000');
        $user->setBiography('333');

        $manager->persist($user);
        $manager->flush();
    }
}
