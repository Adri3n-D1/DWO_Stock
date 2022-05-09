<?php

namespace Model;
use Model\Connexion;

class EstateModel extends Connexion{


    public function getBiens() : array{

        $query = "SELECT * FROM products ORDER BY id DESC LIMIT 20";
        
        if(isset($_POST['city-filter'])){
            $query = "SELECT * FROM products WHERE city LIKE CONCAT('%', :city ,'%') ORDER BY id DESC LIMIT 20";
        }

        $req = $this->connexion->prepare($query);
        
        if(isset($_POST['city-filter'])){
            $req->bindValue('city', $_POST['city-filter'], \PDO::PARAM_STR);
        }
        
        $req->execute();
        
        return $req->fetchAll(\PDO::FETCH_ASSOC);

    }

    public function updateCity(){

        $query = "UPDATE `products` SET `city` = :city WHERE id = :id";
        
        $requete = $this->connexion->prepare($query);
        
        $requete->bindValue('city', htmlEntities($_POST['city']), \PDO::PARAM_STR);
        $requete->bindValue('id', htmlEntities($_POST['id']), \PDO::PARAM_INT);
        
        return $requete->execute();

    }

    public function updateAddress(){

        $query = "UPDATE `products` SET `address` = :address WHERE id = :id";
        
        $requete = $this->connexion->prepare($query);
        
        $requete->bindValue('address', htmlEntities($_POST['address']), \PDO::PARAM_STR);
        $requete->bindValue('id', htmlEntities($_POST['id']), \PDO::PARAM_INT);

        return $requete->execute();

    }

    public function deleteEstate(){

        $query = "DELETE FROM `products` WHERE id = :id";
        
        $requete = $this->connexion->prepare($query);
    
        $requete->bindValue('id', htmlentities($_POST['id_estate']), \PDO::PARAM_INT );
    
        return $requete->execute();

    }

    public function insertion(){

        $q = "INSERT INTO `products` (`address`, `city`, `name`, `price`) VALUES (:address, :city, :name, :price )";
            
        $requete = $this->connexion->prepare($q);
    
        $requete->bindValue('address', htmlEntities($_POST['address']), \PDO::PARAM_STR);
        $requete->bindValue('city', htmlEntities($_POST['city']), \PDO::PARAM_STR);
        $requete->bindValue('name', htmlEntities($_POST['name']), \PDO::PARAM_STR);
        $requete->bindValue('price', htmlEntities($_POST['price']), \PDO::PARAM_STR);
        
        return $requete->execute();

    }
    public function getNbrBiens() : int {

        $r = $this->connexion->prepare('SELECT COUNT(*) as nb FROM products');
        $r->execute();
        return (int)$r->fetch(\PDO::FETCH_ASSOC)['nb'];

    }

    public function getPageBiens(int $offset) : array{

        $query = "SELECT * FROM products ORDER BY id DESC LIMIT 20 OFFSET :offset"; // * signifie toutes les colonnes
        
        $requete = $this->connexion->prepare($query);
    
        $requete->bindValue('offset', $offset, \PDO::PARAM_INT);
    
        $requete->execute();
    
        return $requete->fetchAll(\PDO::FETCH_ASSOC);

    }

    public function updateImage(string $filename){

        $query = "UPDATE products SET image = :image WHERE id = :id";

        $requete = $this->connexion->prepare($query);
        $requete->bindValue('image', $filename, \PDO::PARAM_STR);
        $requete->bindValue('id', (int)$_POST['id_bien'], \PDO::PARAM_INT);

        return $requete->execute();

    }
}