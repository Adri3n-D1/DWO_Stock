<?php

try
{
    $servername = 'localhost';
    $dbname = 'biens-immo';
    $username = 'root';
    $password = '';
    
    $db = new PDO(
        'mysql:host='. $servername . ';dbname=' . $dbname . ';charset=utf8',
        $username, $password, [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
    );

    $sql = 'SELECT id, address, city, name, price FROM products ORDER BY id DESC';
    
    $request = $db->prepare($sql);
    $request->execute();
    $result = $request->fetchAll();
    $db = null;    
}
catch (PDOException $e)
{
    echo 'ERREUR : ' . $e->getMessage();
    die();
}

echo json_encode($result);