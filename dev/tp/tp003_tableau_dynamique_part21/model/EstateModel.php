<?php


require 'model/Connexion.php';

class EstateModel extends Connexion{

    public function getBiens(string $city = '') : array {

        $connexion = new Connexion();

        $query = "SELECT * FROM products ORDER BY id DESC LIMIT 20";

        if($city != ''){
            $query = "SELECT * FROM products WHERE city LIKE CONCAT('%', :city ,'%') ORDER BY id DESC LIMIT 20";
        }
        
        $requete = $connexion->connexion->prepare($query);
        
        if($city != ''){
            $requete->bindValue('city', $_POST['city-filter'], PDO::PARAM_STR);
        }
        
        $requete->execute();
        
        $biens = $requete->fetchAll(PDO::FETCH_ASSOC);
        
        return $biens;

    }

    public function updateCity(): bool{

        $connexion = new Connexion();
        $query = "UPDATE `products` SET `city` = :city WHERE id = :id";

        $requete = $connexion->connexion->prepare($query);
        
        $requete->bindValue('city', htmlEntities($_POST['city']), PDO::PARAM_STR);
        $requete->bindValue('id', htmlEntities($_POST['id']), PDO::PARAM_INT);
        
        $result = $requete->execute();
        
        return $result;
    }

    public function updateAddress(): bool{

        $connexion = new Connexion();
        $query = "UPDATE `products` SET `address` = :address WHERE id = :id";

        $requete = $connexion->connexion->prepare($query);
        
        $requete->bindValue('address', htmlEntities($_POST['address']), PDO::PARAM_STR);
        $requete->bindValue('id', htmlEntities($_POST['id']), PDO::PARAM_INT);
        
        $result = $requete->execute();
        
        return $result;
    }

    public function addBien(): bool{

        $connexion = new Connexion();
        
        $query = 'INSERT INTO `products` (`address`, `city`, `name`, `price`) VALUES (:address, :city, :name, :price )';

        $requete = $connexion->connexion->prepare($query);        
    
        $requete->bindValue('address', htmlEntities($_POST['address']), PDO::PARAM_STR);
        $requete->bindValue('city', htmlEntities($_POST['city']), PDO::PARAM_STR);
        $requete->bindValue('name', htmlEntities($_POST['name']), PDO::PARAM_STR);
        $requete->bindValue('price', htmlEntities($_POST['price']), PDO::PARAM_STR);
        
        $result = $requete->execute();
        
        return $result;
    }

    public function deleteBien(): bool{

        $connexion = new Connexion();
        
        $query = 'DELETE FROM `products` WHERE id = :id';

        $requete = $connexion->connexion->prepare($query);        
    
        $requete->bindValue('id', htmlentities($_POST['id_estate']), PDO::PARAM_INT );
        
        $result = $requete->execute();
        
        return $result;
    }
    
}