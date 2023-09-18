<?php

namespace App\DataFixtures;

use App\Entity\Home;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class HomeFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $home = new Home();
        $home->setTitre('Bienvenue sur le site de la Boutique "My_Watch');
        $home->setTexte("Découvrez sur notre site une sélection de nos meilleurs montres du moment ");
        $home->setIsActive(true);
        $manager->persist($home);

        $home = new Home();
        $home->setTitre('Bienvenue sur le site de la Boutique "My_Watch');
        $home->setTexte("C'est le Black Friday ! découvrez notre réduction immédiate en fonction du montant de la commande ");
        $home->setIsActive(false);
        $manager->persist($home);


        $manager->flush();
    }
}
