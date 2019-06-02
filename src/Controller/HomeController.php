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
}
