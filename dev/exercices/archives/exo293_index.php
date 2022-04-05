<?php
// Créez les fichiers PHP suivant : index.php et tirelire.class.php, dans un même dossier
// - Dans le fichier tirelire.class.php :
// Créez une classe nommée 'Tirelire'.

// A l'intérieur de cette classe, faites la déclaration des propriétés privées suivantes :
// • 'solde' sans valeur et qui est également une propriété statique,
// • 'utilisateur' sans valeur.

// Déclarez la méthode constructeur qui prend en paramètre la variable 'newUtilisateur' et la stocke dans la propriété 'utilisateur'.

// Déclarez ensuite une méthode publique 'getSolde' qui affiche le message « Il y a [x]€ dans la tirelire <br> » avec 'x' équivalent à la valeur de la propriété 'solde'.

// Déclarez une troisième méthode publique 'setSoldeAjouter' qui prend en paramètre la variable 'montant', ajoute sa valeur dans la propriété 'solde' et affiche le message « [x] a ajouté [y]€ dans la tirelire <br> » avec 'x' équivalent à la valeur de la propriété 'utilisateur' et 'y' à la valeur de la variable 'montant'.

// Enfin, déclarez une méthode publique 'setSoldeRetirer' qui prend en paramètre la variable 'montant', retire sa valeur à la propriété 'solde' et affiche le message « [x] a retiré [y]€ dans la tirelire <br> » avec 'x' équivalent à la valeur de la propriété 'utilisateur' et 'y' à la valeur de la variable 'montant'.
// - Dans le fichier index.php :
// Inclure le fichier tirelire.class.php.

// Faites la déclaration des variables suivantes :
// • 'pierre' qui contiendra une nouvelle instance de la classe 'Tirelire' avec comme argument la valeur « Pierre »,
// • 'marc' qui contiendra une nouvelle instance de la classe 'Tirelire' avec comme argument la valeur « Marc ».

// Utilisez les méthode suivante :
// • la méthode 'setSoldeAjouter' sur l'objet 'pierre' avec comme argument la valeur 20,
// • la méthode 'setSoldeAjouter' sur l'objet 'marc' avec comme argument la valeur 10,
// • la méthode 'setSoldeAjouter' sur l'objet 'pierre' avec comme argument la valeur 50,
// • la méthode 'getSolde' sur l'objet 'pierre',
// • la méthode 'setSoldeRetirer' sur l'objet 'marc' avec comme argument la valeur 30.

// Déclarez une nouvelle variable 'paul' qui contiendra une nouvelle instance de la classe 'Tirelire' avec comme argument la valeur « Paul ».

// Appelez la méthode 'getSolde' sur l'objet 'paul'.
require_once 'exo293_tirelire.class.php';

$pierre = new Tirelire('Pierre');
$marc = new Tirelire('Marc');

$pierre->setSoldeAjouter(20);
$marc->setSoldeAjouter(20);
$pierre->setSoldeAjouter(50);
$pierre->getSolde();
$marc->setSoldeRetirer(30);

$paul = new Tirelire('Paul');
$paul->getSolde();