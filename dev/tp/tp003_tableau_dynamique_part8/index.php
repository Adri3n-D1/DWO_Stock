<?php

session_start();

// Si un nouvel élément à été ajouté on le notifie
if (isset($_SESSION['token-new']))
{
    echo '<p style="color: green">Insertion effectuées avec succés !<br></p>';
    unset($_SESSION['token-new']);
}
// On récupère via une variable de session la page actuelle
if (!isset($_SESSION['page-actuelle']))
{
    $_SESSION['page-actuelle'] = 0;
}
try
{
    $servername = 'localhost';
    $dbname = 'biens-immo';
    $username = 'root';
    $password = '';
    
    $db = new PDO(
        'mysql:host='. $servername . ';dbname=' . $dbname . ';charset=utf8',
        $username, $password, [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
    );

    // Si un élément doit être retiré de la bdd
    if (isset($_POST['item-to-remove']) && !empty($_POST['item-to-remove'])) {
        $idItem = [htmlspecialchars($_POST['item-to-remove'])];        
        $sql = 'DELETE FROM products WHERE id = ?';
        $request =  $db->prepare($sql);
        $request->execute($idItem);
        $db = null;
        header('Location: index.php');
        die();
    }

    // Si un nouveau élément doit être ajouté à la base de donnée,
    // on l'ajoute et on recharge la page
    if (isset($_POST['form-new-name']) &&
        isset($_POST['form-new-price']) &&
        isset($_POST['form-new-city']) &&
        isset($_POST['form-new-address']) &&
        !empty($_POST['form-new-name']) &&
        !empty($_POST['form-new-price']) &&
        !empty($_POST['form-new-city']) &&
        !empty($_POST['form-new-address']))
    {
        $address = htmlspecialchars($_POST['form-new-address']);
        $city = htmlspecialchars($_POST['form-new-city']);
        $name = htmlspecialchars($_POST['form-new-name']);
        $price = htmlspecialchars($_POST['form-new-price']);

        $setting = [
            ':address' => $address,
            ':city' => $city,
            ':name' => $name,
            ':price' => $price,
        ];
        $sql = 'INSERT INTO products (address, city, name, price)
                VALUES (:address, :city, :name, :price)';

        $request = $db->prepare($sql);
        if ($request->execute($setting))
        {
            $_SESSION['token-new'] = true;
        }
        $db = null;
        header('Location: index.php');
        die();
    }   
    // Récupération du nombre de page
    $nbResultShow = 20;
    $sql = 'SELECT COUNT(*) AS nb FROM products';
    $request = $db->prepare($sql);
    $request->execute();
    $nbResult = (int)$request->fetch(PDO::FETCH_ASSOC)['nb'];
    $nbPage = ceil($nbResult / $nbResultShow);

    // Si l'utilisateur demande de changer de page,
    // on change la page actuelle si possible
    if (isset($_GET['action']))    {
        $action = htmlspecialchars($_GET['action']);
        switch($action) {
            case 'previous':
                if ($_SESSION['page-actuelle'] > 0) {
                    $_SESSION['page-actuelle']--;
                }
                break;
            case 'next':
                if ($_SESSION['page-actuelle'] < $nbPage) {
                    $_SESSION['page-actuelle']++;
                }
                break;
        }
    }

    // On calcul le point de départ de la requete
    $offset = $_SESSION['page-actuelle'] * 20;

    // Si un élément est recherché ou non on adapte la requete sql
    if (isset($_POST['form-target-city']) && !empty($_POST['form-target-city']))
    {
        $targetCity = htmlspecialchars($_POST['form-target-city']);
        $sql = 'SELECT id, address, city, name, price FROM products
                WHERE city LIKE \'%' . $targetCity . '\'';
    }
    else
    {
        $sql = 'SELECT id, address, city, name, price FROM products ORDER BY id DESC LIMIT ' . $nbResultShow . ' OFFSET ' . $offset;
    }
    
    $request = $db->prepare($sql);
    $request->execute();
    $result = $request->fetchAll();
    $db = null;    
}
catch (PDOException $e)
{
    echo 'ERREUR : ' . $e->getMessage();
    die();
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <title>TP - Tableau Dynamique</title>
</head>
<body class="container">
    <h1>Les biens immobiliers</h1>
<!---------------------------------- Popup ---------------------------------->
    <div id="popup-container" style="display: none">
        <div id="popup-content">
            <h2>Ajouter un bien</h2>
            <form action="index.php" method="POST">
                <input type="text" class="form-control mb-3" name="form-new-name" placeholder="Nom">
                <input type="text" class="form-control mb-3" name="form-new-price" placeholder="Prix">
                <input type="text" class="form-control mb-3" name="form-new-city" placeholder="Ville">
                <input type="text" class="form-control mb-3" name="form-new-address" placeholder="Adresse">
                <button type="submit" class="btn btn-success mb-3">Ajouter</button>
            </form>
        </div>
    </div>
<!--------------------------------------------------------------------------->

    <form action="index.php" method="POST">
        <div class="mb-3">
            <input type="text" class="form-control mt-5" name="form-target-city" placeholder="Rechercher par ville">
        </div>
        <div class="d-flex justify-content-between">
            <input type="submit" class="btn btn-primary" value="Rechercher">
            <div id="popup-btn" onclick="togglePopup()" class="btn btn-warning">Ajouter un bien</div>
        </div>
    </form>
<!--------------------------------------------------------------------------->
    <div class="d-flex justify-content-between">
        <a href="index.php?action=previous"><svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-arrow-left" viewBox="0 0 16 16"><path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z"/></svg></a>
        <p><?= $_SESSION['page-actuelle'] ?></p>
        <a href="index.php?action=next"><svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-arrow-right" viewBox="0 0 16 16"><path fill-rule="evenodd" d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8z"/></svg></a>
    </div>
<!--------------------------------------------------------------------------->
    <table class="table table-striped">
        <thead>
            <tr>
            <th scope="col">ID</th>
            <th scope="col">Nom</th>
            <th scope="col">Prix</th>
            <th scope="col">Ville</th>
            <th scope="col">Adresse</th>
            <th scope="col"></th>
            </tr>
        </thead>
        <tbody id="table-content">
        <?php foreach ($result as $row): ?>
            <tr>
                <td><?= $row['id'] ?></tds>
                <td><?= $row['name'] ?></td>
                <td><?= $row['price'] ?></td>
                <td><?= $row['city'] ?></td>
                <td><span class="address-label"><?= $row['address'] ?></span><textarea class="adress-text-area" style="display: none"><?= $row['address'] ?></textarea></td>
                <td>
                    <form action="" method="POST">
                        <input type="hidden" name="item-to-remove" value="<?= $row['id'] ?>">
                        <input type="submit" class="btn btn-danger" value="Supprimer">
                    </form>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</body>

<script>
    //
    for (element of document.getElementsByClassName('address-label')) {
        element.addEventListener('click', function(event) {
            event.target.style.display = 'none';
            event.target.nextSibling.style.display = 'block';
        });
    }
    for (element of document.getElementsByClassName('adress-text-area')) {
        element.addEventListener('mouseout', function(event) {
            event.target.style.display = 'none';
            event.target.previousSibling.style.display = 'block';
        });
        element.addEventListener('keyup', function(event) {
            event.target.previousSibling.innerText = event.target.value;
        });
    }
    //////// Parametrage de la popup
    let popup = document.getElementById('popup-container');
    let form = document.getElementById('popup-content');
    // Cliquer en dehors du formulaire cache la popup
    popup.addEventListener('click', () => {
        togglePopup();
    });
    // Cliquer sur le formulaire ne fait rien
    form.addEventListener('click', (event) => {
        event.stopPropagation();
    });
    // Cette fonction fait ociller l'état de la popup entre affichée ou pas affichée.
    function togglePopup() {
        if (popup.style.display == 'none')
        {
            popup.style.display = 'flex';
        }
        else
        {
            popup.style.display = 'none';
        }
    }
</script>

<style>
    #popup-container {
        background-color: #ccccccaa;
        position: fixed;
        height: 100%;
        width: 100%;
        top: 0;
        left: 0;
        z-index: 2;

        justify-content: center;
        align-items: center;
    }
    #popup-container #popup-content {
        box-sizing: border-box;
        padding: 30px 15px 15px;
        background-color: #fff;
    }
</style>
</html>