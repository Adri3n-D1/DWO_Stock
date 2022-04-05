<?php
// Faites la déclaration des variables suivantes :
// • 'x' avec la valeur 0 de type nombre,
// • 'z' avec la valeur 50 de type nombre,
// • 'boucle1' avec la valeur 0 de type nombre,
// • 'boucle2' avec la valeur 0 de type nombre,
// • 'boucle3' avec la valeur 0 de type nombre.

// Créez une boucle for où vous déclarerez la variable 'y' à 0 jusqu'à ce que 'y' soit inférieur à 20 dans laquelle :
// • vous ajouter 'y' à 'boucle1' si 'y' est inférieur à 10,
// • vous ajouter 1 à 'boucle1' si 'y' est supérieur ou égal à 10.

// Créez une boucle while jusqu'à ce que 'x' soit inférieur ou égal à 20 dans laquelle :
// • vous incrémentez 'boucle2' si 'x' est égale à 0, sinon, vous multipliez 'boucle2' par 2,
// • vous incrémentez 'x'.

// Créez une boucle do… while dans laquelle :
// • si 'boucle3' est inférieur à 10, vous ajoutez 2 à 'boucle3' sinon vous ajoutez 3 à 'boucle3',
// • vous décrémentez 'z' tant que 'z' est supérieur à 0.

$x = 0;
$z = 50;
$boucle1 = 0;
$boucle2 = 0;
$boucle3 = 0;

for ($i = 0; $i < 20; $i++) {
    if ($i < 10) {
        $boucle1 += $i;
    }
    else {
        $boucle1++;
    }
}
while ($x <= 20) {
    if ($x == 0) {
        $boucle2++;
    }
    else {
        $boucle2 *= 2;
    }
    $x++;
}
do {
    if ($boucle3 < 10) {
        $boucle3 += 2;
    }
    else {
        $boucle3 += 3;
    }
    $z--;
} while ($z > 0);