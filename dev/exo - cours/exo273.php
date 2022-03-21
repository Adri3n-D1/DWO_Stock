<?php
// Déclaration des variables :
// • Déclarez une variable 'firstName' et affectez lui comme valeur votre prénom ;
// • Déclarez une variable 'lastName' et affectez lui comme valeur votre nom de famille ;
// • Déclarez une variable 'myAge' et affectez lui comme valeur votre âge ;

// Création de la fonction :
// • Créez une fonction que vous appellerez 'introduceMyself' et qui prend comme premier paramètre 'fN', comme second paramètre 'lN' et comme troisième 'mA' ;
// • Définissez une instruction dans votre fonction qui affiche la phrase « Bonjour, je m'appelle [prénom] [nom] et j'ai [âge] ans.<br> » ;

// Exécution de la fonction :
// • Appelez la fonction en lui passant vos trois variables en argument ;
// • Appelez une seconde fois la fonction en lui passant trois chaînes de caractères contenant des informations sur le prénom, le nom et l'âge en argument.

$firstName = 'Adrien';
$lastName = 'Delcros';
$myAge = '33';

function introduceMyself($fN, $lN, $mA) {
    echo 'Bonjour, je m\'appelle ' . $fN . ' ' . $lN . ' et j\'ai ' . $mA . ' ans.<br>';
}

introduceMyself($firstName, $lastName, $myAge);
introduceMyself('Adrien', 'Delcros', '33');