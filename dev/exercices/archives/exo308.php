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

// • Affichez le message « Sélection des mails utilisateurs<br> ».
// • Déclarez une variable 'sql' contenant la requête permettant de sélectionner la colonne 'mail' de la table 'Utilisateurs',
// • Préparez la requête SQL dans une variable 'prepare'.
// • Exécutez la requête,
// • Retournez toutes les lignes de résultats et stockez les dans une variable 'resultat',
// • Affichez le tableau 'resultat'.

// • Affichez le message « Sélection des roles ordonnés par ordre alphabétique<br> ».
// • Déclarez une variable 'sql' contenant la requête permettant de sélectionner toutes les colonnes de la table 'Roles' triées par 'type' croissant,
// • Préparez la requête SQL dans une variable 'prepare'.
// • Exécutez la requête,
// • Retournez toutes les lignes de résultats et stockez les dans une variable 'resultat',
// • Affichez le tableau 'resultat'.

// • Affichez le message « Sélection des années de naissance unique des utilisateurs<br> ».
// • Déclarez une variable 'sql' contenant la requête permettant de sélectionner les valeurs uniques de la colonne 'anneenaissance' de la table 'Utilisateurs',
// • Préparez la requête SQL dans une variable 'prepare'.
// • Exécutez la requête,
// • Retournez toutes les lignes de résultats et stockez les dans une variable 'resultat',
// • Affichez le tableau 'resultat'.
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

    echo 'Sélection des mails utilisateurs<br>';
    $sql = $codb->prepare('SELECT MAIL FROM Utilisateurs');
    $sql->execute();
    $resultats = $sql->fetchAll();
    print_r($resultats);

    echo 'Sélection des roles ordonnés par ordre alphabétique<br>';
    $sql = $codb->prepare('SELECT * FROM Roles ORDER BY Type ASC');
    $sql->execute();
    $resultats = $sql->fetchAll();
    print_r($resultats);

    echo 'Sélection des années de naissance unique des utilisateurs<br>';
    $sql = $codb->prepare('SELECT anneenaissance FROM Utilisateurs');
    $sql->execute();
    $resultats = $sql->fetchAll();
    print_r($resultats);
    
    $codb = null;
}
catch(PDOException $e) {
    echo "Message d'erreur : " .$e->getMessage(). "<br>";
}
