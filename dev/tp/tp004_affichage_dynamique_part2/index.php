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

    if (isset($_POST['remove-skill'])) {
        $idSkill = [htmlspecialchars($_POST['remove-skill'])];
        $sql = 'DELETE FROM competence WHERE id = ?';
        $request =  $db->prepare($sql);
        $request->execute($idSkill);
        $db = null;
        header('Location: index.php');
        die();
    }

    $sql = 'SELECT id, name, img_url FROM competence';
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
                <div style="display: flex; flex-direction: column; justify-content: center;">
                    <p><?= $competence['name'] ?></p>
                </div>
                <div style="display: flex; flex-direction: column; justify-content: center;">
                    <form method="POST">
                        <input type="hidden" name="remove-skill" value="<?= $competence['id'] ?>">
                        <input type="submit" value="Supprimer" style="padding: 15px;background-color: orange; border: 0; border-radius: 15px; margin-left: 15px;">
                    </form>
                </div>
            </div>

    <?php endforeach; ?>
</body>
</html>