<?php

namespace model;

class Connexion{

    protected $connexion;
    
    public function __construct(){
        try {

            $this->connexion = new \PDO("mysql:host=localhost;dbname=biens-immo;port=3306;charset=utf8", 'root', '');    
            $this->connexion->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
            
        } catch(\PDOException $e){
        
            echo 'Echec de connexion : ' . $e->getMessage(); 
        
        }
    }

}


