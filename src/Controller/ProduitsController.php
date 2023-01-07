<?php

namespace App\Controller;

use App\Repository\ProduitsRepository;
use App\Repository\CategoriesRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;


class ProduitsController extends AbstractController
{
    /**
     * @Route("/", name="app_produits")
     */
    public function produits(ProduitsRepository $produitRepo, CategoriesRepository $categorieRepo): Response
    {
        $categories = $categorieRepo->findAll();
        $produits = $produitRepo->findAll();
        

        return $this->render('produits/produits.html.twig', [
            "categories" => $categories,
            "produits" => $produits,
        ]);
    }

    /**
     * @Route("/presentation/{id}", name="app_presentation")
     */
    public function presentation(int $id = 1, ProduitsRepository $produitRepo): Response
    {

        $produit = $produitRepo->find($id);

        return $this->render('produits/presentation.html.twig', [
            'id' => $id,
            "produit" => $produit,
        ]);
    }  
}
