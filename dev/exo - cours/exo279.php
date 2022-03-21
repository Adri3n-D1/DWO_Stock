<?php
// Faites la déclaration des variables suivantes :
// • la variable tableau 'notes' avec les clefs 'maths', 'anglais' et 'informatique'
// • associez à chaque clefs les valeurs suivantes :
// • pour la clefs 'maths' un tableau avec les valeurs de type nombre entier 12, 15, 16, 9, 18 et 14,
// • pour la clefs 'anglais' un tableau avec les valeurs de type nombre entier 12, 14, 14 et 12,
// • pour la clefs 'informatique' un tableau avec les valeurs de type nombre entier 16, 18 et 17.

// Faites ensuite la déclaration de la variable 'moyenne' avec la valeur 0 de type nombre entier

// Créez ensuite une boucle foreach pour parcourir le tableau 'notes' où vous déclarerez la variable 'matiere' pour les clefs et la variable 'notesMatiere' pour les valeurs dans laquelle :
// • Vous créez une boucle for pour parcourir le tableau 'notesMatiere' courant dans laquelle vous ajoutez la valeur du tableau 'notesMatiere' associée à l’indice courant à 'moyenne'.
// • Vous utiliserez ensuite les opérateurs arithmétiques afin d'obtenir la moyenne des valeurs du tableau 'notesMatiere',
// • Affichez la phrase sur le modèle « La moyenne en [matiere] est [moyenne]/20 <br> » pour chaque clefs du tableau,
// • Passez la valeur de 'moyenne' à 0.

$notes = [
    'maths' => [12, 15, 16, 9, 18, 14],
    'anglais' => [12, 14, 14, 12],
    'informatique' => [16, 18, 17]
];

$moyenne = 0;
foreach($notes as $matiere => $notesMatiere) {
    foreach($notesMatiere as $noteMatiere) {
        $moyenne += $noteMatiere;
    }
    $moyenne /= count($notesMatiere);
    echo 'La moyenne en ' . $matiere . ' est ' . $moyenne . '/20<br>';
    $moyenne = 0;
}