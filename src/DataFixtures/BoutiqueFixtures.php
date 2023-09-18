<?php

namespace App\DataFixtures;

use App\Entity\Boutique;
use DateTimeImmutable;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class BoutiqueFixtures extends Fixture

{
    public const MONTRES_DORÉES = "montres dorées";
    public const MONTRES_ARGENTÉES = "montres argentées";
    public const AUTRES_MONTRES = "autres montres";


    public function load(ObjectManager $manager): void
    {
        $boutique = new Boutique();
        $boutique->setNom("Montres dorées");
        $boutique->setSlug("montres-dorées");
        $boutique->setDescription("Munie d’un bracelet maille milanaise en acier,la montre dorée ne cesse de séduire et d’être renouvelée par toutes les marques de bijoux. Notre marque est spécialisée dans les bijoux fantaisie, fabriqués en France par des artisans qui travaillent des pièces en acier dans les règles de l'art.");
        $boutique->setImageName("Montres_dorées.jpg");
        $boutique->setUpdatedAt(new DateTimeImmutable());
        $boutique->setIsActive(true);
        $manager->persist($boutique);
        $manager->flush();
        $this->addReference(self::MONTRES_DORÉES, $boutique);

        $boutique = new Boutique();
        $boutique->setNom("Montres argentées");
        $boutique->setSlug("montres-argentées");
        $boutique->setDescription("Munie d’un bracelet gris argenté En acier inoxydable,la montre argentées a la particularité de se marier avec toutes les couleurs.Il faut bien l’avouer, elle fait toujours son effet et représente ainsi un véritable attrait pour les hommes.Notre marque est spécialisée dans les bijoux fantaisie, fabriqués en France par des artisans qui travaillent des pièces en acier dans les règles de l'art.");
        $boutique->setImageName("Montres_argentées.jpg");
        $boutique->setUpdatedAt(new DateTimeImmutable());
        $boutique->setIsActive(true);
        $manager->persist($boutique);
        $manager->flush();
        $this->addReference(self::MONTRES_ARGENTÉES, $boutique);

        $boutique = new Boutique();
        $boutique->setNom("Autres montres");
        $boutique->setSlug("autres-montres");
        $boutique->setDescription("Cette page présente un choix d'autres types de montres (braclet en cuir, silicone..).");
        $boutique->setImageName("Autres_montres.jpg");
        $boutique->setUpdatedAt(new DateTimeImmutable());
        $boutique->setIsActive(true);
        $manager->persist($boutique);
        $manager->flush();
        $this->addReference(self::AUTRES_MONTRES, $boutique);
    }
}
