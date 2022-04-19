<?php

require 'connexion.php';
require 'functions.php';
// On supprime un bien immobilier si on a cliqué sur un bouton supprimer

if( isset($_POST['id-bien-suppr']) ){

    $query = "DELETE FROM products WHERE id = :id";

    $requete = $connexion->prepare($query);
    $requete->bindValue('id', $_POST['id-bien-suppr'], PDO::PARAM_INT);
    $result = $requete->execute();
    if($result){
        echo '<span id="msg-insert" style="color: lightgreen;font-weight:bold;">Suppression effectuée avec succès !</span>';
    }else{
        echo '<span id="msg-insert" style="color: red;font-weight:bold;">La suppression a échoué</span>';
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bien immobiliers</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script type="module" src="scripts/script.js"></script>
</head>
<body class="p-4">
    
<span id="message-serveur"></span>
<h1>Les biens immobiliers</h1>
<!-----------------------------Form------------------------------------>

<div id="black-screen">
    <form action="" method="POST" class="mb-4" id="form1">
        <h2>Ajouter un bien</h2>
        <div class="form-group">
            <label for="nom"></label>
            <input type="text" id="nom" class="form-control" name="name" placeholder="Nom">
            <span id="msg-nom"></span>
        </div>
        <div class="form-group">
            <label for="prix"></label>
            <input type="text" id="prix" class="form-control" name="price" placeholder="Prix">
            <span id="msg-prix"></span>
        </div>
        <div class="form-group">
            <label for="ville"></label>
            <input type="text" id="ville" class="form-control" name="city" placeholder="Ville">
            <span id="msg-ville"></span>
        </div>
        <div class="form-group">
            <label for="adresse"></label>
            <input type="text" id="adresse" class="form-control" name="address" placeholder="Adresse">
            <span id="msg-adresse"></span>
        </div>
        <button type="submit" class="btn btn-success mt-3">Ajouter</button>
    </form>    
</div>

<!----------------------------------------------------------------->

<form action="" method="POST" class="mb-4" id="form-city">
    <div class="form-group">
        <input type="text" class="form-control" name="city-filter" id="input-city-filter" placeholder="Rechercher par ville">
    </div>
    <button type="submit" class="btn btn-primary">Rechercher</button>
</form>

<!----------------------------------------------------------------->

<div class="btn btn-warning float-end" id="add-good">Ajouter un bien</div>
<input type="text" id="page_actuelle">
<img src="arrow-right.png" id="img-next" alt="" style="border:1px solid black;width:30px;height:30px;float:right;margin-top:50px;cursor:pointer;">
<img src="arrow-left.png" id="img-previous" alt="" style="border:1px solid black;width:30px;height:30px;float:left;margin-top:50px;cursor:pointer;">
<div class="container">
    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nom</th>
                <th>Prix</th>
                <th>Ville</th>
                <th>Adresse</th>
                <th>Image</th>
                <th></th>
            </tr>
        </thead>
        <tbody id="biens">

        </tbody>
    </table>    
</div>

<!----------------------------------------------------------------->

<style>

td{
    position:  relative;
}
.textarea-address, .textarea-city{
    display: none;
    width:  95%;
    padding:  0px;
    position:  absolute;

}
/******************************** */

#black-screen{
    background-color: #0000003b;
    position: fixed;
    width: 100%;
    height: 100%;
    top: 0px;
    left: 0px;
    display: none;
    justify-content: center;
    align-items: center;
    z-index: 2;
}

#form1{
    background-color: #fff;
    border: 5px solid lightgrey;
    height: 500px;
    width: 50%;
    padding: 30px;
}
.img-bien{
    width: 100px;
    height: 100px;
}
#img-previous{
    /* display: none; */
}
</style>
</body>
</html>