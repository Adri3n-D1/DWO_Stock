<?php
session_start();

if (!isset($_SESSION['login'])) {
    header('Location: logout.php');
}
if (!isset($_SESSION['isMajor'])) {
    header('Location: logout.php');
}

if ($_SESSION['isMajor']) {
    $_SESSION['ageRestriction'] = 'enfants';
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
    <title>Dessins Animés</title>
</head>
<body>
    <h1>Liste des dessins animés</h1>
    <nav>
        <a href="logout.php" class="btn btn-danger">Se déconnecter</a>
        <a href="nav.php" class="btn btn-success">Navigation</a>
    </nav>
    <main class="row">
        <div class="card col-4">
            <img src="img/da_1.jpg" class="card-img-top" alt="">
            <div class="card-body">
                <h5 class="card-title">Le roi lion</h5>
                <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quos perferendis, hic eveniet amet magni mollitia cumque? Eius repellat repudiandae at, nulla accusantium reprehenderit? Ipsa expedita beatae ex saepe repellat perspiciatis hic. Illo facilis provident consequatur tempora cumque rerum necessitatibus eius officiis doloremque fugit ea maiores sequi cum iste, quod consectetur placeat commodi quae beatae blanditiis. Atque asperiores voluptate et non.</p>
            </div>
        </div>
        <div class="card col-4">
            <img src="img/da_2.jpg" class="card-img-top" alt="">
            <div class="card-body">
                <h5 class="card-title">Le livre de la jungle</h5>
                <p class="card-text">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Esse quam culpa quia accusantium error deserunt ipsum minima et quod porro! Nesciunt necessitatibus temporibus voluptatum sapiente reiciendis et iste assumenda placeat nulla tempore! Repudiandae quam, cum corporis vitae totam eveniet officia repellat et magni, consequatur tempora voluptas ea. Blanditiis, amet laboriosam?</p>
            </div>
        </div>
        <div class="card col-4">
            <img src="img/da_3.jpg" class="card-img-top" alt="">
            <div class="card-body">
                <h5 class="card-title">La reine des neiges</h5>
                <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Ullam, quod? Dignissimos nihil quod sit adipisci culpa quia vero perferendis fuga natus odio quisquam, impedit veniam consequuntur possimus dolorem modi id.</p>
            </div>
        </div>
    </main>

</body>
</html>