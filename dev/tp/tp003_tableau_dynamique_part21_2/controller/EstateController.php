<?php

namespace App;

use Model\EstateModel;

class EstateController{


    public function updateCityAction(){
        
        $em = new EstateModel();
        $result = $em->updateCity();
        
        if( $result ){
            echo 'Mise à jour de la ville faite avec succès';
        }else{
            echo 'Echec de la mise à jour de la ville';
        }
    }

    public function updateAddressAction(){
        
        $em = new EstateModel();
        $result = $em->updateAddress();
        
        if( $result ){
            echo 'Mise à jour de l\'adresse faite avec succès';
        }else{
            echo 'Echec de la mise à jour de l\'adresse';
        }
        die;
    }

    public function deleteEstateAction(){

        if( isset($_POST['id_estate']) ){
        
            $em = new EstateModel();
            $result = $em->deleteEstate();

            if($result){

                $biens = $em->getBiens();

                echo json_encode([
                    'message' => 'Suppression effectuée avec succès !',
                    'biens' => $biens
                ]);
            }else{
                echo 'Echec de la suppression';
            }
            die;
        }

    }

    public function getBiensAction(){

        $em = new EstateModel();
        $biens = $em->getBiens();
        
        echo json_encode($biens);

    }

    public function insertionAction(){

        
        $isset = isset($_POST['name']) && isset($_POST['price']) && isset($_POST['city']) && isset($_POST['address']);
        $empty = !empty($_POST['name']) && !empty($_POST['price']) && !empty($_POST['city']) && !empty($_POST['address']);
        
        if( $isset && $empty ){
            
            $em = new EstateModel();
            $result = $em->insertion();
        
            if($result){
                echo 'Insertion effectuée avec succès !';
            }else{
                echo 'L\'insertion a échoué !';
            }
        
        }else{
            echo 'Veuillez saisir toutes les données';
        }
        
    }

    public function paginationAction(){

        if( isset($_POST['page']) ){
        
            $current_page = (int)$_POST['page'];
        
            if( $_POST['step'] == 'next' ){
                $current_page++;
            }elseif( $_POST['step'] == 'previous' ){
                $current_page--;
            }
        
            // On vérifie que la page courante n'est pas négative
            $current_page = (int)$current_page < 0 ? 0 : $current_page;
        
        
            // Récupération du nombre de biens dans la base
        
            $em = new EstateModel();
            $nbr_biens = $em->getNbrBiens();
        
        
            /// Calcul du nombre de pages à avoir
        
            $nb_page = ceil($nbr_biens / 20);
        
            if($current_page >= $nb_page){
                $current_page = $nb_page - 1;
            }
            
            $offset = $current_page * 20; 
        
            $biens = $em->getPageBiens((int) $offset);
        
            echo json_encode([
                'list' => $biens,
                'nb_page' => $nb_page
            ]);
        
        }else if( isset($_POST['page_selected'])){
        
            // Récupération du nombre de biens dans la base
        
            $em = new EstateModel();
            $nbr_biens = $em->getNbrBiens();
        
        
            /// Calcul du nombre de pages à avoir
        
            $nb_page = ceil($nbr_biens / 20);
        
            /****************************************** */
        
            $offset = ((int)$_POST['page_selected'] - 1) * 20;
        
            $biens = $em->getPageBiens($offset);
        
            echo json_encode([
                'list' => $biens,
                'nb_page' => $nb_page
            ]);
        
        }
        
        
    }

    public function updateImageAction(){

        if(isset($_FILES['image'])){
        
            if($_FILES['image']['error'] == 0){
                $extensions = ['jpg', 'jpeg', 'png', 'ico', 'gif'];
        
                $file_ext = strtolower(substr( strrchr($_FILES['image']['name'], '.'), 1 ));
        
                if(in_array($file_ext, $extensions)){
                    $filename = uniqid(time()).'.'.$file_ext;
        
                    $result = move_uploaded_file($_FILES['image']['tmp_name'], ROOT.'img/'.$filename);
        
                    if($result){

                        $em = new EstateModel();
                        $result = $em->updateImage($filename);

                        if($result){
                            echo json_encode($filename);
                        }else{
                            echo json_encode('Echec de la mise à jour de l\'image dans la base de données');
                        }
        
                    }
                }
            }else{
                echo json_encode('Erreur dans le fichier');
            }
        
        }else{
            echo 'Veuillez charger une image';
        }
        
    }
    

}