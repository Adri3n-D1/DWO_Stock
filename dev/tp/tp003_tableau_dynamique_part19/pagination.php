<?php

// Récupération de la page suivante

require 'connexion.php';

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

    $r = $connexion->prepare('SELECT COUNT(*) as nb FROM products');
    $r->execute();
    $nbr_biens = (int)$r->fetch(PDO::FETCH_ASSOC)['nb'];


    /// Calcul du nombre de pages à avoir

    $nb_page = ceil($nbr_biens / 20);

    if($current_page >= $nb_page){
        $current_page = $nb_page - 1;
    }
    
    $offset = $current_page * 20; 

    // $offset = 0; // de 1 à 20
    // $offset = 20; // 21 à 40
    // $offset = 40; // 41 à 60

    $query = "SELECT * FROM products ORDER BY id DESC LIMIT 20 OFFSET :offset"; // * signifie toutes les colonnes

    $requete = $connexion->prepare($query);

    $requete->bindValue('offset', $offset, PDO::PARAM_INT);

    $requete->execute();

    $biens = $requete->fetchAll(PDO::FETCH_ASSOC);

    echo json_encode([
        'list' => $biens,
        'nb_page' => $nb_page
    ]);
    die;




}else if( isset($_POST['page_selected'])){

    // Récupération du nombre de biens dans la base

    $r = $connexion->prepare('SELECT COUNT(*) as nb FROM products');
    $r->execute();
    $nbr_biens = (int)$r->fetch(PDO::FETCH_ASSOC)['nb'];


    /// Calcul du nombre de pages à avoir

    $nb_page = ceil($nbr_biens / 20);

    /****************************************** */

    $offset = ((int)$_POST['page_selected'] - 1) * 20;

    $query = "SELECT * FROM products ORDER BY id DESC LIMIT 20 OFFSET :offset"; // * signifie toutes les colonnes

    $requete = $connexion->prepare($query);

    $requete->bindValue('offset', $offset, PDO::PARAM_INT);

    $requete->execute();

    $biens = $requete->fetchAll(PDO::FETCH_ASSOC);

    echo json_encode([
        'list' => $biens,
        'nb_page' => $nb_page
    ]);
    die;

}
