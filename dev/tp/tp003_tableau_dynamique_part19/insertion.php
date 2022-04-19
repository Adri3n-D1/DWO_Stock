<?php

require 'connexion.php';
////////////////////////////// Ajout du bien immobilier dans la base de données

$isset = isset($_POST['name']) && isset($_POST['price']) && isset($_POST['city']) && isset($_POST['address']);
$empty = !empty($_POST['name']) && !empty($_POST['price']) && !empty($_POST['city']) && !empty($_POST['address']);

if( $isset && $empty ){

    $q = "INSERT INTO `products` (`address`, `city`, `name`, `price`) VALUES (:address, :city, :name, :price )";
    
    $requete = $connexion->prepare($q);

    $requete->bindValue('address', htmlEntities($_POST['address']), PDO::PARAM_STR);
    $requete->bindValue('city', htmlEntities($_POST['city']), PDO::PARAM_STR);
    $requete->bindValue('name', htmlEntities($_POST['name']), PDO::PARAM_STR);
    $requete->bindValue('price', htmlEntities($_POST['price']), PDO::PARAM_STR);
    
    $result = $requete->execute();

    if($result){
        echo 'Insertion effectuée avec succès !';
    }else{
        echo 'L\'insertion a échoué !';
    }

}else{
    echo 'Veuillez saisir toutes les données';
}
die;


