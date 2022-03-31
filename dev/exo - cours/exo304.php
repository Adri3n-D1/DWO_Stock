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

// • Démarrez une transaction,
// • Déclarez une variable 'sql' contenant la requête SQL permettant de créer une nouvelle table nommée « Roles » possédant les colonnes suivantes :
// • 'Id' de type nombre entier positif qui s’auto-incrémente et définis comme clé primaire,
// • 'Type' de type chaîne de caractères de longueur maximum 40 et n'acceptant pas de valeur null.
// • Exécutez la requête et affichez le message « Table Roles bien créée !<br> ».

// • Déclarez une variable 'sql2' contenant la requête SQL permettant de créer une nouvelle table nommée « Nombres » possédant les colonnes suivantes :
// • 'Id' de type nombre entier positif qui s’auto-incrémente et définis comme clé primaire,
// • 'Valeur' de type chaîne de caractères de longueur maximum 40 et n'acceptant pas de valeur null.
// • Exécutez la requête et affichez le message « Table Nombres bien créée !<br> ».

// • Déclarez une variable 'sql3' contenant la requête SQL permettant d'insérer une nouvelle entrée dans la table 'Utilisateurs' avec les valeurs suivantes :
// • Pour la colonne 'Nom' la valeur « Pierre »,
// • Pour la colonne 'Mail' la valeur « admin@blog.com »,
// • Pour la colonne 'Password' la valeur « admin123 »,
// • Pour la colonne 'AnneeNaissance' la valeur 1992 de type nombre.
// • Exécutez la requête et affichez le message « Entrée ajoutée dans la table Utilisateurs !<br> ».

// • Déclarez une variable 'sql4' contenant la requête SQL permettant d'insérer une nouvelle entrée dans la table 'Utilisateurs' avec les valeurs suivantes :
// • Pour la colonne 'Nom' la valeur « Jean »,
// • Pour la colonne 'Mail' la valeur « author@blog.com »,
// • Pour la colonne 'Password' la valeur « author123 »,
// • Pour la colonne 'AnneeNaissance' la valeur 1968 de type nombre.
// • Exécutez la requête et affichez le message « Entrée ajoutée dans la table Utilisateurs !<br> ».

// • Déclarez une variable 'sql5' contenant la requête SQL permettant d'insérer une nouvelle entrée dans la table 'Utilisateurs' avec les valeurs suivantes :
// • Pour la colonne 'Nom' la valeur « Jean-Pierre »,
// • Pour la colonne 'Mail' la valeur « otherauthor@blog.fr »,
// • Pour la colonne 'Password' la valeur « author456 »,
// • Pour la colonne 'AnneeNaissance' la valeur 1989 de type nombre.
// • Exécutez la requête et affichez le message « Entrée ajoutée dans la table Utilisateurs !<br> ».

// • Déclarez une variable 'sql6' contenant la requête SQL permettant d'insérer une nouvelle entrée dans la table 'Roles' avec la valeur suivante :
// • Pour la colonne 'Type' la valeur « Administrateur ».
// • Exécutez la requête et affichez le message « Entrée ajoutée dans la table Roles !<br> ».

// • Déclarez une variable 'sql7' contenant la requête SQL permettant d'insérer une nouvelle entrée dans la table 'Roles' avec la valeur suivante :
// • Pour la colonne 'Type' la valeur « Auteur ».
// • Exécutez la requête et affichez le message « Entrée ajoutée dans la table Roles !<br> ».
// • Validez la transaction,
// • Fermez la connexion à la base de données.

// Ajoutez ensuite un bloc pour attraper l’exception PDO dans lequel vous exécuterez la méthode 'rollBack' puis afficherez « Message d'erreur : [erreur]<br> ».

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

    // request 1
    $sql = $codb->prepare(
        'CREATE TABLE Roles(
        Id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        Type VARCHAR(40) NOT NULL)'
    );
    $sql->execute();
    echo 'Table Roles bien créée !<br>';
    
    // request 2
    $sql2 = $codb->prepare(
        'CREATE TABLE Nombres(
        Id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        Valeur VARCHAR(40) NOT NULL)'
    );
    $sql2->execute();
    echo 'Table Nombres bien créée !<br>';

    // request 3
    $sql3 = $codb->prepare(
        'INSERT INTO Utilisateurs VALUES (:Id, :Nom, :Mail, :Password, :AnneeNaissance, :DateInscription)'
    );
    $dataSql3 = [
        'Id' => 0,
        'Nom' => 'Pierre',
        'Mail' => 'admicn@blog.com',
        'Password' => 'admin123',
        'AnneeNaissance' => 1992,
        'DateInscription' => null,
    ];
    $sql3->execute($dataSql3);
    echo 'Entrée ajoutée dans la table Utilisateurs !<br>';

    // request 4
    $sql4 = $codb->prepare(
        'INSERT INTO Utilisateurs VALUES (:Id, :Nom, :Mail, :Password, :AnneeNaissance, :DateInscription)'
    );
    $dataSql4 = [
        'Id' => 0,
        'Nom' => 'Jean',
        'Mail' => 'author@blog.com',
        'Password' => 'author123',
        'AnneeNaissance' => 1968,
        'DateInscription' => null,
    ];
    $sql4->execute($dataSql4);
    echo 'Entrée ajoutée dans la table Utilisateurs !<br>';

    // request 5
    $sql5 = $codb->prepare(
        'INSERT INTO Utilisateurs VALUES (:Id, :Nom, :Mail, :Password, :AnneeNaissance, :DateInscription)'
    );
    $dataSql5 = [
        'Id' => 0,
        'Nom' => 'Jean-Pierre',
        'Mail' => 'otherauthor@blog.fr',
        'Password' => 'author456',
        'AnneeNaissance' => 1989,
        'DateInscription' => null,
    ];
    $sql5->execute($dataSql5);
    echo 'Entrée ajoutée dans la table Utilisateurs !<br>';
    
    // request 6
    $sql6 = $codb->prepare(
        'INSERT INTO Roles VALUES (:Id, :Type)'
    );
    $dataSql6 = [
        'Id' => 0,
        'Type' => 'Administrateur',
    ];
    $sql6->execute($dataSql6);
    echo 'Entrée ajoutée dans la table Roles !<br>';

    // request 7
    $sql7 = $codb->prepare(
        'INSERT INTO Roles VALUES (:Id, :Type)'
    );
    $dataSql7 = [
        'Id' => 0,
        'Type' => 'Auteur',
    ];
    $sql7->execute($dataSql7);
    echo 'Entrée ajoutée dans la table Roles !<br>';
    
    $codb = null;
}
catch (PDOException $e) {
    echo 'Message d\'erreur : ' . $e->getMessage() . '<br>';
}