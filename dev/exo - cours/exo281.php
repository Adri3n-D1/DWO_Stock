<?php
// Faites la déclaration des variables suivantes :
// • 'date1' avec la valeur « 21-07-1969 » de type chaîne de caractères ,
// • 'date2' avec la valeur « 15-Aug 1969 » de type chaîne de caractères,
// • 'str1' avec la valeur « premier pas sur la Lune » de type chaîne de caractères ,
// • 'str2' avec la valeur « Festival de Woodstock » de type chaîne de caractères.

// Déclarez ensuite une variable 'tmstp1' dans laquelle vous utiliserez la fonction qui transforme une chaîne de caractères de format date en Timestamp afin d'obtenir le Timestamp de 'date1'.

// Déclarez ensuite une variable 'tmstp2' dans laquelle vous utiliserez la fonction qui transforme une chaîne de caractères de format date en Timestamp afin d'obtenir le Timestamp de 'date2'.

// Utilisez la fonction 'setlocale' pour définir les informations de localisation pour le format de date et d’heure en Français.

// Déclarez ensuite une variable 'dateFr1' dans laquelle vous utiliserez la fonction 'strftime' afin d'obtenir la date correspondant au Timestamp de 'tmstp1' au format « [Nom du jour] [Jour] [Mois] [Année] ».

// Déclarez ensuite une dernière variable 'dateFr2' dans laquelle vous utiliserez la fonction 'strftime' afin d'obtenir la date correspondant au Timestamp de 'tmstp2' au format « [Nom du jour] [Jour] [Mois] [Année] ».

// Créez une condition afin de verifier si 'tmstp1' est inférieur à 'tmstp2', si c'est le cas alors affichez « Le premier pas sur la Lune ([dateFr1]) est avant le Festival de Woodstock ([dateFr2]) », sinon, affichez « Le Festival de Woodstock ([dateFr2]) est avant le premier pas sur la Lune ([dateFr1]) ».

$date1 = '21-07-1969';
$date2 = '15-Aug 1969';
$str1 = 'premier pas sur la Lune';
$str2 = 'Festival de Woodstock';

$tmstp1 = strtotime($date1);
$tmstp2 = strtotime($date2);

setlocale(LC_TIME, ['fr', 'fra', 'fr_FR', 'fr_FR.utf8']);


$dateFr1 = strftime('%A %d %B %Y', $tmstp1);
$dateFr2 = strftime('%A %d %B %Y', $tmstp2);

if ($date1 < $date2) {
    echo 'Le premier pas sur la Lune (' . $dateFr1 . ') est avant le Festival de Woodstock (' . $dateFr2 . ')';
}
else {
    echo 'Le Festival de Woodstock (' . $dateFr2 . ') est avant le premier pas sur la Lune (' . $dateFr1 . ')';
}