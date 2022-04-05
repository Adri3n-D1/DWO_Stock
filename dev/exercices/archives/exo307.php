<?php
// Faites la déclaration des variables suivantes :
// • 'servername' avec la valeur « localhost » de type chaîne de caractères,
// • 'username' avec la valeur « root » de type chaîne de caractères,
// • 'password' avec comme valeur une chaine de caractère vide ou « root » de type chaîne de caractères (en fonctions des réglages),
// • 'dbname' avec la valeur « blog » de type chaîne de caractères.

// Créez un bloc try dans lequel :
// • Stockez dans une variable 'codb' une nouvelle instance de la classe PDO avec comme arguments la source de la base de données (serveur + nom de la base de données) ainsi que les variables 'username' et 'password',
// • Configurez l'attribut PDO qui sert à créer un rapport d’erreur pour qu’il émette une exception,
// • Affichez le message « Connexion réussie<br> »,
// • Affichez le message « Suppression de donnée(s) dans la table Utilisateurs<br> ».

// • Déclarez une variable 'sql' contenant la requête permettant de supprimer les entrées de la table 'Utilisateurs' QUAND la colonne 'id' est égale à 2,
// • Préparez la requête SQL dans une variable 'prepare'.
// • Exécutez la requête,
// • Stockez dans une variable 'count' le nombre d’entrées affectées par la requête,
// • Affichez le message « [count] entrée(s) supprimée(s) dans la table<br> ».

// • Déclarez une variable 'sql2' contenant la requête permettant de supprimer la table 'Nombres',
// • Exécutez la requête,
// • Affichez le message « La table Nombres a été supprimée !<br> ».
// • Fermez la connexion à la base de données.

// Ajoutez ensuite un bloc pour attraper l’exception PDO dans lequel vous afficherez « Message d'erreur : [erreur]<br> ».


$servername = 'localhost';
$username = 'root';
$password = '';
$dbname = 'blog';

try {
    $codb = new PDO(
        'mysql:host=' . $servername . ';dbname=' . $dbname . ';charset=utf8',
        $username, $password,
        [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
    );
    echo 'Connexion réussie<br>'; 
    echo 'Suppression de donnée(s) dans la table Utilisateurs<br>';
    $sql = $codb->prepare(
        'DELETE FROM Utilisateurs WHERE id=1'
    );
    $sql->execute();
    $count = $sql->rowCount();
    echo $count . 'entrée(s) supprimée(s) dans la table<br>';

    $sql2 = $codb->prepare(
        'DROP TABLE Nombres'
    );
    $sql->execute();
    echo 'La table Nombres a été supprimée !<br>';

    $codb = null;
}
catch(PDOException $e) {
    echo "Message d'erreur : " .$e->getMessage(). "<br>";
}
