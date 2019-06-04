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
        $portfolio = new Experience();

        $plonge->setTitle("plongeur")
               ->setDescription("Plonge pour le restaurant universitaire triolet à montpellier. Sans rapport avec l'informatique, ce travail m'a tout de même permis de faire connaissance avec le milieu de l'entreprise.")
               ->setPoints(["framework PHP : symfony", "langage client : javascript (jQuery principalement)", "plateforme de paiement : stripe", "tests unitaires : PHPUnit"])
               ->setStart(new \DateTime('2013-01-01'))
               ->setEnd(new \DateTime('2013-01-01'))
               ->setImage('/images/plongeur.jpg')
               ->setWebsiteLink('#')
               ->setInformationsLink('#');

        $siteEntreprise->setTitle("site commerciale (cas réel)")
               ->setDescription("Site créé pour un réel client, ami de notre professeur, qui lancait son entreprise de vente en ligne de lampes personnalisables. L'entreprise a depuis fermée, le site aussi.")
               ->setPoints(["nombre de développeurs : 8", "mon rôle : javascript", "type de site : commerce", "lieu : faculté des sciences, montpellier", "niveau : licence informatique, 3ème année"])
               ->setStart(new \DateTime('2015-01-01'))
               ->setEnd(new \DateTime('2015-01-01'))
               ->setImage('/images/lampe.jpg')
               ->setWebsiteLink('#')
               ->setInformationsLink('#');

        $WP->setTitle("site sous wordpress")
               ->setDescription("Site présentant les différentes activités et événements se déroulant dans la ville de montpellier. Je ne l'héberge plus aujourd'hui, mettant la priorité sur des sites plus récents.")
               ->setPoints(["cadre : formation openclassrooms", "niveau : équivalent licence", "CMS : wordpress"])
               ->setStart(new \DateTime('2017-01-01'))
               ->setEnd(new \DateTime('2017-01-01'))
               ->setImage('/images/wordpress.jpg')
               ->setWebsiteLink('#')
               ->setInformationsLink('#');

        $gestion->setTitle("gestion de projet, conception et livrables")
               ->setDescription("Ensemble de livrables préparatifs pour la production d'un site sur le salon du chocolat. Création d'une proposition commerciale avec note de cadrage, d'un cahier des charges, d'un budget prévisionnel, et d'un planning de réalisation sous forme de diagramme de gantt.")
               ->setPoints(["cadre : formation openclassrooms", "niveau : équivalent licence", "gestion de projet", "conception d'un site", "production de livrables"])
               ->setStart(new \DateTime('2017-01-01'))
               ->setEnd(new \DateTime('2018-01-01'))
               ->setImage('/images/chocolat.jpg')
               ->setWebsiteLink('#')
               ->setInformationsLink('#');

        $ecrivain->setTitle("blog pour écrivain (PHP, jQuery)")
               ->setDescription("Blog PHP, sans framework (excepté bootstrap) ni CMS. Création de la partie front office et de la partie back office. Un effort particulier a été mit à la création d'une liseuse entièrement fait maison en jQuery, non demandée par ma formation, qui s'adapte très précisément a la taille de l'écran, et va jusqu'à s'organiser en double page sur très grand écran, pour éviter les lignes trop longues sans laisser trop d'espace inutile. Un soucis particulier a donc été apporté à l'ergonomie, et un travail sur des algorithmes plus complexes qu'à l'accoutumée a été apporté avec grand intérêt.")
               ->setPoints(["cadre : formation openclassrooms", "niveau : équivalent licence", "langages principaux : PHP, jQuery", "framework CSS : bootstrap", "apport personnel (non demandé) : liseuse fait maison", "pattern : MVC", "POO (programmation orientée objet"])
               ->setStart(new \DateTime('2018-01-01'))
               ->setEnd(new \DateTime('2018-01-01'))
               ->setImage('/images/ecrivain.jpg')
               ->setWebsiteLink('#')
               ->setInformationsLink('#');

        $louvre->setTitle("louvre (symfony, stripe)")
               ->setDescription("Site de réservation de billets en ligne pour le musée du louvre. Réalisé avec symfony, et la plateforme de paiement stripe.")
               ->setPoints(["cadre : formation openclassrooms", "niveau : équivalent licence", "type de site : commerciale", "framework PHP : symfony", "framework CSS : bootstrap", "langage client : javascript (jQuery)", "plateforme de paiement : stripe", "tests unitaires : PHPUnit", "pattern : MVC", "POO (programmation orientée objet", "apport personnel (non demandé) : gestion des réservations passées"])
               ->setStart(new \DateTime('2019-01-01'))
               ->setEnd(new \DateTime('2019-01-01'))
               ->setImage('/images/louvre.jpg')
               ->setWebsiteLink('#')
               ->setInformationsLink('#');

        $blogPerso->setTitle("blog personnel (symfony, bootstrap)")
               ->setDescription("blog personnel, pour y présenter mes productions personnelles non professionnelles, mes passes temps : le dessin, l'écriture, et la composition musicale.")
               ->setPoints(["cadre : temps libre", "framework PHP : symfony", "framework CSS : bootstrap", "langage client : javascript (jQuery)", "pattern : MVC", "POO (programmation orientée objet"])
               ->setStart(new \DateTime('2019-01-01'))
               ->setEnd(new \DateTime('2019-01-01'))
               ->setImage('/images/blog.jpg')
               ->setWebsiteLink('#')
               ->setInformationsLink('#');

        $portfolio->setTitle("portfolio (symfony, bootstrap, jQuery)")
               ->setDescription("Le présent portfolio.")
               ->setPoints(["cadre : recherche d'emploie", "framework PHP : symfony", "framework CSS : bootstrap", "langage client : javascript (jQuery)", "pattern : MVC", "POO (programmation orientée objet"])
               ->setStart(new \DateTime('2019-01-01'))
               ->setEnd(new \DateTime('2019-01-01'))
               ->setImage('/images/photoFredericMalard.jpg')
               ->setWebsiteLink('#')
               ->setInformationsLink('#')
               ->setGithub('portfolio');

        return [$louvre, $ecrivain, $blogPerso, $plonge, $gestion, $portfolio, $siteEntreprise, $WP];
    }
}