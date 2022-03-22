<?php
// Créez les fichiers PHP suivant : index.php, recharger.trait.php, rouler.trait.php, voiture.class.php et pile.class.php, dans un même dossier
// - Dans le fichier recharger.trait.php :
// Créez un trait nommé 'Recharger'.

// Faites la déclaration de 2 propriétés protégées 'capacite' et 'capaciteMax'.

// Déclarez la méthode 'recharger' dans laquelle vous :
// • stockez la valeur de la propriété 'capaciteMax' dans la propriété 'capacite',
// • affichez le message « Recharge ! <br> »,
// • retournez l’objet.

// Déclarez une deuxième méthode nommée 'getCapacite' dans laquelle vous :
// • affichez le message « Il reste [x] <br> » avec 'x' équivalent à la valeur de la propriété 'capacite',
// • retournez l’objet.

// Déclarez ensuite une méthode abstraite 'getUnite'.

// Pour finir, déclarez la méthode 'utiliser' dans laquelle vous :
// • créez une condition afin de vérifier si 'capacite' est supérieur ou égale à 50 :
// • si c'est le cas, soustraire 50 à la propriété 'capacite' et affichez le message « Utilisation <br> »,
// • sinon, affichez le message « Capacité insuffisante, rechargez ! <br> ».
//  • retournez l’objet.
// - Dans le fichier rouler.trait.php :
// Créez un trait nommé 'Rouler'.

// Faites la déclaration de la propriété protégée 'capacite'.

// Déclarez la méthode 'utiliser' qui prend en paramètre une variable 'kilometre' et dans laquelle vous :
// • déclarez une variable 'consomation' qui prend en valeur le résultat de l'opération 'kilometre' multiplié par 8 divisé par 100,
// • créez une condition afin de vérifier si 'capacite' est supérieur ou égale à 'consomation' :
// • si c'est le cas, soustraire 'consomation' à la propriété 'capacite' et affichez le message « Vous avez consommé [consommation] L pour [kilometre] km <br> »,
// • sinon, affichez le message « Le réservoir n'a pas assez de carburant, vous devez faire le plein ! <br> ».
//  • Retournez l’objet.
// - Dans le fichier voiture.class.php :
// Créez une classe nommé 'Voiture'.

// Utilisez les traits 'Recharger' et 'Rouler'.

// Choisissez la définition de la méthode 'utiliser' du trait 'Rouler' plutôt que du trait 'Recharger'.

// Déclarez la méthode constructeur prenant en paramètres une variable 'newMax', stockez 'newMax' dans la propriété 'capaciteMax' et affichez le message « Nouvelle voiture avec un réservoir de [capaciteMax] L <br> ».

// Surchargez la méthode 'recharger' dans laquelle vous :
// • stockez la valeur de la propriété 'capaciteMax' dans la propriété 'capacite',
// • affichez le message « Le plein est fait. <br> »,
// • retournez l’objet.

// Implémentez la méthode 'getUnite' qui affiche le message « L de carburant. <br> »
// - Dans le fichier pile.class.php :
// Créez une classe nommée 'Pile'.

// Utilisez le trait 'Recharger'.

// Définissez une constante 'MAX' ayant pour valeur 100.

// Déclarez la méthode constructeur dans laquelle :
// • Stockez la valeur de la constante 'MAX' dans la propriété 'capacite',
// • Stockez la valeur de la constante 'MAX' dans la propriété 'capaciteMax',
// • Affichez le message « Nouvelle pile à [capacite] % <br> »

// Implémentez la méthode 'getUnite' qui affiche le message « % de batterie. <br> »
// - Dans le fichier index.php :
// - Inclure les fichiers recharger.trait.php et rouler.trait.php.

// - Utilisez l'auto chargement des classes.

// - Déclarez une variable 'voiture' qui contiendra une nouvelle instance de la classe 'Voiture' avec comme argument la valeur 50.

// - Appelez la méthode 'recharger' sur l'objet 'voiture'.

// - Chainez sur l'objet 'voiture' les méthodes 'utiliser' avec comme argument la valeur 400, 'getCapacite' puis 'getUnite'.

// - Appelez la méthode 'utiliser' sur l'objet 'voiture' avec comme argument la valeur 400.

// - Déclarez une variable 'pile' qui contiendra une nouvelle instance de la classe 'Pile'.

// - Chaînez sur l'objet 'pile' les méthodes 'utiliser', 'getCapacite' puis 'getUnite'.

// - Chaînez sur l'objet 'pile' les méthodes 'utiliser', 'utiliser', 'getCapacite' puis 'getUnite'.

// - Enfin, chaînez sur l'objet 'pile' les méthodes 'recharger', 'getCapacite' puis 'getUnite'.

require_once 'exo296_recharger.trait.php';
require_once 'exo296_rouler.trait.php';

spl_autoload_register(function($classe){
    require 'exo296_'. $classe . '.class.php';
});

$voiture = new Voiture(50);

$voiture->recharger();
$voiture->utiliser(400)->getCapacite()->getUnite();
$voiture->utiliser(400);

$pile = new Pile();

$pile->utiliser()->getCapacite()->getUnite();
$pile->utiliser()->utiliser()->getCapacite()->getUnite();
$pile->recharger()->getCapacite()->getUnite();