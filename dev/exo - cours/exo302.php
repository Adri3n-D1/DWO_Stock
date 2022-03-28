<?php
// Faites la déclaration des variables suivantes :
// • 'servername' avec la valeur « localhost »,
// • 'username' avec la valeur « root »,
// • 'password' avec comme valeur une chaine de caractère vide ou « root » (en fonctions des réglages).

// Créez un bloc try dans lequel :
// • Stockez dans une variable 'connexion' une nouvelle instance de la classe 'PDO' avec comme arguments la source de la base de données (serveur) ainsi que les variables 'username' et 'password',
// • Configurez l'attribut PDO qui sert à créer un rapport d’erreur pour qu’il emette une exception,
// • Affichez le message « Connexion réussie<br> »,
// • Fermez la connexion à la base de données.

// Ajoutez ensuite un bloc pour attraper l’exception PDO dans lequel vous afficherez « Message d'erreur : [erreur]<br> ».

$servername = 'localhost';
$dbname = 'test';
$username = 'root';
$password = '';

try {
    $connexion = new PDO('mysql:host=' . $servername . ';dbname=' . $dbname . ';charset=utf8',
    $username, $password,
    [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
    echo 'Connexion réussie<br>';
    $connexion = null;
}
catch (PDOException $e) {
    die('Message d\'erreur :' . $e->getMessage());
}
