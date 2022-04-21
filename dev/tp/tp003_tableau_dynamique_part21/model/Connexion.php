<?php

class Connexion{

    protected $connexion;

    public function __construct(){
        $servername = 'localhost';
        $username = 'root';
        $password = '';
        $dbname = 'biens-immo';
        
        try {
        
            $this->connexion = new PDO("mysql:host=$servername;dbname=$dbname;port=3306;charset=utf8", $username, $password);    
            $this->connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
        } catch(PDOException $e){
        
            echo 'Echec de connexion : ' . $e->getMessage(); 
        
        }

    }

}
