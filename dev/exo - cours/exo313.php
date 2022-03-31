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


    echo 'Sélection des noms et mails utilisateurs quand au moins un article est associée à l\'utilisateur<br>';
    $sql = $codb->prepare(
        'SELECT nom, mail FROM utilisateurs
         WHERE EXISTS (SELECT * FROM articles WHERE articles.id_redacteur = utilisateurs.id)'
    );
    $sql->execute();
    $resultat = $sql->fetchAll();
    echo '<pre>';
    print_r($resultat);
    echo '</pre>';

    echo 'Sélection des articles quand le redacteur est né apres 2000<br>';
    $sql = $codb->prepare(
        'SELECT * FROM articles
         WHERE id_redacteur = ANY (SELECT id FROM utilisateurs WHERE anneenaissance > 2000)'
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