<?php
// Utilisez la fonction 'date_default_timezone_set' pour définir le fuseau horaire correspondant à votre localisation.

// Faites la déclaration des variables suivantes :
// • 'midi' avec la valeur 12 de type nombre entier.

// Déclarez ensuite une variable 'heureActuelle' dans laquelle vous utiliserez la fonction 'Date' afin d'obtenir l'heure actuelle au format « [heure au format 24h avec le zéro initial]:[minute]:[seconde] ».

// Déclarez ensuite une dernière variable 'heure' dans laquelle vous utiliserez la fonction 'Date' afin d'obtenir « [heure au format 24h sans le zéro initial] ».

// Créez une condition afin de verifier si 'heure' est supérieur ou égal à 'midi', si c'est le cas alors affichez « Il est [heureActuelle], nous sommes l'après-midi », sinon, affichez « Il est [heureActuelle], nous sommes le matin ».

date_default_timezone_set('Europe/Paris');

$midi = 12;
$heureActuelle = Date('H:i:s');
$heure = date('G');

if ($heureActuelle >= $midi) {
    echo 'Il est ' . $heureActuelle . ', nous sommes l\'après-midi';
}
else {
    echo 'Il est ' . $heureActuelle . ', nous sommes le matin';
}