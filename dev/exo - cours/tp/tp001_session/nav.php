<?php
session_start();
if (!isset($_SESSION['login']) || !isset($_SESSION['isMajor'])) {
    header('Location: index.php');
    die();
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <title>Nav</title>
</head>
<body>
    <h1>Page de navigation</h1>
    <a href="logout.php" class="btn btn-danger">Se déconnecter</a>
    <a href="articles.php" class="btn btn-primary">Articles</a>
    <a href="films.php" class="btn btn-success">Films</a>
    <a href="mangas.php" class="btn btn-warning">Mangas</a>
    <a href="dessins_animes.php" class="btn btn-secondary">Dessins animés</a>
    <a href="jouets.php" class="btn btn-info">Jouets</a>
</body>
</html>