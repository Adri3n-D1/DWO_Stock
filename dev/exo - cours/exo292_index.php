<?php
// Créez les fichiers PHP suivant : index.php, conducteur.class.php et jeuneconducteur.class.php.
// - Dans le fichier conducteur.class.php :
// Créez une classe nommée 'Conducteur'.

// A l'intérieur de cette classe, faites la déclaration de la propriété protégée 'nom' sans valeur.

// Déclarez une constante 'LIMITE' avec la valeur 0.5.

// Déclarez la méthode constructeur qui prend en paramètre la variable 'newNom' et la stocke dans la propriété 'nom'.

// Enfin, déclarez une méthode publique 'getInfos' qui affiche le message « Pour [nom], la limite fixée est de [LIMITE] grammes d’alcool par litre de sang <br> »
// - Dans le fichier jeuneconducteur.class.php :
// Créez une classe nommée 'JeuneConducteur' qui étend la classe 'Conducteur'.

// Surchargez la constante 'LIMITE' avec la valeur 0.2.

// Déclarez une constante 'PERIODE' avec la valeur 3.

// Déclarez une nouvelle propriété protégée 'anciennete' sans valeur.

// Surcharger la méthode constructeur qui prend en paramètres les variables 'newNom' et 'newAnciennete' dans laquelle vous :
// • Appellerez la méthode constructeur parente (à l'aide de l’opérateur de résolution de portée) et vous lui passerez en paramètre la variable 'newNom',
// • Stockez la valeur de 'newAnciennete' dans la propriété 'anciennete'.

// Créez ensuite une méthode 'setAnciennetePlus' qui incrémente la valeur de la propriété 'anciennete' et affiche le message « [nom] a désormais [anciennete] an(s) de permis <br>. »

// Enfin, surchargez la méthode 'getInfos', créez une condition afin de vérifier si la propriété 'anciennete' est supérieure ou égale à la constante 'PERIODE' :
// • si c'est le cas, affichez le message « Pour [nom], la limite fixée est de [x] grammes d’alcool par litre de sang <br> » avec 'x' équivalent à la valeur de la constante 'LIMITE' de la classe mère,
// • sinon, affichez le message « Pour [nom], la limite fixée est de [x] grammes d’alcool par litre de sang <br> » avec 'x' équivalent à la valeur de la constante 'LIMITE' de la classe.
// - Dans le fichier index.php :
// Inclure les fichiers conducteur.class.php et jeuneconducteur.class.php.

// Faites la déclaration des variables suivantes :
// • 'pierre' qui contiendra une nouvelle instance de la classe 'Conducteur' avec l'argument suivant 'Pierre' ;
// • 'jean' qui contiendra une nouvelle instance de la classe 'JeuneConducteur' avec les arguments suivants 'Jean' et 2.

// Appelez la méthode 'getInfos' sur l'objet 'pierre'.

// Appelez la méthode 'getInfos' sur l'objet 'jean'.

// Appelez ensuite la méthode 'setAnciennetePlus' sur l'objet 'jean'.

// Pour finir, appelez à nouveau la méthode 'getInfos' sur l'objet 'jean'.
require_once 'exo292_conducteur.class.php';
require_once 'exo292_jeuneconducteur.class.php';

$pierre = new Conducteur('Pierre');
$jean = new JeuneConducteur('Jean', 2);

$pierre->getInfos();

$jean->getInfos();
$jean->setAnciennetePlus();
$jean->getInfos();