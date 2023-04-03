# Contexte - Société ALL4SPORT

Cette section décrit les activités de la société ALL4SPORT et son organisation interne.

## Présentation de la société ALL4SPORT

ALL4SPORT a été créé en 2008 à partir d’une idée toute simple : répondre aux besoins des sportifs amateurs et passionnés en leur proposant une gamme d'articles de sports adaptés à chacun d’eux.

ALL4SPORT est une société anonyme au capital de 150 K€, elle réalise un chiffre d’affaire annuel de 1,2 M€ et compte plus de 200 collaborateurs. Son siège social est basé à Lille, carrefour de l'Europe, grande ville étudiante et dynamique.

ALL4SPORT s'est organisée autour de deux activités principales :

- la logistique : stockage et transport
- la vente : magasins et service en ligne

ALL4SPORT gère de façon distincte ses deux activités et fonctionne donc en interne sur un mode de travail client/fournisseur. Chaque activité étant tour à tour client puis fournisseur selon les besoins de l’entreprise.

### Identification produit

ALL4SPORT a mis au point une identification des produits et enregistre l'ensemble des informations suivantes pour chaque produit :

- référence produit : code qui inclut les **trois premières lettres du fournisseur**, les **trois premières lettres du rayon (sport)** et un **nombre auto-incrémenté de douze chiffres** ;
- nom du fournisseur ;
- rayon du produit ;
- coût unitaire HT ;
- description du produit ;
- photos du produit : de **1 à 5 photo(s)** par produit ;
- quantité en stock Internet ;
- quantité en stock pour chaque magasin ;
- lieu de stockage.

### Suivi client

ALL4SPORT souhaite être proche de ses clients. La société se base sur un fichier client précis et exhaustif. Ainsi pour chaque client est enregistré :

- code client : code constitué des **trois lettres "CLI"** suivies d'un **nombre auto-incrémenté de huit chiffres** ;
- nom et prénom ;
- adresse complète ;
- email ;
- téléphone ;
- date de naissance ;
- nombre d'enfants ;
- âge des enfants ;
- liste des sports pratiqués ;
- historique des achats ;
- date du dernier achat.

### Workflow de vente en ligne

![vente_en_ligne](imgs/workflow_vente_en_ligne.png)

#### Workflow de vente en magasin

![vente_en_magasin](imgs/workflow_vente_en_magasin.png)

