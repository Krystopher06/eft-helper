<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ConseilWikiController extends AbstractController
{
    /**
     * @Route("/wiki_conseil", name="app_conseil_wiki")
     */
    public function index(): Response
    {
        return $this->render('conseil_wiki/index.html.twig', [
            'controller_name' => 'ConseilWikiController',
        ]);
    }
}
