<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\ProduitsRepository;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use App\Entity\Produits;

class PanierController extends AbstractController
{

    /**
     * @Route("/panier", name="app_panier")
     */
    public function panier(SessionInterface $session, ProduitsRepository $produitRepo): Response
    {
        
        $panier = $session->get("panier", []);

        //On fabrique les données
        $dataPanier = [];
        $total = 0;

        foreach($panier as $id => $quantite) {
            $produits = $produitRepo->find($id);
            $dataPanier[] = [
                "produit" => $produits,
                "quantite" => $quantite
            ];
            $total += $produits->getPrix() * $quantite;
        }

        return $this->render('panier/panier.html.twig', 
            compact("dataPanier", "total"));
    }

    /**
     * @Route("/ajouter/{id}", name="app_ajouterPanier")
     */
    public function ajouterPanier($id, SessionInterface $session, Produits $produits)
    {
        //On récupère le panier actuel
        $panier = $session->get("panier", []);
        $id = $produits->getId();

        if (!empty($panier[$id])) {
            $panier[$id]++;
        } else {
            $panier[$id] = 1;
        }

        //On sauvegarde dans la session
        $session->set("panier", $panier);
        
        return $this->redirectToRoute('app_panier');
    }

    /**
     * @Route("/supprimerElement/{id}", name="app_supprimerElement")
     */
    public function SupprimerElement($id, SessionInterface $session, Produits $produits)
    {
        //On récupère le panier actuel
        $panier = $session->get("panier", []);
        $id = $produits->getId();

        if (!empty($panier[$id])) {
            if($panier[$id]> 1) {
                $panier[$id]--;
            }else {
                unset($panier[$id]);
            }
        } else {
            $panier[$id] = 1;
        }

        //On sauvegarde dans la session
        $session->set("panier", $panier);
        
        return $this->redirectToRoute('app_panier');
    }

    /**
     * @Route("/supprimerLeProduit/{id}", name="app_supprimerLeProduit")
     */
    public function SupprimerLeProduit($id, SessionInterface $session, Produits $produits)
    {
        //On récupère le panier actuel
        $panier = $session->get("panier", []);
        $id = $produits->getId();

        if (!empty($panier[$id])) {
                unset($panier[$id]);
        } 

        //On sauvegarde dans la session
        $session->set("panier", $panier);
        
        return $this->redirectToRoute('app_panier');
    }
}