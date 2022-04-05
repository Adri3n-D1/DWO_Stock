<?php
session_start();

$serverName = 'localhost';
$dbname = 'blog';
$username = 'root';
$password = '';

try {
    $db = new PDO (
        'mysql:host=' . $serverName . ';dbname=' . $dbname . ';charset=utf8',
        $username, $password,
        [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
    );
    $sql = 'SELECT nom, mail FROM Utilisateurs WHERE mail=:mail AND Password=:pass';
    $request = $db->prepare($sql);
    $parametre = [
        ':mail' => $_POST['form-email'],
        ':pass' => $_POST['form-password'],
    ];

    $request->execute($parametre);
    $resultat = $request->fetch();

    if (!empty($resultat)) {
        $_SESSION['utilisateur_co'] = $resultat['mail'];
        $_SESSION['utilisateur_nom'] = $resultat['nom'];

        header('Location: exo314_compte.php');
        die();
    }
    else {
        echo 'Aucun utilisateur ne correspond.<br>';
    }

    $db = null;    
}
catch (PDOException $e) {
    echo 'ERREUR : ' . $e->getMessage();
}