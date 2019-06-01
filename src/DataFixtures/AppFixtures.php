<?php

namespace App\DataFixtures;

use App\Entity\Experience;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $plonge = new Experience();
        $siteEntreprise = new Experience();
        $WP = new Experience();
        $gestion = new Experience();
        $ecrivain = new Experience();
        $louvre = new Experience();
        $blogPerso = new Experience();

        $plonge->setTitle("plongeur")
               ->setDescription("Plonge pour le restaurant universitaire triolet à montpellier. Sans rapport avec l'informatique, ce travail m'a tout de même permis de faire connaissance avec le milieu de l'entreprise.")
               ->setPoints(["framework PHP : symfony", "langage client : javascript (jQuery principalement)", "plateforme de paiement : stripe", "tests unitaires : PHPUnit"])
               ->setStart(new \DateTime('2013-01-01'))
               ->setEnd(new \DateTime('2013-01-01'));

        $siteEntreprise->setTitle("site commerciale (cas réel)")
               ->setDescription("Site créé en troisième année de licence informatique, à la faculté des sciences de montpellier. Créé pour un réel client, ami de notre professeur, qui lancait son entreprise de vente en ligne de lampes personnalisables. L'entreprise a depuis fermée, le site aussi.")
               ->setPoints(["nombre de développeurs : 8", "mon rôle : javascript", "type de site : commerce"])
               ->setStart(new \DateTime('2015-01-01'))
               ->setEnd(new \DateTime('2015-01-01'))
               ->setImage('/images/lampe.jpg');

        /*$plonge->setTitle("plongeur")
               ->setDescription("Plonge pour le restaurant universitaire triolet à montpellier. Sans rapport avec l'informatique, ce travail m'a tout de même permis de faire connaissance avec le milieu de l'entreprise.")
               ->setPoints(["framework PHP : symfony", "langage client : javascript (jQuery principalement)", "plateforme de paiement : stripe", "tests unitaires : PHPUnit"])
               ->setStart(new \DateTime('2013-01-01'))
               ->setEnd(new \DateTime('2013-01-01'));

        $plonge->setTitle("plongeur")
               ->setDescription("Plonge pour le restaurant universitaire triolet à montpellier. Sans rapport avec l'informatique, ce travail m'a tout de même permis de faire connaissance avec le milieu de l'entreprise.")
               ->setPoints(["framework PHP : symfony", "langage client : javascript (jQuery principalement)", "plateforme de paiement : stripe", "tests unitaires : PHPUnit"])
               ->setStart(new \DateTime('2013-01-01'))
               ->setEnd(new \DateTime('2013-01-01'));

        $plonge->setTitle("plongeur")
               ->setDescription("Plonge pour le restaurant universitaire triolet à montpellier. Sans rapport avec l'informatique, ce travail m'a tout de même permis de faire connaissance avec le milieu de l'entreprise.")
               ->setPoints(["framework PHP : symfony", "langage client : javascript (jQuery principalement)", "plateforme de paiement : stripe", "tests unitaires : PHPUnit"])
               ->setStart(new \DateTime('2013-01-01'))
               ->setEnd(new \DateTime('2013-01-01'));

        $plonge->setTitle("plongeur")
               ->setDescription("Plonge pour le restaurant universitaire triolet à montpellier. Sans rapport avec l'informatique, ce travail m'a tout de même permis de faire connaissance avec le milieu de l'entreprise.")
               ->setPoints(["framework PHP : symfony", "langage client : javascript (jQuery principalement)", "plateforme de paiement : stripe", "tests unitaires : PHPUnit"])
               ->setStart(new \DateTime('2013-01-01'))
               ->setEnd(new \DateTime('2013-01-01'));

        $plonge->setTitle("plongeur")
               ->setDescription("Plonge pour le restaurant universitaire triolet à montpellier. Sans rapport avec l'informatique, ce travail m'a tout de même permis de faire connaissance avec le milieu de l'entreprise.")
               ->setPoints(["framework PHP : symfony", "langage client : javascript (jQuery principalement)", "plateforme de paiement : stripe", "tests unitaires : PHPUnit"])
               ->setStart(new \DateTime('2013-01-01'))
               ->setEnd(new \DateTime('2013-01-01'));*/

        // $product = new Product();

        $manager->persist($plonge);
        $manager->persist($siteEntreprise);
        /*$manager->persist($WP);
        $manager->persist($gestion);
        $manager->persist($ecrivain);
        $manager->persist($louvre);
        $manager->persist($blogPerso);*/

        $manager->flush();
    }
}