(Préciser le compte client avec choix d'un magasin par défaut)

### Livraison

La société ALL4SPORT propose deux modes de livraison à ses clients Internet :

- **retrait en magasin** : gratuit ;
- **livraison à domicile** : forfait de 10 € par commande.

### Zone d'expédition

Chaque entrepôt a une zone d'expédition. Ces zones sont déterminées par les facilités de transport. Chaque magasin dépend d'un entrepôt.

## Implantation nationale et structurelle

### Carte de France des locaux (entrepôts et magasins) de ALL4SPORT

![carte_implantation](imgs/carte_implantation.png)

### Implantation des entrepôts (points *jaunes* sur la carte)

Les entrepôts sont au nombre de trois, basés stratégiquement au Havre, à Marseille et à Lyon.

Les entrepôts sont construits selon une architecture identique, dite « en module ». Chaque bâtiment est ainsi divisé en plusieurs **modules** séparés par des parois coupe-feu. Chaque module reçoit une installation de rayonnage industriel organisée en **rangées**, chaque rangée étant divisée en **sections**, chaque section étant divisée en **étagères**. La hauteur maximum est de huit mètres et la capacité de charge s'élève à trois tonnes par section.

#### Exemple de rayonnage industriel

![rayonnages_industriels](imgs/photo_rayonnages.png)

#### Exemple de plan d'un bâtiment divisé en six modules

![plan_six_modules](imgs/plan_six_modules.png)

Les **modules** seront ici identifiés de **M1 à M6**. Chaque module dispose de six **rangées** de chaque côté de l'allée principale, identifiés de **A à F** à droite et de **G à L** à gauche. Chaque rangée est elle-même divisée en **sections** (zone entre deux montants) numérotées de **1 à 12**. Enfin chaque section est divisée en **étagères** numérotées de **1 à 8** (8 est un maximum ; toutes les sections ne disposent pas du même nombre d’étagères). Une étagère spécifique du bâtiment est appelée **cellule de stockage**.

Exemple d'identification d'une cellule de stockage : **M2D3.5** (Module 2, Rangée D, Section 3, étagère 5).

Les cellules sont étiquetées au moyen de code à barres pour faciliter la lecture et l'enregistrement lors du rangement.

#### Exemple de plan d'une zone logistique

Chaque entrepôt est en réalité une zone logistique qui dispose de cinq bâtiments. Ces zones sont installées idéalement proche des voies de communication : autoroutes, voies ferrées, aéroports, ports maritimes.

![plan_zone_logistique](imgs/plan_zone_logistique.png)

### Implantation des magasins (points *rouges* sur la carte)

Les magasins sont au nombre de douze, installés dans les villes de Lille, Arras, Amiens, Paris, Reims, Metz, Rennes, Tour, Lyon, Bordeaux, Toulouse et Nice.

![plan_magasin](imgs/plan_magasin.png)

La zone magasin dispose de rayons organisés selon les différentes disciplines de sport. La zone de stock permet de fournir le magasin en produit, normalement pour cinq jours d'ouverture. La zone de bureau comprend des bureaux, le local technique informatique et le coffre sécurisé.

# Description des besoins - découpage en lots

Ci-après désignée « Le demandeur » la société ALL4SPORT et toute personne la représentant.

Ci-après désignée « Le candidat », l'entreprise ou le groupement d'entreprise et toute personne la/les représentant proposant une réponse au présent appel d'offre.

Les sections qui suivent sont des annexes de la procédure d'appel d'offre déposée sous le code AO-03569 et la dénomination « Refonte du SI ».

L'appel d’offre est alloti comme suit :

- Lot A - « Vente »
- Lot B - « Logistique »
- Lot C - « Systèmes et réseaux »

## Méthodologie

### 1. Livraisons

Il est demandé au candidat d'adapter son organisation de travail afin de permettre une livraison et une mise en production des modules au fil de l’eau. C'est-à-dire une livraison au fur et à mesure de l'avancement du projet. Le candidat ordonnancera les livraisons comme il le souhaitera.

### 2. Recettes

Chaque livraison fera l'objet d'une recette technique et fonctionnelle établie selon un document réalisé et fourni par le candidat. La recette sera validée en présence du demandeur et du candidat.

## Sécurité du SI

Le candidat met en oeuvre dans ses réalisations, ses échanges et ses conseils, toutes les solutions permettant de garantir la sécurité des stockages et des échanges de données. Il s'appuiera également sur l'expertise du candidat du lot C pour la partie infrastructure.

Une identification et authentification des collaborateurs sur les applications est nécessaire et obligatoire.

Une identification et authentification des clients sur le site marchand est nécessaire et obligatoire.

Un échange chiffré des données sera établi après authentification.

Les deux activités de la société ALL4SPORT doivent faire l'objet de deux Systèmes d'Information disjoints. Il s'agit d'échanges de données entre les deux activités et non d'interconnexion. Ces échanges devront être sécurisés et chiffrés.

# Description du besoin - Lot A

Cette section décrit le lot A - « Vente ».

## Périmètre

Le périmètre est défini tel que le lot A « Vente » est restreint à la refonte du Système d’Information pour les besoins des magasins et du service de vente en ligne. Néanmoins l'interconnexion et les échanges de données avec les lots B et C doivent être considérés dans la réponse aux besoins et les livrables.

## Description des besoins

ALL4SPORT souhaite la mise en place d'un système d'information basé sur les dernières technologies, et privilégie les développements web pour leur portabilité.

Il est demandé au candidat de livrer ses réalisations sous la forme de modules inter-opérables.

### Module « site marchand »

L'objectif du module « site marchand » est la réalisation d'une solution web publiée permettant la présentation des produits proposés par l'entreprise.

L'application fournira :

- une présentation des produits triés par rayon (sport) ;
- une fiche détaillée pour chaque produit indiquant :
  - son prix de vente ;
  - son lieu de disponibilité (stock : magasin ou internet) ;
  - sa quantité disponible pour chaque lieu.

Chaque produit sera identifié selon les pratiques de l'entreprise.

### Module « traitement des commandes clients »

L'objectif du module « traitement des commandes clients » est de permettre la prise de commande et le suivi d'une vente. ALL4SPORT souhaite avoir un suivi du traitement de la commande avec une gestion des état : *transmise*, *validée*, *en préparation*, *expédiée*, *livrée* ou *retirée*.

#### Définition des états

- *transmise* : détermine une commande validée et payée par le client qui est transmise au service client de l'entreprise et qui est en attente de validation.
- *validée* : détermine une commande qui a été confirmée par le service client et qui est en attente de mise en traitement. Le service client indique manuellement l'état sur l’application.
- *en préparation* : détermine une commande qui est prise en charge par un opérateur et en cours de préparation. L'opérateur indique manuellement l'état sur l'application.
- *expédiée* : détermine une commande qui est expédiée. L'opérateur indique manuellement l'état sur l'application.
- *livrée* : détermine une commande qui est confirmée comme livrée chez le client. Le livreur indique manuellement l'état sur l'application.
- *retirée* : détermine une commande qui est confirmée comme ayant été retirée par le client en magasin. Le vendeur magasin indique manuellement l'état sur l'application.

L'entreprise souhaite également fournir à ses clients un historique de leur commande avec un accès aux détails de chacune :

- date de commande ;
- produits commandés ;
- quantité commandée ;
- prix unitaire, sous-total et total de la commande ;
- lieu d'expédition ;
- adresse de livraison.

Chaque client sera identifié selon les pratiques de l'entreprise.

### Module « gestion de vente en magasin »

L'activité vente a en gestion les magasins et devra disposer d'une application dédiée pour les vendeurs. Cette application permettra au vendeur de réaliser une vente produit en magasin. Deux cas de vente :

- *la vente client identifiée* : le client fournit son nom et la vente est attribuée à son compte client ;
- *la vente anonyme* : dans ce cas la vente est attribué au compte du magasin pour permettre un suivi de l’historique des ventes.

Le magasin dispose d'un stock dédié de produits. Une gestion du stock sera mise en place afin de suivre les disponibilités. Les produits seront identifiés comme appartenant au stock du magasin et les quantités seront soustraites lors des ventes.

Un processus de réapprovisionnement devra être mis en oeuvre.

Chaque quantité produit sera suivie et disposera d'un seuil de commande. Ce seuil déterminera une quantité en dessous de laquelle une demande de réapprovisionnement devra être émise.

Dans le cas d'un dépassement du seuil, une demande de réapprovisionnement sera émise et transmise à l'activité logistique pour livraison. Lors de la livraison, les quantités livrées seront ajoutées au stock.

Le candidat établira, avec le lot B, la solution technique d'échange des informations.

### Module « gestion des livraisons »

Le module « gestion des livraisons » devra permettre pour un retrait en magasin :

- de confirmer la disponibilité ;
- de mettre en statut *réservé* les produits dans le stock du magasin concerné.

Pour une livraison à domicile, l'activité de vente sous-traite la livraison à l'activité logistique qui prend en charge la préparation et l'expédition des commandes. Le candidat établira, avec le lot B, la solution technique d'échange des informations. Les échanges doivent permettre :

- de valider la disponibilité du stock ;
- de transmettre les états de suivi de commande.

## Infrastructure

Le candidat établira, pour l'ensemble des modules, un cahier des charges techniques décrivant ses besoins en terme d'infrastructure système et réseau. Ce cahier des charges sera établi conjointement avec le lot C.

# Description du besoin - Lot B

Cette section décrit le lot B - « Logistique ».

## Périmètre

Le périmètre est défini tel que le lot B « Logistique » est restreint à la refonte du Système d'Information pour les besoins des magasins et du service de vente en ligne. Néanmoins l'interconnexion et les échanges de données avec les lots A et C doivent être considérés dans la réponse aux besoins et les livrables.

## Description des besoins

ALL4SPORT souhaite la mise en place d'un Système d'Information basé sur les dernières technologies, et privilégie les développements web pour leur portabilité.

Il est demandé au candidat de livrer ses réalisations sous la forme de modules inter-opérables.

### Module « gestion du stock global - Intranet »

L'objectif du module est la réalisation d'une solution web intranet sécurisée permettant la gestion des stocks produits. L’application fournira :

- une fiche détaillée pour chaque entrepôt ;
- une fiche détaillée pour chaque produit indiquant la position du produit dans son lieu de stockage ;
- un récapitulatif (tableau de bord) général de l'état des stocks ;
- la quantité globale disponible pour un même produit ;
- la quantité disponible dans un entrepôt précis.

Chaque produit sera identifié selon les pratiques de l'entreprise.

### Module « gestion des achats fournisseurs »

Les différents entrepôts gèrent leur stock de façon autonome. Chaque jour, à 10h00, est vérifié et calculé le stock restant et le stock à commander.

Chaque produit dispose d'un état de stock. Cet état de stock est déterminé par des seuils :

- un seuil de rupture qui détermine la quantité sous laquelle le produit est considéré indisponible (par défaut 0).
- un seuil de réapprovisionnement : ce seuil est un taux, d'abord initié arbitrairement pour un nouveau produit à 10 % du stock acheté. Par la suite sera calculé un nouveau seuil, par calcul selon les prévisions de sortie de stock. Ce seuil est re-calculé afin de maîtriser au plus près le stock entrepôt et fonctionner avec une commande par semaine pour chaque produit. Cela limite ainsi les besoins en surface de stockage.

Lorsque le stock pour un produit dans un entrepôt atteint le seuil de rupture, une commande automatique est établie et envoyée aux différents fournisseurs. Cette commande est établie d'après les quantités de la dernière commande majorée de la quantité correspondante au taux du seuil de réapprovisionnement. Le taux de réapprovisionnement est alors réinitialisé à 10.

Lorsque le stock pour un produit dans un entrepôt atteint le seuil de réapprovisionnement, le seuil de réapprovisionnement est re-calculé.

- si le taux de réapprovisionnement est supérieur à 1, une commande automatique est établie d'après les prévisions de sortie de stock soustrait de la quantité restante en stock ;
- si le taux de réapprovisionnement est inférieur à 1, une commande automatique est établie d'après les prévisions de sortie de stock ajouté de la quantité restante en stock.

#### Calcul des prévisions de sortie de stock :

La prévision de sortie de stock est calculée sur le volume des sorties de la dernière semaine.

#### Calcul du nouveau taux de réapprovisionnement :

Le taux de réapprovisionnement est calculé par division de la quantité de la commande précédente par la prévisions de sortie de stock.

- si le taux est supérieur à 1, il est mis à jour avec la nouvelle valeur ;
- si le taux est inférieur à 1, le taux ne change pas.

### Module « traitement des commandes magasins »

Chaque magasin gère son stock de façon autonome. Il établit selon ses besoins une commande à destination de la logistique. Il est donc nécessaire d'établir un *workflow* entre la logistique et les magasins permettant de les réapprovisionner en produits.

Le candidat s'appuiera sur les zones d'expédition pour déterminer l'entrepôt de rattachement du magasin.

Le processus devra prendre en compte :

- automatiquement la commande magasin ;
- gérer la disponibilité des produits et donc la capacité de livraison ;
- la date de livraison, en fonction des dates et des quantités de réapprovisionnement des entrepôts.

Le candidat établira, avec le lot A, la solution technique d'échange des informations : bon de commande, bon de livraison.

### Module « gestion des livraisons à domicile »

Le site marchand de la société propose une livraison en magasin et une livraison à domicile. C'est la logistique qui est en charge de la livraison à domicile. Il est donc nécessaire pour réaliser cette tâche de mettre en place un *workflow* avec la vente.

Le candidat établira, avec le lot A, la solution technique d'échange des informations : transfert du bon de commande, mise à jour de l'état de la commande, préparation et expédition au client.

Un échange sur les quantités disponibles devra être mis en place au préalable avec le site marchand pour permettre à celui-ci d'afficher la disponibilité des produits (disponibilité Internet).

## Infrastructure

Le candidat établira, pour l'ensemble des modules, un cahier des charges techniques décrivant ses besoins en terme d'infrastructure système et réseau. Ce cahier des charges sera établi conjointement avec le lot C.