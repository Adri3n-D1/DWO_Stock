<?php
$servername = 'localhost';
$dbname = 'comp';
$port = '3306';
$charset = 'utf8';

$username = 'root';
$password = '';

try {
    $db = new PDO(
        'mysql:host=' . $servername . ';dbname=' . $dbname . ';port=' . $port . ';charset=' . $charset,
        $username, $password,
        [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
    );
    $sql = 'SELECT name, img_url FROM competence';
    $request =  $db->prepare($sql);
    $request->execute();
    $competences = $request->fetchAll();
    $db = null;
}
catch (PDOException $e) {
    die('Erreur : ' . $e->getMessage());
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tp - Affichage dynamique de compétences</title>
</head>
<body>
    <?php foreach($competences as $competence) : ?>
        <div style="display: flex; margin-top: 25px;">
            <img src="<?= $competence['img_url'] ?>" alt="" style="width:100px">
            <p><?= $competence['name'] ?></p>
        </div>
    <?php endforeach; ?>
</body>
</html>