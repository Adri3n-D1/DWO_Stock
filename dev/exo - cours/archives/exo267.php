<?php
// Faites la déclaration des variables suivantes :
// • 'x' avec la valeur 7 de type nombre,
// • 'yStr' avec la valeur 7 de type chaîne de caractères.

// En vous aidant des opérateurs de comparaison, stockez les comparaisons dans les variables suivantes :
// • 'comparaison1' vérifie si 'x' est inférieur à 'yStr',
// • 'comparaison2' vérifie si 'x' est égal en valeur à 'yStr',
// • 'comparaison3' vérifie si 'x' est supérieur ou égal à 'yStr',
// • 'comparaison4' vérifie si 'x' est différent en type et en valeur à 'yStr'.

$x = 7;
$yStr = "7";

$comparaison1 = $x < $yStr;
$comparaison2 = $x == $yStr;
$comparaison3 = $x >= $yStr;
$comparaison4 = $x !== $yStr;

echo $comparaison1 ? 'true' . '<br>' : 'false' . '<br>';
echo $comparaison2 ? 'true' . '<br>' : 'false' . '<br>';
echo $comparaison3 ? 'true' . '<br>' : 'false'. '<br>';
echo $comparaison4 ? 'true' . '<br>' : 'false'. '<br>';