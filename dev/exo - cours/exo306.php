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

    $sql = $codb->prepare(
        'ALTER TABLE Utilisateurs ADD Role VARCHAR(50)'
    );
    $sql->execute();
    echo 'Colonne ajoutée dans la table Utilisateurs !<br>'; 

    $sql = $codb->prepare(
        'ALTER TABLE Utilisateurs ADD NbArticles INT'
    );
    $sql->execute();
    echo 'Colonne ajoutée dans la table Utilisateurs !<br>';
    
    $sql = $codb->prepare(
        'ALTER TABLE Utilisateurs ALTER COLUMN Role INT'
    );
    $sql->execute();
    echo 'Colonne modifiée dans la table Utilisateurs !<br>';

    echo 'Modification de donnée(s) dans la table Utilisateurs<br>';
    
    $sql = $codb->prepare(
        'UPDATE Utilisateurs SET role=:role, nbarticles=:nb'
    );
    
    $parametres = [
        ':role' => 2,
        ':nb' => 0,
    ];
    $sql->execute($parametres);
    $count = $sql->rowCount();
    echo $count . ' entrée(s) modifiée(s) dans la table<br>';
    
    $sql = $codb->prepare(
        'UPDATE role SET role=:role WHERE Id=:id'
    );
    $parametres = [
        ':role' => 1,
        ':id' => 1,
    ];
    $sql->execute($parametres);
    $count = $sql->rowCount();
    echo $count . ' entrée(s) modifiée(s) dans la table<br>';

    $parametres = [
        ':role' => 3,
        ':id' => 4,
    ];
    $sql->execute($parametres);
    $count = $sql->rowCount();
    echo $count. ' entrée(s) modifiée(s) dans la table<br />';
    
    $sql = $codb->prepare(
        'UPDATE Utilisateurs SET nbarticles = :nb WHERE Id=:id'
    );

    $parametres = [
        ':nb' => 5, ':id' => 3
    ];
    $sql->execute($parametres);
    $count = $sql->rowCount();
    echo $count. ' entrée(s) modifiée(s) dans la table<br />';

    $parametres = [
        ':nb' => 12, ':id' => 5
    ];
    $sql->execute($parametres);
    $count = $sql->rowCount();
    echo $count. ' entrée(s) modifiée(s) dans la table<br />';

    $codb = null;
}
catch(PDOException $e) {
    echo "Message d'erreur : " .$e->getMessage(). "<br />";
}
