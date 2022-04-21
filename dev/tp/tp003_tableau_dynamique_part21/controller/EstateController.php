<?php

require_once(ROOT.'model/EstateModel.php');

class EstateController{

    private $message_success = 'Mise à jour faite avec succès';
    private $message_error = 'Echec de la mise à jour';

    public function getBiensAction(){

        $em = new EstateModel();
        $city = '';
        if(isset($_POST['city-filter'])){
            $city = $_POST['city-filter'];
        }
        $biens = $em->getBiens($city);

        echo json_encode($biens);
    }

    public function updateCityAction(){

        $em = new EstateModel();
        $result = $em->updateCity();

        if( $result ){
            echo $this->message_success.' de la ville';
        }else{
            echo $this->message_error;
        }

    }

    public function updateAddressAction(){

        $em = new EstateModel();
        $result = $em->updateAddress();

        if( $result ){
            echo $this->message_success;
        }else{
            echo $this->message_error;
        }
    }

    public function addBienAction(){

        $em = new EstateModel();
        $result = $em->addBien();

        if( $result ){
            echo $this->message_success;
        } else {
            echo $this->message_error;
        }
    }
    
    public function deleteBienAction() {

        $em = new EstateModel();
        $result = $em->deleteBien();

        if( $result ){
            echo $this->message_success;
        }else{
            echo $this->message_error;
        }
    }

    

}