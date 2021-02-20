<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SherpaController extends AbstractController
{
    /**
     * @Route("/sherpa", name="app_sherpa")
     */
    public function index(): Response
    {
        return $this->render('sherpa/index.html.twig', [
            'controller_name' => 'SherpaController',
        ]);
    }
}
