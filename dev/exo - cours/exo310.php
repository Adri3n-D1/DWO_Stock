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
    echo 'Sélection du nombre de mail(s) quand le mail ne contient pas « author » ou si le role est Administrateur ou Abonné<br>';
    $sql = $codb->prepare(
        'SELECT COUNT(mail) FROM Utilisateurs WHERE mail NOT LIKE "%author%" OR role IN (1,3)'
    );
    $sql->execute();
    $resultat = $sql->fetchAll();
    echo '<pre>';
    print_r($resultat);
    echo '</pre>';

    echo 'Sélection de la moyenne des années de naissance quand le role est Auteur<br>';
    $sql = $codb->prepare(
        'SELECT ROUND(anneenaissance) FROM Utilisateurs WHERE role = 2'
    );
    $sql->execute();
    $resultat = $sql->fetchAll();
    echo '<pre>';
    print_r($resultat);
    echo '</pre>';

    echo 'Sélection du nombre total d\'articles des utilisateurs<br>';
    $sql = $codb->prepare(
        'SELECT SUM(nbarticles) FROM Utilisateurs '
    );
    $sql->execute();
    $resultat = $sql->fetchAll();
    echo '<pre>';
    print_r($resultat);
    echo '</pre>';

    echo 'Sélection des roles et du nombre d\'utilisateur pour chaque role ordonnés par nombre décroissant<br>';
    $sql = $codb->prepare(
        'SELECT COUNT(role), role FROM Utilisateurs
         GROUP BY role HAVING role IN (2,3)
         ORDER BY COUNT(role) DESC'
    );
    $sql->execute();
    $resultat = $sql->fetchAll();
    echo '<pre>';
    print_r($resultat);
    echo '</pre>';

    echo 'Sélection des roles et du nombre d\'utilisateur pour chaque role ordonnés par nombre décroissant pour les roles Auteur et Abonné<br>';
    $sql = $codb->prepare(
        'SELECT COUNT(role), role FROM Utilisateurs
         GROUP BY role HAVING role IN (2,3)
         ORDER BY COUNT(role) DESC'
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


