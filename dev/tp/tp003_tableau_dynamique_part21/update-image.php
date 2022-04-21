<?php

require 'connexion.php';
require 'functions.php';

if(isset($_FILES['image'])){

    if($_FILES['image']['error'] == 0){
        $extensions = ['jpg', 'jpeg', 'png', 'ico', 'gif'];

        $file_ext = strtolower(substr( strrchr($_FILES['image']['name'], '.'), 1 ));

        if(in_array($file_ext, $extensions)){
            $filename = uniqid(time()).'.'.$file_ext;

            $result = move_uploaded_file($_FILES['image']['tmp_name'], 'img/'.$filename);

            if($result){

                $query = "UPDATE products SET image = :image WHERE id = :id";

                $requete = $connexion->prepare($query);
                $requete->bindValue('image', $filename, PDO::PARAM_STR);
                $requete->bindValue('id', $_POST['id_bien'], PDO::PARAM_INT);

                $result = $requete->execute();

                if($result){
                    echo json_encode($filename);
                }else{
                    echo json_encode('Echec');
                }

            }
        }
    }else{
        echo json_encode('Erreur dans le fichier');
    }



}