<?php
// Faites la déclaration des variables suivantes :
// • 'x' avec la valeur 2 de type nombre entier,
// • 'y' avec la valeur 5 de type nombre entier,
// • 'z' avec la valeur 0 de type nombre entier,
// • 'ignorer' avec la valeur vrai de type booléen.

// Créez une première condition afin de vérifier si la valeur et le type de 'ignorer' est à vrai, si c'est le cas alors ajoutez 2 à 'z'.

// Créez une seconde condition afin de vérifier si 'x' est supérieur ou égal à 'y', si c'est le cas alors multipliez 'z' par 2, sinon, divisez 'z' par 2.

// Créez une troisième condition afin de vérifier si 'x' est égal à 'y', si c'est le cas alors multipliez 'z' par 2, sinon, vérifiez si la valeur et le type de 'ignorer' est à vrai, dans ce cas multipliez 'z' par 3, sinon ajoutez 1 à 'z'.

$x = 2;
$y = 5;
$z = 0;
$ignorer = true;

if ($ignorer === true) {
    $z += 2;
}

$x >= $y ? $z *= 2 : $z /= 2;

if ($x == $y) {
    $z *= 2;
}
elseif ($ignorer === true) {
    $z *= 3;
}
else {
    $z += 1;
}