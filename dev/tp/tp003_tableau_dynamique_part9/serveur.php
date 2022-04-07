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

    $sql = 'UPDATE products SET address=:address WHERE id=:id';

    $request = $db->prepare($sql);

    $request->bindValue('address', htmlEntities($_POST['address']), PDO::PARAM_STR);
    $request->bindValue('id', htmlEntities($_POST['id']), PDO::PARAM_INT);

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