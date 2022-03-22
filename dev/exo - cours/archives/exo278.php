<?php
// Faites la déclaration des variables suivantes :
// • la variable tableau 'notes' avec les valeurs de type nombre entier 12, 15, 16, 9, 18 et 14.
// • 'moyenne' avec la valeur 0 de type nombre entier,

// Créez une boucle for pour parcourir le tableau 'notes' dans laquelle vous ajoutez la valeur du tableau 'notes' associée à l’indice courant à 'moyenne'.

// Vous utiliserez ensuite les opérateurs arithmétiques afin d'obtenir la moyenne des valeurs du tableau 'notes'.

$notes = [12, 15, 16, 9, 18, 14];
$moyenne = 0;

foreach($notes as $note) {
    $moyenne += $note;
}

$moyenne /= count($notes);

echo 'La moyenne des note est : ' . $moyenne;