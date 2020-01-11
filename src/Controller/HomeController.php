<?php

namespace App\Controller;

use App\Service\MyAge;
use App\Service\DataExperience;
use App\Repository\ExperienceRepository;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class HomeController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    public function index(MyAge $ageService, DataExperience $experienceService)
    {
        $myAge = $ageService->getMyAge();
        $experiences = $experienceService->getMyExperience();

        return $this->render('home/index.html.twig', [
            'myAge' => $myAge,
            'experiences' => $experiences
        ]);
    }

    /**
     * @Route("/snowtricks", name="snowtricks")
     */
    public function snowtricks()
    {
        return $this->render("/home/snowtricks.html.twig");
    }

    /**
     * @Route("/blog-artistique", name="blog_artistique")
     */
    public function blogArtistique()
    {
        return $this->render("/home/blogArtistique.html.twig");
    }

    /**
     * @Route("/a-propos-de-moi", name="moi")
     */
    public function moi()
    {
        return $this->render("/home/moi.html.twig");
    }

    /**
     * @Route("/demineur", name="demineur")
     */
    public function demineur()
    {
        return $this->render('jsDemo/demineur.html.twig', [

        ]);
    }
}
