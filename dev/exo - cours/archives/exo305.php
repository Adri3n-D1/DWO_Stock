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
// • Affichez le message « Ajout de donnée(s) dans la table Utilisateurs<br> ».

// • Déclarez une variable 'sql' contenant la requête préparées permettant d'insérer une nouvelle entrée dans la table 'Utilisateurs' avec les marqueurs nommés suivants :
// • Pour la colonne 'Nom' le marqueur « :nom »,
// • Pour la colonne 'Mail' le marqueur « :mail »,
// • Pour la colonne 'Password' le marqueur « :password »,
// • Pour la colonne 'AnneeNaissance' le marqueur « :annee ».
// • Préparez la requête SQL dans une variable 'prepare'.

// • Déclarez une variable 'parametres' contenant un tableau avec les clés « :nom », « :mail », « :password », « :annee » et les valeurs « Jeanne », « abonne@gmail.com », « abo123 », 1992.
// • Exécutez la requête avec en argument le tableau 'parametres',
// • Affichez le message « Entrée ajoutée dans la table Utilisateurs !<br> ».

// • Redéclarez la variable 'parametres' contenant cette fois un tableau avec les clés « :nom », « :mail », « :password », « :annee » et les valeurs « Charlotte », « superauthor@gmail.com », « author789 », 2001.
// • Exécutez la requête avec en argument le tableau 'parametres',
// • Affichez le message « Entrée ajoutée dans la table Utilisateurs !<br> ».

// • Redéclarez la variable 'parametres' contenant cette fois un tableau avec les clés « :nom », « :mail », « :password », « :annee » et les valeurs « Justine », « newauthor@blog.fr », « authorazerty », 2004.
// • Exécutez la requête avec en argument le tableau 'parametres',
// • Affichez le message « Entrée ajoutée dans la table Utilisateurs !<br> ».

// • Affichez le message « Ajout de donnée(s) dans la table Roles<br> ».
// • Déclarez une variable 'sql' contenant la requête préparées permettant d'insérer une nouvelle entrée dans la table 'Roles' avec le marqueur nommé suivant :
// • Pour la colonne 'Type' le marqueur « :type ».
// • Redéclarez la variable 'parametres' contenant cette fois un tableau avec une clé « :type » et la valeurs 'Abonné'.
// • Préparez la requête SQL dans une variable 'prepare'.
// • Exécutez la requête avec en argument le tableau 'parametres',
// • Affichez le message « Entrée ajoutée dans la table Roles !<br> ».
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
    //
    echo 'Ajout de donnée(s) dans la table Utilisateurs<br>';
    $sql = $codb->prepare(
        'INSERT INTO Utilisateurs (:nom, :mail, :password, :annee)'
    );
    //
    $parametre = [
        ':nom' => 'Jeanne',
        ':mail' => 'abonne@gmail.com',
        ':password' => 'abo123',
        'annee' => 1992,
    ];
    $sql->execute($parametre);
    echo 'Entrée ajoutée dans la table Utilisateurs !<br>';
    //
    $parametre = [
        ':nom' => 'Charlotte',
        ':mail' => 'superauthor@gmail.com',
        ':password' => 'author789',
        'annee' => 2001,
    ];
    $sql->execute($parametre);
    echo 'Entrée ajoutée dans la table Utilisateurs !<br>';
    //
    $parametre = [
        ':nom' => 'Justine',
        ':mail' => 'newauthor@blog.fr',
        ':password' => 'authorazerty',
        'annee' => 2004,
    ];
    $sql->execute($parametre);
    echo 'Entrée ajoutée dans la table Utilisateurs !<br>';
    //
    echo 'Ajout de donnée(s) dans la table Roles<br>';
    $sql = $codb->prepare(
        'INSERT INTO Roles (:Type)'
    );
    $parametre = [
        ':Type' => 'Abonné',
    ];
    $sql->execute($parametre);
    echo 'Entrée ajoutée dans la table Roles !<br>';

    $codb = null;
}
catch (PDOException $e) {
    
}