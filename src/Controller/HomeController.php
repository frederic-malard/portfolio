<?php

namespace App\Controller;

use App\Service\MyAge;
use App\Repository\ExperienceRepository;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class HomeController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    public function index(MyAge $ageService, ExperienceRepository $repository)
    {
        $myAge = $ageService->getMyAge();
        $experiences = $repository->findAll();

        return $this->render('home/index.html.twig', [
            'myAge' => $myAge,
            'experiences' => $experiences
        ]);
    }
}
