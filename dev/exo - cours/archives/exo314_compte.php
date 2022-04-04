<?php

session_start();
if (isset($_SESSION['utilisateur_co']) && !empty($_SESSION['utilisateur_co'])) {
    echo 'Bonjour ' . $_SESSION['utilisateur_nom'] . '<br>';
    $serverName = 'localhost';
    $dbname = 'blog';
    $username = 'root';
    $password = '';
    
    try {
        $db = new PDO (
            'mysql:host=' . $serverName . ';dbname=' . $dbname . ';charset=utf8',
            $username, $password,
            [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
        );
        $sql = 'SELECT * FROM Roles';
        $request = $db->prepare($sql);
        $request->execute();
        $resultat = $request->fetchAll();
        $i = 0;
    }
    catch (PDOException $e) {
        echo 'ERREUR : ' . $e->getMessage();
    }
}
else {
    header('Location: exo314_index.php');
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
    <title>Exo 314 - compte</title>
</head>
<body>

    <form action="exo314_ajoututilisateur.php" method="POST" class="container">
        <div class="mb-3">
            <label for="form-nom" class="form-label">Nom</label>
            <input type="text" class="form-control" id="form-nom" name="form-nom">
        </div>
        <div class="mb-3">
            <label for="form-email" class="form-label">Adresse email</label>
            <input type="email" class="form-control" id="form-email" name="form-email">
        </div>
        <div class="mb-3">
            <label for="form-naissance" class="form-label">Date de naissance</label>
            <input type="number" class="form-control" id="form-naissance" name="form-naissance">
        </div>
        <select class="form-select"  name="form-role">
        <option selected></option>
        <?php foreach($resultat as $role): ?>
            <?php $i++; ?>
            <option value="<?= $role['Id'] ?>"><?= $role['Type'] ?></option>
        <?php endforeach; ?>
        </select>
        
        <div class="mb-3">
            <label for="form-password" class="form-label">Date de naissance</label>
            <input type="password" class="form-control" id="form-password" name="form-password">
        </div>
        <button type="submit" class="btn btn-primary">Envoyer</button>
    </form>

</body>
</html>