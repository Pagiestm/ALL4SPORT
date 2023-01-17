<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\ProduitsRepository;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use App\Entity\Produits;
use App\Entity\UtilisateursAdresses;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\Request;
use App\Form\UtilisateurAdresseType;
use App\Repository\UtilisateursAdressesRepository;

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

    /**
     * @Route("/panier/livraison", name="app_livraison")
     */
    public function livraison(UtilisateursAdressesRepository $utilisateuradresseRepo, Request $request, ManagerRegistry $doctrine, SessionInterface $session): Response
    {
        if (!$this->getUser()) {
            return $this->redirectToRoute('app_login');
        }

        $user = $this->getUser();
        $utilisateurAdresses = $utilisateuradresseRepo->findby(['user'=>$user]);

        $utilisateurAdresse = new UtilisateursAdresses();
        $form = $this->createForm(UtilisateurAdresseType::class, $utilisateurAdresse);

        $manager = $doctrine->getManager();

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $utilisateurAdresse = $form->getData();
            $manager->persist($utilisateurAdresse);
            $manager->flush();

            return $this->redirectToRoute('app_livraison');
        }
        

        return $this->renderForm('panier/livraison.html.twig', [
            'utilisateurAdresse' => $form,
            "utilisateurAdresses" => $utilisateurAdresses,
        ]);
    }

    /**
     * @Route("/panier/commande", name="app_commande")
     */
    public function Commande() {

        if (!$this->getUser()) {
            return $this->redirectToRoute('app_login');
        }

        return $this->render('panier/commande.html.twig' );
    }
}