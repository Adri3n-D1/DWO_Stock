<?php 

function executer($connexion, string $requete, array $parametres, bool $result = true){

    $req = $connexion->prepare($requete);
    
    if(!empty($parametres)){
        foreach($parametres as $param => $value){
            $req->bindValue($param, htmlEntities($value) );
        }
    }

    $res = $req->execute();

    if($result){
        return $req->fetchAll(PDO::FETCH_ASSOC);
    }else{
        return $res;
    }

}

function debug($val, $die = false){

    if(is_array($val)){
        echo '<pre>';
        print_r($val);
        echo '</pre>';
    }else{
        var_dump($val);
    }
    if($die){
        die;
    }

}