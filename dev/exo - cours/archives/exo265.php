<?php
// Faites la déclaration en PHP des variables suivantes :
// • 'taille' avec la valeur 170 de type nombre,
// • 'majeur' avec la valeur vrai de type booléen,
// • 'description' avec la valeur « Une feuille s'envole » de type chaîne de caractères,
// • 'outil' sans valeur et de type nul,
// • 'note' avec la valeur 15,5 de type décimal.

$taille = 170;
$majeur = true;
$description = 'Une feuille s\'envole';
$outils = null;
$note = 15.5;

echo '$taille est de type : ' . gettype($taille) . '<br>';
echo '$majeur est de type : ' . gettype($majeur) . '<br>';
echo '$description est de type : ' . gettype($description) . '<br>';
echo '$outils est de type : ' . gettype($outils) . '<br>';
echo '$note est de type : ' . gettype($note) . '<br>';