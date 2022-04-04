<?php
try {
    $servername = 'localhost';
    $dbname = 'biens-immo';
    $username = 'root';
    $password = '';
    
    $db = new PDO(
        'mysql:host='. $servername . ';dbname=' . $dbname . ';charset=utf8',
        $username, $password, [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
    );

    if (isset($_POST['form-target-city']) && !empty($_POST['form-target-city'])) {
        $targetCity = htmlspecialchars($_POST['form-target-city']);
        $sql = 'SELECT id, address, city, name, price FROM products
                WHERE city LIKE \'%' . $targetCity . '\'';
    }
    else {
        $sql = 'SELECT id, address, city, name, price FROM products LIMIT 20';
    }
    
    $request = $db->prepare($sql);
    $request->execute();
}
catch (PDOException $e) {
    echo 'ERREUR : ' . $e->getMessage();
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
    <form action="index.php" method="POST">
        <div class="mb-3">
            <input type="text" class="form-control" name="form-target-city" placeholder="Rechercher par ville">
        </div>
        <button type="submit" class="btn btn-primary">Rechercher</button>
    </form>
    <table class="table table-striped">
        <thead>
            <tr>
            <th scope="col">ID</th>
            <th scope="col">Nom</th>
            <th scope="col">Prix</th>
            <th scope="col">Ville</th>
            <th scope="col">Adresse</th>
            </tr>
        </thead>
        <tbody id="table-content">
        <?php foreach ($request->fetchAll() as $row): ?>
            <tr>
                <td><?= $row['id'] ?></tds>
                <td><?= $row['name'] ?></td>
                <td><?= $row['price'] ?></td>
                <td><?= $row['city'] ?></td>
                <td><?= $row['address'] ?></td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>