<?php
// Faites la déclaration des variables suivantes :
// • 'prenom1' avec la valeur « Jean » de type chaîne de caractères,
// • 'prenom2' avec la valeur « Paul » de type chaîne de caractères,
// • 'taille1' avec la valeur 192 de type nombre entier,
// • 'taille2' avec la valeur 175 de type nombre entier.

// Déclarez ensuite une variable 'difference' dans laquelle vous utiliserez les opérateurs arithmétiques afin d'obtenir la différence entre 'taille1' et 'taille2'.

// Déclarez ensuite une dernière variable 'resultat' dans laquelle vous utiliserez les opérateurs de chaines et la concaténation ainsi que les variables précédemment déclarées afin d'obtenir : « Jean mesure 17 cm de plus que Paul »

$prenom1 = 'Jean';
$prenom2 = 'Paul';
$taille1 = 192;
$taille2 = 175;
$difference = $taille1 - $taille2;
$resultat = $prenom1 . ' mesure ' . $difference . ' cm de plus que ' . $prenom2;
echo $resultat;