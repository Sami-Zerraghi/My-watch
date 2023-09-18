<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class UserFixtures extends Fixture
{
    // PROPRIETES //
    private $encoder; // Pour le hashage du mot de passe //

    // CONSTRUCTEUR //

    Public function __construct(UserPasswordHasherInterface $encoder)
    {
        $this->encoder = $encoder;
    }



    public function load(ObjectManager $manager): void
    {
        $user = new User();
        $user->setEmail("s.zerraghi@gmail.com");
        $user->setRoles(["ROLE_USER", "ROLE_ADMIN"]);
        $user->setPassword($this->encoder->hashPassword($user, "Boutique1!"));
        $manager->persist($user);

        $user = new User();
        $user->setEmail("sami.test@test.com");
        $user->setRoles(["ROLE_USER",]);
        $user->setPassword($this->encoder->hashPassword($user, "Boutique1!"));
        $manager->persist($user);

        $manager->flush();
    }
}
