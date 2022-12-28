<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ProduitsController extends AbstractController
{
    /**
     * @Route("/produits", name="app_produits")
     */
    public function produits(): Response
    {
        return $this->render('produits/produits.html.twig', [
        ]);
    }

    /**
     * @Route("/presentation", name="app_presentation")
     */
    public function presentation(): Response
    {
        return $this->render('produits/presentation.html.twig', [
        ]);
    }
}
