<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\ProduitsRepository;
use App\Repository\StocksRepository;
use App\Entity\Commandes;
use App\Repository\CommandesRepository;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Persistence\ManagerRegistry;

class CommandesController extends AbstractController
{
    /**
     * @Route("/panier/commande", name="app_commande")
     */
    public function Commande(CommandesRepository $commandeRepos, SessionInterface $session, ProduitsRepository $produitRepo, StocksRepository $stocksRepo, EntityManagerInterface $entityManager, ManagerRegistry $doctrine)
    {

        if (!$this->getUser()) {
            return $this->redirectToRoute('app_login');
        }

        $user = $this->getUser();
        $commandes = $commandeRepos->findby(['user' => $user]);

        $panier = $session->get("panier", []);
        $total = 0;
        $dataPanier = [];

        // On boucle sur chaque produit du panier
        foreach ($panier as $id => $quantite) {
            $produit = $stocksRepo->find($id);
            if(!$produit) {
                throw $this->createNotFoundException('Le produit demandé n\'existe pas');
            }
    
            $stockDisponible = $produit->getQuantite();
            if($stockDisponible < $quantite) {
                throw new \Exception("Il n'y a pas assez de stock disponible");
            }
    
            $produit->setQuantite($stockDisponible - $quantite);
            $produit->setStockCritique($produit->isStockCritique());
            $entityManager = $doctrine->getManager();
            $entityManager->persist($produit);
            $entityManager->flush();

            // On ajoute les informations du produit dans $dataPanier
            $dataPanier[] = [
                "produit" => $produit,
                "quantite" => $quantite,
            ];

            $produit = $produitRepo->find($id);
            // On ajoute le prix total pour tous les produits
            $total += $produit->getPrix() * $quantite;

            // On crée une commande pour chaque produit du panier
            $commande = new Commandes;
            $commande->setEtat("En cours")
                ->setUser($this->getUser())
                ->setDate(new \DateTimeImmutable())
                ->setProduit($produit->getNom())
                ->setPrix($produit->getPrix())
                ->setTotal($total)
                ->setQuantite($quantite);

            $entityManager->persist($commande);
        }

        // On enregistre toutes les commandes
        $entityManager->flush();

        // On supprime ce qu'il y a dans le panier
        $session->set('panier', []);

        return $this->render('panier/commande.html.twig', [
            'commandes' => $commandes,
        ]);
    }
}
