<?php

namespace App\DataFixtures;

use App\Entity\Montre;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class MontreFixtures extends Fixture
{
    public const FOSSIL_MONTRE_EN_ACIER_INOXYDABLE_DORÉ = "fossil-montre-en-acier-inoxydable-doré";
    public const MONTRE_MICHEAL_KORS_DORÉ = "montre-micheal-kors-doré"; 
    public const MONTRE_ARMANI_EN_ACIER_INOXYDABLE_BRONZE_DORÉ = "Montre Armani en acier inoxydable bronze doré";
    public const MICHEAL_KORS_EN_ACIER_INOXYDABLE_ARGENTÉ = "micheal-kors-en-acier-inoxydable-argenté";
    public const DEPTH_CHARGE_EN_ACIER_INOXYDABLE_ARGENTÉ = "depth-charge-en-acier-inoxydable-argenté";
    public const MONTRE_FOSSIL_EN_ACIER_INOXYDABLE_ARGENTÉ = "montre-fossil-en-acier-inoxydable-argenté";
    public const MONTRE_DIESL_NUMERIQUE = "montre-diesl-numerique";
    public const MONTRE_PUMA_NUMERIQUE = "montre-puma-numerique";
    public const KRONABY_NUMERIQUE_NOIR_CUIR = "kronbay-numérique-noir-cuir";




    public function load(ObjectManager $manager): void

    {

        // Montres Dorées ///
        $montre = new Montre();
        $montre->setNom("Fossil Montre en acier inoxydable doré");
        $montre->setSlug("fossil-montre-en-acier-inoxydable-doré");
        $montre->setDescription("Cette montre arbore un cadran noir mat et satiné, un mouvement automatique et un bracelet en acier inoxydable doré. ");
        $montre->setPrix(299.00);
        $montre->setIsActive(true);
        $montre->setBoutique($this->getReference(BoutiqueFixtures::MONTRES_DORÉES));
        $manager->persist($montre);
        $this->addReference(self::FOSSIL_MONTRE_EN_ACIER_INOXYDABLE_DORÉ, $montre);


        $montre = new Montre();
        $montre->setNom("Montre Michael Kors doré");
        $montre->setSlug("montre-micheal-kors-doré");
        $montre->setDescription("Cette montre arbore un cadran noir doré, et un bracelet en acier inoxydable doré. ");
        $montre->setPrix(329.00);
        $montre->setIsActive(true);
        $montre->setBoutique($this->getReference(BoutiqueFixtures::MONTRES_DORÉES));
        $manager->persist($montre);
        $this->addReference(self::MONTRE_MICHEAL_KORS_DORÉ, $montre);

        $montre = new Montre();
        $montre->setNom("Montre Armani en acier inoxydable bronze doré");
        $montre->setSlug("montre-armani-en-acier-inoxydable-brone-doré");
        $montre->setDescription("Cette montre Armani est dotée d’un cadran soleillé doré beige d’un boîtier contenant au moins 50 % d’acier inoxydable recyclé bronze doré et d’un bracelet en acier inoxydable bronze doré.");
        $montre->setPrix(249.00);
        $montre->setIsActive(true);
        $montre->setBoutique($this->getReference(BoutiqueFixtures::MONTRES_DORÉES));
        $manager->persist($montre);
        $this->addReference(self::MONTRE_ARMANI_EN_ACIER_INOXYDABLE_BRONZE_DORÉ, $montre);

        // Montres Argentées// 

        $montre = new Montre();
        $montre->setNom("Micheal Kors en acier inoxydable argenté");
        $montre->setSlug("micheal-kors-en-acier-inoxydable-argenté");
        $montre->setDescription("Cette montre Michel Kors est dotée d'un cadran blue, et un bracelet en acier inoxydable ");
        $montre->setPrix(200.00);
        $montre->setIsActive(true);
        $montre->setBoutique($this->getReference(BoutiqueFixtures::MONTRES_ARGENTÉES));
        $manager->persist($montre);
        $this->addReference(self::MICHEAL_KORS_EN_ACIER_INOXYDABLE_ARGENTÉ, $montre);

        $montre = new Montre();
        $montre->setNom("Depth Charge en acier inoxydable argenté");
        $montre->setSlug("depth-charge-en-acier-inoxydable-argenté");
        $montre->setDescription("Cette montre Depth  est dotée d'un boîtier en acier inoxydable argenté et d'un élégant cadran blanc argenté qui respire la simplicité et la fonctionnalité, elle est conçue aussi pour résister aux exigences des activités de plein air");
        $montre->setPrix(190.00);
        $montre->setIsActive(true);
        $montre->setBoutique($this->getReference(BoutiqueFixtures::MONTRES_ARGENTÉES));
        $manager->persist($montre);
        $this->addReference(self::DEPTH_CHARGE_EN_ACIER_INOXYDABLE_ARGENTÉ, $montre);


        $montre = new Montre();
        $montre->setNom("Montre Fossil en acier inoxydable argenté");
        $montre->setSlug("montre-fossil-en-acier-inoxydable-argenté");
        $montre->setDescription("Cette montre Fossil est dotée d’un cadran soleillé texturé noir,d’un mouvement à trois aiguilles avec date et d’un bracelet en acier inoxydable.");
        $montre->setPrix(179.00);
        $montre->setIsActive(true);
        $montre->setBoutique($this->getReference(BoutiqueFixtures::MONTRES_ARGENTÉES));
        $manager->persist($montre);
        $this->addReference(self::MONTRE_FOSSIL_EN_ACIER_INOXYDABLE_ARGENTÉ, $montre);


        // Autres Montres //

        $montre = new Montre();
        $montre->setNom("Montre Diesl numerique");
        $montre->setSlug("montre-diesl-numerique");
        $montre->setDescription("Cette montre Diesl est numerique en silicone, blanc.");
        $montre->setPrix(199.00);
        $montre->setIsActive(true);
        $montre->setBoutique($this->getReference(BoutiqueFixtures::AUTRES_MONTRES));
        $manager->persist($montre);
        $this->addReference(self::MONTRE_DIESL_NUMERIQUE, $montre);

        $montre = new Montre();
        $montre->setNom("Montre PUMA numérique");
        $montre->setSlug("montre-puma-numerique");
        $montre->setDescription("Cette montre Puma est numerique en polyuréthane,noir.");
        $montre->setPrix(99.00);
        $montre->setIsActive(true);
        $montre->setBoutique($this->getReference(BoutiqueFixtures::AUTRES_MONTRES));
        $manager->persist($montre);
        $this->addReference(self::MONTRE_PUMA_NUMERIQUE, $montre);


        $montre = new Montre();
        $montre->setNom("KRONABY Numérique Noir Cuir");
        $montre->setSlug("kronbay-numérique-noir-cuir");
        $montre->setDescription("Avec un boîtier acier inoxydable et verre saphir, équipé d’un bracelet de cuir. Les montres hybrides Kronaby ont une esthétique scandinave qui intègre un composant technologique puissant permettant la connexion au Smartphone.");
        $montre->setPrix(499.00);
        $montre->setIsActive(true);
        $montre->setBoutique($this->getReference(BoutiqueFixtures::AUTRES_MONTRES));
        $manager->persist($montre);
        $this->addReference(self::KRONABY_NUMERIQUE_NOIR_CUIR, $montre);

        $manager->flush();

    }
}
