<?php

namespace App\DataFixtures;

use App\Entity\Image;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class ImageFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        $image = new Image();
        $image->setImageName('Fossil_doré.jpg');
        $image->setMontre($this->getReference(MontreFixtures::FOSSIL_MONTRE_EN_ACIER_INOXYDABLE_DORÉ));
        $image->setRankOrder(1);
        $manager->persist($image);

        $image = new Image();
        $image->setImageName('Michel kors_doré.jpg');
        $image->setMontre($this->getReference(MontreFixtures::MONTRE_MICHEAL_KORS_DORÉ));
        $image->setRankOrder(1);
        $manager->persist($image);

        $image = new Image();
        $image->setImageName('Armani_doré.jpg');
        $image->setMontre($this->getReference(MontreFixtures::MONTRE_ARMANI_EN_ACIER_INOXYDABLE_BRONZE_DORÉ));
        $image->setRankOrder(1);
        $manager->persist($image);

        $image = new Image();
        $image->setImageName('Michel kors.jpg');
        $image->setMontre($this->getReference(MontreFixtures::MICHEAL_KORS_EN_ACIER_INOXYDABLE_ARGENTÉ));
        $image->setRankOrder(1);
        $manager->persist($image);

        $image = new Image();
        $image->setImageName('Depath charge.jpg');
        $image->setMontre($this->getReference(MontreFixtures::DEPTH_CHARGE_EN_ACIER_INOXYDABLE_ARGENTÉ));
        $image->setRankOrder(1);
        $manager->persist($image);

        $image = new Image();
        $image->setImageName('Fossil.jpg');
        $image->setMontre($this->getReference(MontreFixtures::MONTRE_FOSSIL_EN_ACIER_INOXYDABLE_ARGENTÉ));
        $image->setRankOrder(1);
        $manager->persist($image);

        $image = new Image();
        $image->setImageName('Montre diesel_numerique.jpg');
        $image->setMontre($this->getReference(MontreFixtures::MONTRE_DIESL_NUMERIQUE));
        $image->setRankOrder(1);
        $manager->persist($image);

        $image = new Image();
        $image->setImageName('Puma.jpg');
        $image->setMontre($this->getReference(MontreFixtures::MONTRE_PUMA_NUMERIQUE));
        $image->setRankOrder(1);
        $manager->persist($image);

        $image = new Image();
        $image->setImageName('Kronbay_cuir.jpg');
        $image->setMontre($this->getReference(MontreFixtures::KRONABY_NUMERIQUE_NOIR_CUIR));
        $image->setRankOrder(1);
        $manager->persist($image);

        $manager->flush();
    }
        // Pour changer l'ordre du chargement des fixtures // 
    public function getDependencies():array{
        return[
            MontreFixtures::class
        ];
    }
}
