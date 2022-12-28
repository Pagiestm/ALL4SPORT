<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PanierController extends AbstractController
{
    /**
     * @Route("/panier", name="app_panier")
     */
    public function panier(): Response
    {
        return $this->render('panier/panier.html.twig', [
        ]);
    }

    /**
     * @Route("/panier/livraison", name="app_livraison")
     */
    public function livraison(): Response
    {
        return $this->render('panier/livraison.html.twig', [
        ]);
    }

    /**
     * @Route("/panier/validation", name="app_validation")
     */
    public function validation(): Response
    {
        return $this->render('panier/validation.html.twig', [
        ]);
    }
}
