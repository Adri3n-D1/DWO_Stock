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

    echo 'Sélection des noms et mails utilisateurs combinées à la sélection des titres et contenus des articles<br>';
    $sql = $codb->prepare(
        'SELECT nom, mail FROM utilisateurs
         UNION SELECT titre, contenus FROM articles'
    );
    $sql->execute();
    $resultat = $sql->fetchAll();
    echo '<pre>';
    print_r($resultat);
    echo '</pre>';

    echo 'Sélection de tous les noms et mails utilisateurs et de tous les titres et contenus des articles<br>';
    $sql = $codb->prepare(
        'SELECT utilisateurs.nom, utilisateurs.mail, articles.titre, articles.contenus FROM utilisateurs
         LEFT JOIN articles ON utilisateurs.id = articles.id_redacteur
         UNION ALL
         SELECT utilisateurs.nom, utilisateurs.mail, articles.titre, articles.contenus FROM utilisateurs
         RIGHT JOIN articles ON utilisateurs.id = articles.id_redacteur
         WHERE utilisateurs.id IS NULL'
    );
    $sql->execute();
    $resultat = $sql->fetchAll();
    echo '<pre>';
    print_r($resultat);
    echo '</pre>';



}
catch(PDOException $e) {
    echo "Message d'erreur : " .$e->getMessage(). "<br>";
}
