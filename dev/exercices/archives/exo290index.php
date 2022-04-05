<?php
// Créez les fichiers PHP suivant : index.php et taxe.class.php, dans un même dossier
// - Dans le fichier taxe.class.php :
// Créez une classe nommée 'Taxe'.

// A l'intérieur de cette classe, faites la déclaration des propriétés privées suivantes :
// • 'prixHt' sans valeur,
// • 'prixTtc' sans valeur,
// • 'tva' avec comme valeur 20.

// Déclarez ensuite 3 méthodes getters publiques 'getPrixHt', 'getTva' et 'getPrixTtc' qui retournent respectivement les valeurs des propriétés 'prixHt', 'tva' et 'prixTtc'.

// Enfin, déclarez les 3 méthodes setters publiques suivantes :
// • 'setPrixHt' qui prend en paramètre la variable 'new_prix_ht' et stocke sa valeur dans la propriété 'prixHt',
// • 'setTva' qui prend en paramètre la variable 'new_tva' et stocke sa valeur dans la propriété 'tva',
// • 'setPrixTtc' qui ne prend pas de paramètre et stocke dans la propriété 'prixTtc' le résultat de l'opération 'prixHt' + 'prixHt' / 100 * 'tva'.
// - Dans le fichier index.php :
// Inclure le fichier taxe.class.php.

// Faites la déclaration d'une variable 'taxe1' qui contiendra une nouvelle instance de la classe 'Taxe'.

// Utilisez la méthode 'setPrixHt' sur l'objet 'taxe1' avec comme argument la valeur 20.

// Utilisez ensuite la méthode 'setPrixTtc' sur l'objet 'taxe1'.

// A l'aide des méthodes 'getPrixHt', 'getTva' et 'getPrixTtc' sur l'objet 'taxe1', affichez le message « Pour un prix Hors Taxe de 20€ et une TVA à 20%, le prix total est de 24€<br> ».

// Faites la déclaration d'une variable 'taxe2' qui contiendra une nouvelle instance de la classe 'Taxe'.

// Utilisez la méthode 'setPrixHt' sur l'objet 'taxe2' avec comme argument la valeur 30.

// Utilisez ensuite la méthode 'setTva' sur l'objet 'taxe2' avec comme argument la valeur 5.5.

// Pour finir, utilisez la méthode 'setPrixTtc' sur l'objet 'taxe2'.

// A l'aide des méthodes 'getPrixHt', 'getTva' et 'getPrixTtc' sur l'objet 'taxe2', affichez le message « Pour un prix Hors Taxe de 30€ et une TVA à 5.5%, le prix total est de 31.65€ ».

require_once 'exo290.taxe.class.php';

$taxe1 = new Taxe;
$taxe1->setPrixHt(20);
$taxe1->setPrixTtc();

echo 'Pour un prix Hors Taxe de ' . $taxe1->getPrixHt() . ' et une TVA à ' . $taxe1->getTva() . ', le prix total est de ' . $taxe1->getPrixTtc() . '€<br>';

$taxe2 = new Taxe;
$taxe2->setPrixHt(30);
$taxe2->setTva(5.5);
$taxe2->setPrixTtc();

echo 'Pour un prix Hors Taxe de ' . $taxe2->getPrixHt() . ' et une TVA à ' . $taxe2->getTva() . ', le prix total est de ' . $taxe2->getPrixTtc() . '€<br>';