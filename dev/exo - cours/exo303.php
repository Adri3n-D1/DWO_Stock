<?php
// Faites la déclaration des variables suivantes :
// • 'servername' avec la valeur « localhost » de type chaîne de caractères,
// • 'username' avec la valeur « root » de type chaîne de caractères,
// • 'password' avec comme valeur une chaine de caractère vide ou « root » de type chaîne de caractères (en fonctions des réglages),
// • 'dbname' avec la valeur « blog » de type chaîne de caractères.

// Créez un bloc try dans lequel :
// • Stockez dans une variable 'codb' une nouvelle instance de la classe PDO avec comme arguments la source de la base de données (serveur) ainsi que les variables 'username' et 'password',
// • Configurez l'attribut PDO qui sert à créer un rapport d’erreur pour qu’il émette une exception,
// • Affichez le message « Connexion réussie<br> »,
// • Déclarez une variable 'sql' contenant la requête SQL permettant de créer une base de données nommée 'blog',
// • Exécutez la requête,
// • Affichez le message « Base de données « blog » créée !<br> »,
// • Fermez la connexion à la base de données. Ajoutez ensuite un bloc pour attraper l’exception PDO dans lequel vous afficherez « Message d'erreur : [erreur]<br> ».

// Créez un second bloc try dans lequel :
// • Stockez dans une variable 'codb' une nouvelle instance de la classe PDO avec comme arguments la source de la base de données (serveur + nom de la base de données) ainsi que les variables 'username' et 'password',
// • Configurez l'attribut PDO qui sert à créer un rapport d’erreur pour qu’il émette une exception,
// • Affichez le message « Connexion réussie<br> »,
// • Déclarez une variable 'sql' contenant la requête SQL permettant de créer une nouvelle table nommée « Utilisateurs » possédant les colonnes suivantes :
// • 'Id' de type nombre entier positif qui s’auto-incrémente et définis comme clé primaire,
// • 'Nom' de type chaîne de caractères de longueur maximum 40 et n'acceptant pas de valeur null,
// • 'Mail' de type chaîne de caractères de longueur maximum 50, n'acceptant pas de valeur null et chacune des valeurs dans la colonne doit être unique,
// • 'Password' de type chaîne de caractères de longueur maximum 30 et n'acceptant pas de valeur null,
// • 'AnneeNaissance' de type nombre entier positif et n'acceptant pas de valeur null,
// • 'DateInscription' qui stocke la date courante.
// • Exécutez la requête,
// • Affichez le message « Table Utilisateurs bien créée !<br> »,
// • Fermez la connexion à la base de données.
// Ajoutez ensuite un bloc pour attraper l’exception PDO dans lequel vous afficherez « Message d'erreur : [erreur]<br> ».

$servername = 'localhost';
$username = 'root';
$password = '';
$dbname = 'blog';

try {
    $codb = new PDO(
        'mysql:host=' . $servername,
        $username, $password,
        [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
    );    
    echo 'Connexion réussie<br>';

    $sql = $codb->prepare('CREATE DATABASE blog');
    $sql->execute();

    echo 'Base de données « blog » créée !<br>';
    $codb = null;
}
catch (PDOException $e) {
    echo 'Message d\'erreur : ' . $e->getMessage() . '<br>';
}

try {
    $codb = new PDO(
        'mysql:host=' . $servername . ';dbname=' . $dbname . ';charset=utf8',
        $username, $password,
        [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
    );
    
    echo 'Connexion réussie<br>';

    $sql = $codb->prepare(
        'CREATE TABLE Utilisateurs (
        Id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        Nom VARCHAR(40) NOT NULL,
        Mail VARCHAR(50) NOT NULL ,
        Password VARCHAR(30) NOT NULL,
        AnneeNaissance INT UNSIGNED NOT NULL,
        DateInscription TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
        UNIQUE(Mail))'
    );
    $sql->execute();
    echo 'Table Utilisateurs bien créée !<br>';
}
catch (PDOException $e) {
    echo 'Message d\'erreur : ' . $e->getMessage() . '<br>';
}