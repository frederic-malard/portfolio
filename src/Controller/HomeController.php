<?php

namespace App\Controller;

use App\Service\MyAge;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class HomeController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    public function index(MyAge $ageService)
    {
        $myAge = $ageService->getMyAge();

        return $this->render('home/index.html.twig', [
            'myAge' => $myAge
        ]);
    }
}
