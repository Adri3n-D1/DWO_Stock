<?php

$servername = 'localhost';
$username = 'root';
$password = '';
$dbname = 'biens-immo';

try {

    $connexion = new PDO("mysql:host=$servername;dbname=$dbname;port=3306;charset=utf8", $username, $password);    
    $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
} catch(PDOException $e){

    echo 'Echec de connexion : ' . $e->getMessage(); 

}
// On supprime un bien immobilier si on a cliqué sur un bouton supprimer



// On récupère la page courrante
$current_page = 0;

if( isset($_GET['next']) ){ // Pour la page suivant, on définit le $current_page à la page suivante
    $current_page = (int)$_GET['next'];
}elseif( isset($_GET['previous']) ){ // Pour la page précédente, on définit le $current_page à la page précédente
    $current_page = (int)$_GET['previous'];
}

if( isset($_GET['current-page']) ){ // Si on a cliqué sur un bouton de pagination

    $current_page = (int)$current_page < 0 ? 0 : $current_page; // Si on a un numéro de page négatif, on définit la page courante à 0

}

////////////////////////////// Ajout du bien immobilier dans la base de données

if(  isset($_POST['name']) && isset($_POST['price']) && isset($_POST['city']) && isset($_POST['address']) ){

    $q = "INSERT INTO `products` (`address`, `city`, `name`, `price`) VALUES (:address, :city, :name, :price )";
    
    $requete = $connexion->prepare($q);

    $requete->bindValue('address', htmlEntities($_POST['address']), PDO::PARAM_STR);
    $requete->bindValue('city', htmlEntities($_POST['city']), PDO::PARAM_STR);
    $requete->bindValue('name', htmlEntities($_POST['name']), PDO::PARAM_STR);
    $requete->bindValue('price', htmlEntities($_POST['price']), PDO::PARAM_STR);
    
    $result = $requete->execute();

    if($result){
        echo '<span id="msg-insert" style="color: lightgreen;font-weight:bold;">Insertion effectuée avec succès !</span>';
    }else{
        echo '<span id="msg-insert" style="color: lightgreen;font-weight:bold;">L\'insertion a échoué !</span>';
    }

}


////////////////////////////// Récupération de tout les biens pour l'affichage

// Calcul du nombre de pages à avoir

$r = $connexion->prepare("SELECT COUNT(*) AS nb FROM products");
$r->execute();
$nbr_bien = (int)$r->fetch(PDO::FETCH_ASSOC)['nb'];

$nb_page = ceil($nbr_bien / 20);

if($current_page >= $nb_page){
    $current_page = $nb_page - 1;
}

$offset = $current_page * 20;

$query = "SELECT * FROM products ORDER BY id ASC LIMIT 20 OFFSET $offset";

if( isset($_POST['c']) ){
    $query = "SELECT * FROM products WHERE city LIKE CONCAT('%', :city, '%') ";
}

$req = $connexion->prepare($query);

if( isset($_POST['c']) ){
    $req->bindValue('city', htmlEntities($_POST['c']) );
}

$req->execute();

$biens = $req->fetchAll(PDO::FETCH_ASSOC);

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
</head>
<body class="p-4">
    
<h1>Les biens immobiliers</h1>

<!-----------------------------Form------------------------------------>

<div id="black-screen">
    <form action="" method="POST" class="mb-4" id="form1">
        <h2>Ajouter un bien</h2>
        <div class="form-group">
            <label for="nom"></label>
            <input type="text" id="nom" class="form-control" name="name" placeholder="Nom">
        </div>
        <div class="form-group">
            <label for="prix"></label>
            <input type="text" id="prix" class="form-control" name="price" placeholder="Prix">
        </div>
        <div class="form-group">
            <label for="ville"></label>
            <input type="text" id="ville" class="form-control" name="city" placeholder="Ville">
        </div>
        <div class="form-group">
            <label for="adresse"></label>
            <input type="text" id="adresse" class="form-control" name="address" placeholder="Adresse">
        </div>
        <button type="submit" class="btn btn-success mt-3">Ajouter</button>
    </form>    
</div>

<!----------------------------------------------------------------->

<form action="" method="POST" class="mb-4">
    <div class="form-group">
        <input type="text" class="form-control" name="c" placeholder="Rechercher par ville">
    </div>
    <button type="submit" class="btn btn-primary">Rechercher</button>
</form>

<!----------------------------------------------------------------->

<div class="btn btn-warning float-end" id="add-good">Ajouter un bien</div>

<a href="http://localhost/dev-web/tp/prets/tableau-dynamique/index.php?current-page=<?php echo $current_page; ?>&next=<?php echo $current_page+1; ?>"><img src="arrow-right.png" alt="" style="border:1px solid black;width:30px;height:30px;float:right;margin-top:50px;cursor:pointer;"></a>
<a href="http://localhost/dev-web/tp/prets/tableau-dynamique/index.php?current-page=<?php echo $current_page; ?>&previous=<?php echo $current_page-1; ?>"><img src="arrow-left.png" alt="" style="border:1px solid black;width:30px;height:30px;float:left;margin-top:50px;cursor:pointer;"></a>
<div class="container">
    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nom</th>
                <th>Prix</th>
                <th>Ville</th>
                <th>Adresse</th>
            </tr>
        </thead>
        <tbody>
                <?php foreach($biens as $bien): ?>
                    <tr id="tr<?= $bien['id'] ?>">
                        <td><?= $bien['id'] ?></td>
                        <td><?= $bien['name'] ?></td>
                        <td><?= $bien['price'] ?></td>
                        <td><?= $bien['city'] ?></td>
                        <td>
                            <span class="address" id="address<?= $bien['id'] ?>"><?= $bien['address'] ?></span>
                           
                        </td>
                    </tr>
                <?php endforeach; ?>

        </tbody>
    </table>    
</div>

<!----------------------------------------------------------------->

<script>

document.querySelector('#add-good').addEventListener('click', function(){

    document.querySelector('#black-screen').style.display = 'flex';

});

document.querySelector('#black-screen').addEventListener('click', (event) => {

    event.target.style.display = 'none';

});

document.querySelector('#form1').addEventListener('click', (event) => {

    event.stopPropagation();

});
</script>

<!----------------------------------------------------------------->

<style>

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

</style>
</body>
</html>