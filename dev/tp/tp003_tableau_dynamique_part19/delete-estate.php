<?php 

if( isset($_POST['id_estate']) ){
    
    require 'connexion.php';

    $query = "DELETE FROM `products` WHERE id = :id";

    $requete = $connexion->prepare($query);

    $requete->bindValue('id', htmlentities($_POST['id_estate']), PDO::PARAM_INT );

    $result = $requete->execute();

    if($result){

        $query = "SELECT * FROM `products` ORDER BY id DESC LIMIT 20 ";
        $requete = $connexion->prepare($query);
        $requete->execute();

        $biens = $requete->fetchAll(PDO::FETCH_ASSOC);

        echo json_encode([
            'message' => 'Suppression effectuée avec succès !',
            'biens' => $biens
        ]);
    }else{
        echo 'Echec de la suppression';
    }
    die;
}