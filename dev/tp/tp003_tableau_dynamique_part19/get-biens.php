<?php

require 'connexion.php';

$query = "SELECT * FROM products ORDER BY id DESC LIMIT :limit OFFSET :offset";
$limit = 20;
$offset = 0;

if(isset($_POST['city-filter'])){
    $query = "SELECT * FROM products WHERE city LIKE CONCAT('%', :city ,'%') ORDER BY id DESC LIMIT :limit OFFSET :offset";
}
if(isset($_POST['limit'])) {
    $limit = htmlentities($_POST['limit']);
}
if(isset($_POST['offset'])) {
    $offset = htmlentities($_POST['offset']);
}

$req = $connexion->prepare($query);


$req->bindValue('limit', $limit, PDO::PARAM_INT);
$req->bindValue('offset', $offset, PDO::PARAM_INT);

if(isset($_POST['city-filter'])){
    $req->bindValue('city', $_POST['city-filter'], PDO::PARAM_STR);
}

$req->execute();

$biens = $req->fetchAll(PDO::FETCH_ASSOC);

echo json_encode($biens);
die;