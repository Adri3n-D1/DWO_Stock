<?php

$servername = 'localhost';
$username = 'root';
$password = '';
$dbname = 'biens-immo';

try {

    $connexion = new PDO("mysql:host=$servername;dbname=$dbname;port=3306;charset=utf8", $username, $password);    
    $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
} catch(PDOException $e){

    echo 'Echec de connexion : ' . $e->getMessage(); 

}

/*****************************************************************/


$query = "UPDATE `products` SET `address` = :address WHERE id = :id";

$requete = $connexion->prepare($query);

$requete->bindValue('address', htmlEntities($_POST['address']), PDO::PARAM_STR);
$requete->bindValue('id', htmlEntities($_POST['id']), PDO::PARAM_INT);

$result = $requete->execute();

if( $result ){
    echo 'Mise à jour de l\'adresse faite avec succès';
}else{
    echo 'Echec de la mise à jour de l\'adresse';
}