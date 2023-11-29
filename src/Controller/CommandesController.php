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
     * @Route("/panier/commande/validation", name="app_validation_commande")
     */
    public function validationCommande(SessionInterface $session, ProduitsRepository $produitRepo)
    {
        // Récupérez les données du panier à partir de la session
        $panier = $session->get("panier", []);

        // Récupérez les informations sur les produits du panier
        $dataPanier = [];
        $total = 0;
        $quantiteTotale = 0;

        foreach ($panier as $id => $quantite) {
            $produit = $produitRepo->find($id);
            if (!$produit) {
                throw $this->createNotFoundException('Le produit demandé n\'existe pas');
            }

            // On ajoute les informations du produit dans $dataPanier
            $dataPanier[] = [
                "produit" => $produit,
                "quantite" => $quantite,
            ];

            $total += $produit->getPrix() * $quantite;

            // On ajoute la quantité du produit à la quantité totale
            $quantiteTotale += $quantite;
        }

        return $this->render('panier/validation_commande.html.twig', [
            'dataPanier' => $dataPanier,
            'total' => $total,
            'quantiteTotale' => $quantiteTotale,
        ]);
    }

    /**
     * @Route("/panier/commander", name="app_commande")
     */
    public function Commande(SessionInterface $session, ProduitsRepository $produitRepo, StocksRepository $stocksRepo, EntityManagerInterface $entityManager, ManagerRegistry $doctrine)
    {

        if (!$this->getUser()) {
            return $this->redirectToRoute('app_login');
        }

        $panier = $session->get("panier", []);
        $dataPanier = [];
        $total = 0;
        $quantiteTotale = 0;

        $commande = new Commandes;

        // On boucle sur chaque produit du panier
        foreach ($panier as $id => $quantite) {
            $produit = $stocksRepo->find($id);
            if (!$produit) {
                throw $this->createNotFoundException('Le produit demandé n\'existe pas');
            }

            $stockDisponible = $produit->getQuantite();
            if ($stockDisponible < $quantite) {
                throw new \Exception("Il n'y a pas assez de stock disponible");
            }

            $produit->setQuantite($stockDisponible - $quantite);
            $produit->setStockCritique($produit->isStockCritique());
            $entityManager = $doctrine->getManager();
            $entityManager->persist($produit);

            // On ajoute les informations du produit dans $dataPanier
            $dataPanier[] = [
                "produit" => $produit,
                "quantite" => $quantite,
            ];

            $produit = $produitRepo->find($id);
            // On ajoute le prix total pour tous les produits
            $total += $produit->getPrix() * $quantite;

            // On ajoute la quantité du produit à la quantité totale
            $quantiteTotale += $quantite;

            // On ajoute le produit à la commande
            $commande->addProduit($produit);
            $commande->setEtat("En cours")
                ->setUser($this->getUser())
                ->setTotal($total)
                ->setDate(new \DateTimeImmutable());
        }

        // On définit la quantité totale de tous les produits dans la commande
        $commande->setQuantite($quantiteTotale);

        // On persiste la commande
        $entityManager->persist($commande);
        $entityManager->flush();

        // On supprime ce qu'il y a dans le panier
        $session->set('panier', []);

        $this->addFlash('success', 'La commande a été transmise avec succès.');

        return $this->redirectToRoute('app_historiqueCommandes');
    }

    /**
     * @Route("/commandes", name="app_historiqueCommandes")
     */
    public function commandes(CommandesRepository $commandeRepos)
    {
        $user = $this->getUser();
        $commandes = $commandeRepos->findBy(['user' => $user]);

        return $this->render('historique/commandes.html.twig', [
            'commandes' => $commandes,
        ]);
    }
}
