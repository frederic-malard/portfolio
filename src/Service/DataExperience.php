<?php

namespace App\Service;

use App\Entity\Experience;

class DataExperience
{
    /**
     * return my experience, usefull for the index page
     * I don't use a database, because OVH allow a limited number of database, and I don't want to waste one for so few datas.
     */
    public function getMyExperience()
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
               ->setEnd(new \DateTime('2013-01-01'))
               ->setImage('/images/plongeur.jpg')
               ->setWebsiteLink('#')
               ->setInformationsLink('#');

        $siteEntreprise->setTitle("site commerciale (cas réel)")
               ->setDescription("Site créé en troisième année de licence informatique, à la faculté des sciences de montpellier. Créé pour un réel client, ami de notre professeur, qui lancait son entreprise de vente en ligne de lampes personnalisables. L'entreprise a depuis fermée, le site aussi.")
               ->setPoints(["nombre de développeurs : 8", "mon rôle : javascript", "type de site : commerce"])
               ->setStart(new \DateTime('2015-01-01'))
               ->setEnd(new \DateTime('2015-01-01'))
               ->setImage('/images/lampe.jpg')
               ->setWebsiteLink('#')
               ->setInformationsLink('#');

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

        return [$plonge, $siteEntreprise];
    }
}