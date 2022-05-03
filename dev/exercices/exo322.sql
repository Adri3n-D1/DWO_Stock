-- Récupérer toutes les commandes envoyés par le transporteur d'id 1
SELECT * FROM commande WHERE fk_id_transporteur = 1

-- Récupérer le panier du client n°3
SELECT * FROM panier WHERE fk_id_client = 3

-- Récupérer le compte du client n°5
SELECT * FROM compte WHERE fk_id_client = 5

-- Récupérer tout les produits de la commande 1
SELECT p.nom_produit FROM commande_produit as cp INNER JOIN produit as p ON p.id_produit = cp.fk_id_produit WHERE cp.fk_id_commande = 1

-- Récupérer tout les produits du panier du panier 3
SELECT p.description_produit FROM panier_produit as cp INNER JOIN produit as p ON p.id_produit = cp.fk_id_produit WHERE cp.fk_id_panier = 3

-- Récupérer le type du compte et le prenom du client 5
SELECT compte.type_compte, client.prenom_client FROM client as client INNER JOIN compte as compte ON client.id_client = compte.fk_id_client WHERE compte.fk_id_client = 5

-- Récupérer le nom de la catégorie du produit 5 aisni que le nom du produit 5
SELECT c.nom_categorie, p.nom_produit FROM categorie_produit AS cp
INNER JOIN produit AS p
ON p.id_produit = cp.fk_id_produit
INNER JOIN categorie AS c
ON c.id_categorie = cp.fk_id_categorie
WHERE cp.fk_id_produit = 5

-- Récupérer tout les produits de la catégorie 2
SELECT * FROM produit AS p
INNER JOIN categorie_produit as cp
ON cp.fk_id_produit = p.id_produit
WHERE cp.fk_id_categorie = 2

-- Récupérer toutes les commandes qui ont le transporteur ups
SELECT * FROM commande AS c
INNER JOIN transporteur as t
ON t.id_transporteur = c.fk_id_transporteur
WHERE t.nom_transporteur = 'ups'

-- Récupérer la facture de la commande 5
SELECT * FROM facture as f
WHERE f.fk_id_commande = 5

-- Récupèrer tout les produits commandés par le client 6
SELECT * FROM produit AS p
INNER JOIN commande_produit AS cp
ON cp.fk_id_produit = p.id_produit
INNER JOIN commande AS co
ON co.id_commande = cp.fk_id_commande
INNER JOIN client as cl
ON cl.id_client = co.fk_id_client
WHERE cl.id_client = 6