<?php
// Créez les fichiers PHP suivant : index.php, operations.class.php, addition.class.php et division.class.php, dans un même dossier.
// - Dans le fichier operations.class.php :
// Créez une classe abstraite nommée 'Operations'.

// A l'intérieur de cette classe, faites la déclaration de la propriété protégée 'resultat' sans valeur.

// Déclarez une constante 'VALEURDEFAUT' avec la valeur 0 de type nombre entier.

// Déclarez ensuite une méthode abstraite 'setResultat' qui prend en paramètre les variables 'valeur1' et 'valeur2'.

// Enfin, déclarez une méthode publique 'getResultat' qui retourne la valeur de la propriété 'resultat'.
// - Dans le fichier addition.class.php :
// Créez une classe nommée 'Addition' qui étend la classe 'Operations'.

// A l'intérieur de cette classe, implémentez la méthode 'setResultat' dans laquelle :
// • Affichez le message « Opération : [x] + [y] <br> » avec 'x' équivalent à la valeur de la variable 'valeur1' et 'y' à la valeur de la variable 'valeur2',
// • Stockez dans la propriété 'resultat' le résultat de l'opération 'valeur1' + 'valeur2'.
// - Dans le fichier division.class.php :
// Créez une classe nommée 'Division' qui étend la classe 'Operations'.

// A l'intérieur de cette classe, implémentez la méthode 'setResultat' dans laquelle :
// • Affichez le message « Opération : [x] / [y] <br> » avec 'x' équivalent à la valeur de la variable 'valeur1' et 'y' à la valeur de la variable 'valeur2',
// • Créez une condition afin de vérifier si 'valeur2' est différent de 0 :
// • si c'est le cas, stockez dans la propriété 'resultat' le résultat de l'opération 'valeur1' / 'valeur2'.
// • sinon, affichez le message « Division par zéro impossible <br> » et stockez dans la propriété 'resultat' la valeur de la constante 'VALEURDEFAUT'.
// - Dans le fichier index.php :
// Inclure les fichiers operations.class.php, addition.class.php et division.class.php.

// Faites la déclaration des variables suivantes :
// • 'add' qui contiendra une nouvelle instance de la classe 'Addition',
// • 'div' qui contiendra une nouvelle instance de la classe 'Division'.

// Utilisez la méthode 'setResultat' sur l'objet 'add' avec comme arguments les valeur 9 et 7.

// Affichez le message « Résultat : [x] <br> » avec 'x' équivalent à la valeur renvoyé par la méthode 'getResultat' appelé sur l'objet 'add'.

// Utilisez la méthode 'setResultat' sur l'objet 'div' avec comme arguments les valeur 9 et 3.

// Affichez le message « Résultat : [x] <br> » avec 'x' équivalent à la valeur renvoyé par la méthode 'getResultat' appelé sur l'objet 'div'.

// Recommencez l'opération sur l'objet 'div' avec comme arguments les valeur 9 et 0.

require_once 'exo294_operations.class.php';
require_once 'exo294_addition.class.php';
require_once 'exo294_division.class.php';

$add = new Addition;
$div = new Division;

$add->setResultat(9, 7);
echo 'Résultat : ' . $add->getResultat() . '<br>';

$div->setResultat(9, 3);
echo 'Résultat : ' . $div->getResultat() . '<br>';

$div->setResultat(9, 0);
echo 'Résultat : ' . $div->getResultat() . '<br>';