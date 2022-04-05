<?php
// Faites la déclaration des variables suivantes :
// • 'x' avec la valeur 2 de type nombre entier,
// • 'y' avec la valeur 5 de type nombre entier,
// • 'z' avec la valeur 0 de type nombre entier,
// • 'ignorer' avec la valeur vrai de type booléen.

// Créez une première condition afin de vérifier si la valeur de 'z' est inférieur ou égale à 'x' ET si 'y' est supérieur à 'x', si c'est le cas alors ajoutez 2 à 'z'.

// Créez une seconde condition afin de vérifier si la valeur et le type de 'ignorer' est à false OU si 'x' est égal en valeur à 'z', alors multipliez 'z' par 5.

$x = 2;
$y = 5;
$z = 0;
$ignorer = true;

if ($z <= $x && $y > $x) {
    $z += 2;
}

if ($ignorer === false || $x == $z) {
    $z *= 5;
}