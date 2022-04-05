<?php
// Créez les fichiers PHP suivant : index.php, vehicule.interface.php, voiture.class.php et poidslourd.class.php, dans un même dossier.
// - Dans le fichier vehicule.interface.php :
// Créez une interface nommée 'Vehicule'.

// Déclarez une constante 'ANNEE' avec la valeur 2006.

// Déclarez ensuite 3 méthodes 'getVehicule', 'setAutorisation' et 'getAutorisation'.
// - Dans le fichier voiture.class.php :
// Créez une classe nommée 'Voiture' qui implémente l'interface 'Vehicule'.

// A l'intérieur de cette classe, faites la déclaration des propriétés protégées suivantes :
// • 'marque' sans valeur,
// • 'modele' sans valeur,
// • 'annee' sans valeur,
// • 'carburant' sans valeur,
// • 'autorisation' sans valeur.

// Déclarez la méthode constructeur prenant en paramètres les variables 'newMarque', 'newModele', 'newAnnee' et 'newCarburant' et les stockant respectivement dans les propriétés 'marque', 'modele', 'annee' et 'carburant'.

// Implémentez la méthode 'getVehicule' qui affiche le message « Voiture : [marque modele]. Mise en circulation : [annee]. Carburant : [carburant] <br> ».

// Implémentez ensuite la méthode 'setAutorisation' dans laquelle vous créez une condition afin de vérifier si 'annee' est inférieur à la constante 'ANNEE' ET si 'carburant' est égale à « Diesel » :
// • si c'est le cas, stockez dans la propriété 'autorisation' la valeur faux,
// • sinon, stockez dans la propriété 'autorisation' la valeur vrai.

// Enfin, implémentez la méthode 'getAutorisation' dans laquelle vous créez une condition afin de vérifier si la valeur de 'autorisation' est vrai :
// • si c'est le cas, affichez le message « Cette voiture est autorisée à circuler dans Paris. <br> »,
// • sinon, affichez le message « Cette voiture n'est pas autorisée à circuler dans Paris. <br> ».
// - Dans le fichier poidslourd.class.php :
// Créez une classe nommée 'PoidsLourd' qui implémente l'interface 'Vehicule'.

// A l'intérieur de cette classe, faites la déclaration des propriétés protégées suivantes :
// • 'marque' sans valeur,
// • 'modele' sans valeur,
// • 'annee' sans valeur,
// • 'carburant' sans valeur,
// • 'ptac' sans valeur,
// • 'autorisation' sans valeur.

// Déclarez la méthode constructeur prenant en paramètres les variables 'newMarque', 'newModele', 'newAnnee' et 'newCarburant' et les stockent respectivement dans les propriétés 'marque', 'modele', 'annee' et 'carburant'.

// Implémentez la méthode 'getVehicule' qui affiche le message « Poids lourd : [marque modele]. Mise en circulation : [annee]. Carburant : [carburant] <br> ».

// Implémentez ensuite la méthode 'setAutorisation' dans laquelle vous créez une condition afin de vérifier si 'annee' est inférieur à la constante 'ANNEE' plus 3 ET si 'carburant' est égale à « Diesel » :
// • si c'est le cas, stockez dans la propriété 'autorisation' la valeur faux,
// • sinon, stockez dans la propriété 'autorisation' la valeur vrai.

// Enfin, implémentez la méthode 'getAutorisation' dans laquelle vous créez une condition afin de vérifier si la valeur de 'autorisation' est vrai :
// • si c'est le cas, affichez le message « Ce poids lourd est autorisé à circuler dans Paris. <br> »,
// • sinon, affichez le message « Ce poids lourd n'est pas autorisé à circuler dans Paris. <br> ».

// Pour finir, déclarez une méthode 'getPtac' qui affiche le message « PTAC : ptac tonnes <br> »
// - Dans le fichier index.php :
// Inclure les fichiers vehicule.interface.php, voiture.class.php et poidslourd.class.php.

// Faites la déclaration des variables suivantes :
// • 'vehicule1' qui contiendra une nouvelle instance de la classe 'Voiture' avec les arguments suivants « Opel », « Corsa », 2009, « Diesel » ;
// • 'vehicule2' qui contiendra une nouvelle instance de la classe 'Voiture' avec les arguments suivants « Renault », « Clio », 2004, « Diesel » ;
// • 'vehicule3' qui contiendra une nouvelle instance de la classe 'Voiture' avec les arguments suivants « Peugeot », « 206 », 2004, « Essence » ;
// • 'vehicule4' qui contiendra une nouvelle instance de la classe 'PoidsLourd' avec les arguments suivants « Renault », « T380 », 2008, « Essence », 18 ;
// • 'vehicule5' qui contiendra une nouvelle instance de la classe 'PoidsLourd' avec les arguments suivants « Volvo », « FH13 », 2007, « Diesel », 26.

// Pour chacun des 5 objets déclarés précédemment, utilisez les méthodes 'getVehicule' puis 'setAutorisation' et enfin 'getAutorisation'.

// Utilisez la méthode 'getPtac' sur l'objet 'vehicule5'.

require_once 'exo295_vehicule.interface.php';
require_once 'exo295_voiture.class.php';
require_once 'exo295_poidslourd.class.php';

$vehicule1 = new Voiture('Opel', 'Corsa', 2009, 'Diesel');
$vehicule2 = new Voiture('Renault', 'Clio', 2004, 'Diesel');
$vehicule3 = new Voiture('Peugeot', '206', 2004, 'Essence', 18);

$vehicule4 = new PoidsLourd('Renault', 'T380', 2008, 'Essence');
$vehicule5 = new PoidsLourd('Volvo', 'FH13', 2007, 'Diesel', 26);

$vehicule1->getVehicule();
$vehicule1->setAutorisation();
$vehicule1->getAutorisation();

$vehicule2->getVehicule();
$vehicule2->setAutorisation();
$vehicule2->getAutorisation();

$vehicule3->getVehicule();
$vehicule3->setAutorisation();
$vehicule3->getAutorisation();

$vehicule4->getVehicule();
$vehicule4->setAutorisation();
$vehicule4->getAutorisation();
$vehicule4->getPtac();

$vehicule5->getVehicule();
$vehicule5->setAutorisation();
$vehicule5->getAutorisation();
$vehicule5->getPtac();