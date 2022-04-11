<?php
session_start();

try
{
    if (isset($_POST['name']) &&
        isset($_POST['price']) &&
        isset($_POST['city']) &&
        isset($_POST['address']) &&
        !empty($_POST['name']) &&
        !empty($_POST['price']) &&
        !empty($_POST['city']) &&
        !empty($_POST['address'])) {
    
        $address = htmlspecialchars($_POST['address']);
        $city = htmlspecialchars($_POST['city']);
        $name = htmlspecialchars($_POST['name']);
        $price = htmlspecialchars($_POST['price']);

        $servername = 'localhost';
        $dbname = 'biens-immo';
        $username = 'root';
        $password = '';
        
        $db = new PDO(
            'mysql:host='. $servername . ';dbname=' . $dbname . ';charset=utf8',
            $username, $password, [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
        );

        $sql = 'INSERT INTO products (address, city, name, price)
                VALUES (:address, :city, :name, :price)';
                

        $setting = [
            ':address' => $address,
            ':city' => $city,
            ':name' => $name,
            ':price' => $price,
        ];
        $request = $db->prepare($sql);
        if ($request->execute($setting)) {
            echo json_encode(true);
        }
        else {        
            echo json_encode(false);
        }
        $db = null;
    }
}
catch (PDOException $e)
{
    echo 'ERREUR : ' . $e->getMessage();
    die();
}
die();