<?php

if (!isset($_POST['id']) || empty($_POST['id']))
{
    die();
}
if (isset($_POST['address']) && !empty($_POST['address'])) {
    $sql = 'UPDATE products SET address=:address WHERE id=:id';
    $request = $db->prepare($sql);
    $request->bindValue('address', htmlEntities($_POST['address']), PDO::PARAM_STR);
}
elseif (isset($_POST['city']) && !empty($_POST['city'])) {
    $sql = 'UPDATE products SET address=:address WHERE id=:id';
    $request = $db->prepare($sql);
    $request->bindValue('city', htmlEntities($_POST['city']), PDO::PARAM_STR);
}
$request->bindValue('id', htmlEntities($_POST['id']), PDO::PARAM_STR);

$request->bindValue('id', htmlEntities($_POST['id']), PDO::PARAM_INT);

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

    $result = $request->execute();

    if ($result) {
        echo 'SUCCES';
    }
    else {
        echo 'ECHEC';
    }

    $db = null;    
}

catch (PDOException $e)
{
    echo 'ERREUR : ' . $e->getMessage();
    die();
}