<?php

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

    echo 'Sélection des années de naissance unique avant 2000<br>';
    $sql = $codb->prepare(
        'SELECT DISTINCT anneenaissance FROM utilisateurs
         WHERE anneenaissance < 2000'
    );
    $sql->execute();
    $resultat = $sql->fetchAll();
    print_r($resultat);

    echo '<br>Selection des noms des utilisateur ayant le role Auteur et dont le nom commence par « j »<br>';
    $sql = $codb->prepare(
        'SELECT mail FROM Utilisateurs
         WHERE role=2 AND nom LIKE "j%"'
    );
    $sql->execute();
    $resultat = $sql->fetchAll();
    print_r($resultat);

    echo '<br>Selection des noms et mails dans la table Utilisateurs quand le mail ne contient pas
    « author » ou si le role est Administrateur ou Abonné<br>';
    $sql = $codb->prepare(
        'SELECT nom, mail FROM Utilisateurs
         WHERE mail NOT LIKE "%author%"
         OR role LIKE "%Administrateur%"
         OR role LIKE "%Abonné%"'
    );
    $sql->execute();
    $resultat = $sql->fetchAll();
    print_r($resultat);

    echo '<br>Selection des donnée(s) dans la table Utilisateurs quand le password contient 7 caractères ou plus<br>';
    $sql = $codb->prepare(
        'SELECT * FROM Utilisateurs
         WHERE password LIKE "_______%" LIMIT 2'
    );
    $sql->execute();
    $resultat = $sql->fetchAll();
    print_r($resultat);
}
catch(PDOException $e) {
    echo "Message d'erreur : " .$e->getMessage(). "<br>";
}
