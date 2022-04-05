<?php
// Faites la déclaration des variables suivantes :
// • 'chaine' avec la valeur « HELLOp73hp489-c3@8'AeSTst48A-lAZ8Be7-BEmeé451AilLlL@HeurE00; » de type chaîne de caractères,
// • 'masque1' avec l'expression régulière pour indiquer qu’on recherche tous les caractères qui ne sont pas des chiffres,
// • 'masque2' avec l'expression régulière pour indiquer qu’on recherche tous les caractères qui ne sont pas des lettres majuscules ni des arobase « @ ».

// Recherchez tous les résultats de la présence du masque 'masque1' dans la variable 'chaine' et stockez les dans une variable nommée 'tb1'.

// Déclarez une nouvelle variable 'chaine2' avec pour valeur le résultat de la fonction 'implode' prenant comme arguments un séparateur vide « '' » et le premier élément du tableau 'tb1'.

// Recherchez ensuite tous les résultats de la présence du masque 'masque2' dans la variable 'chaine2' et stockez les dans une variable nommée 'tb2'.

// Affichez le message « La phrase finale est : » suivi du résultat de la fonction 'implode' prenant comme arguments un séparateur vide « '' » et le premier élément du tableau 'tb2'.


$chaine = 'HELLOp73hp489-c3@8\'AeSTst48A-lAZ8Be7-BEmeé451AilLlL@HeurE00';
$masque1 = '/[\D]/';
$masque2 = '/[^A-Z@]/';

preg_match_all($masque1, $chaine, $tb1);
$chaine2 = implode('', $tb1[0]);
preg_match_all($masque2, $chaine2, $tb2);

echo 'La phrase finale est : ' .implode('', $tb2[0]);