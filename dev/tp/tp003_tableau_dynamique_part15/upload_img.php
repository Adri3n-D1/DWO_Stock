<?php

function initDb($serverName, $dbName, $charset, $userName, $password) {
    $connect = 'mysql:';
    $connect .= 'host=' . $serverName . ';';
    $connect .= 'dbname=' . $dbName . ';';
    $connect .= 'charset=' . $charset . ';';

    $options = [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    ];

    $db = new PDO($connect, $userName, $password, $options);

    return $db;
}
function addToDb() {
    $db = initDb('localhost', 'biens-immo', 'utf8', 'root', '');
    $sql = 'UPDATE products SET  img=:img WHERE id=:id';
    $setting = [
        ':img' => $_FILES["img"]["name"],
        ':id' => $_POST['img-id'],
    ];

    $request = $db->prepare($sql);
    $request->execute($setting);
}

if(
    ! empty($_FILES['img']) &&
    $_FILES['img']['error'] == UPLOAD_ERR_OK &&
    is_uploaded_file($_FILES['img']['tmp_name']))
{
    echo "Stocké dans : " . $_FILES["img"]["tmp_name"]; 
    move_uploaded_file($_FILES["img"]["tmp_name"], $_FILES["img"]["name"]);
    addToDb($_FILES["img"]["name"]);
}

header('Location: index.php');
die();
