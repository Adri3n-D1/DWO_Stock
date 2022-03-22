<?php
// Créez les fichiers PHP suivant : index.php, rectangle.class.php et carre.class.php.
// - Dans le fichier rectangle.class.php :
// Créez une classe nommée 'Rectangle'.

// A l'intérieur de cette classe, faites la déclaration des propriétés protégées suivantes :
// • 'longueur' sans valeur,
// • 'largeur' sans valeur,
// • 'perimetre' sans valeur.

// Déclarez la méthode constructeur qui prend en paramètre les variables 'newLongueur' et 'newLargeur' et les stockent respectivement dans les propriétés 'longueur' et 'largeur'.

// Déclarez ensuite une méthode publique 'setPerimetre' qui stocke dans la propriété 'perimetre' le résultat de l'opération 2 * ('longueur' + 'largeur').

// Enfin, déclarez une méthode publique 'getPerimetre' qui retourne la valeur de la propriété 'perimetre'.
// - Dans le fichier carre.class.php :
// Créez une classe nommée 'Carre' qui étend la classe 'Rectangle'.

// Faites la déclaration de la propriété privée 'couleur'.

// Surchargez la méthode constructeur qui prend en paramètre une variable 'newCote' et la stocke dans les propriétés 'longueur' et 'largeur'.

// Déclarez ensuite une nouvelle méthode publique 'setCouleur' qui prend en paramètre la variable 'newCouleur' et stocke sa valeur dans la propriété 'couleur'.

// Enfin, déclarez une méthode publique 'getCouleur' qui affiche le message « Le carré est [couleur] ».
// - Dans le fichier index.php :
// Inclure les fichiers rectangle.class.php et carre.class.php.

// Faites la déclaration d'une variable 'rectangle' qui contiendra une nouvelle instance de la classe 'Rectangle' avec comme arguments les valeurs 20 et 10.

// Déclarez ensuite une variable 'carre' qui contiendra une nouvelle instance de la classe 'Carre' avec comme argument la valeur 18.

// Utilisez la méthode 'setPerimetre' sur l'objet 'rectangle'.

// Utilisez ensuite la méthode 'setPerimetre' sur l'objet 'carre'.

// Enfin, utilisez la méthode 'setCouleur' sur l'objet 'carre' avec comme argument la valeur « rouge ».

// A l'aide de la méthode 'getPerimetre' sur l'objet 'rectangle', affichez le message « Le périmètre du rectangle vaut : 60cm <br> ».

// A l'aide de la méthode 'getPerimetre' sur l'objet 'carre', affichez le message « Le périmètre du carré vaut : 72cm ».

// Pour finir, appelez la méthode 'getCouleur' sur l'objet 'carre'. 

require_once 'exo291_rectangle.class.php';
require_once 'exo291_carre.class.php';

$rectangle = new Rectangle(20, 10);

$carre = new Carre(18);

$rectangle->setPerimetre();

$carre->setPerimetre();
$carre->setCouleur('rouge');

echo 'Le périmètre du rectangle vaut : ' . $rectangle->getPerimetre() . 'cm<br>';
echo 'Le périmètre du carre vaut : ' . $carre->getPerimetre() . 'cm<br>';
$carre->getCouleur();