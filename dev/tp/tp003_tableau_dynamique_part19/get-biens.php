<?php

require 'connexion.php';

$query = "SELECT * FROM products ORDER BY id DESC LIMIT 20";

if(isset($_POST['city-filter'])){
    $query = "SELECT * FROM products WHERE city LIKE CONCAT('%', :city ,'%') ORDER BY id DESC LIMIT 20";
}


$req = $connexion->prepare($query);

if(isset($_POST['city-filter'])){
    $req->bindValue('city', $_POST['city-filter'], PDO::PARAM_STR);
}

$req->execute();

$biens = $req->fetchAll(PDO::FETCH_ASSOC);

echo json_encode($biens);
die;