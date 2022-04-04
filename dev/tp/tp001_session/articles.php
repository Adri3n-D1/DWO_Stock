<?php
session_start();

if (!isset($_SESSION['login'])) {
    header('Location: logout.php');
}
if (!isset($_SESSION['isMajor'])) {
    header('Location: logout.php');
}

if (!$_SESSION['isMajor']) {
    $_SESSION['ageRestriction'] = 'adultes';
    setcookie('ageRestriction', false, -1);
    header('Location: index.php');
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
    <title>Articles</title>
</head>
<body>
    <h1>Liste des articles</h1>
    <nav>
        <a href="logout.php" class="btn btn-danger">Se déconnecter</a>
        <a href="nav.php" class="btn btn-success">Navigation</a>
    </nav>
    <main class="row">
        <div class="card col-4">
            <img src="img/art_1.jpg" class="card-img-top" alt="">
            <div class="card-body">
                <h5 class="card-title">Les chats</h5>
                <p class="card-text">BLABLABLABLABLABLABLABLABLABLABLABLABLABLABLABLABLABLABLABLABLABLABLABLA.</p>
            </div>
        </div>
        <div class="card col-4">
            <img src="img/art_2.jpg" class="card-img-top" alt="">
            <div class="card-body">
                <h5 class="card-title">Les chiens</h5>
                <p class="card-text">BLABLABLABLABLABLABLABLABLABLABLABLABLABLABLABLABLABLABLABLABLABLABLABLA.</p>
            </div>
        </div>
        <div class="card col-4">
            <img src="img/art_3.jpg" class="card-img-top" alt="">
            <div class="card-body">
                <h5 class="card-title">Les oiseaux</h5>
                <p class="card-text">BLABLABLABLABLABLABLABLABLABLABLABLABLABLABLABLABLABLABLABLABLABLABLABLA.</p>
            </div>
        </div>
    </main>
</body>
</html>