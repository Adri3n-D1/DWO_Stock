<?php
session_start();

if (!isset($_SESSION['login'])) {
    header('Location: logout.php');
}
if (!isset($_SESSION['isMajor'])) {
    header('Location: logout.php');
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
    <title>Films</title>
</head>
<body>
    <h1>Liste des films</h1>
    <nav>
        <a href="logout.php" class="btn btn-danger">Se déconnecter</a>
        <a href="nav.php" class="btn btn-success">Navigation</a>
    </nav>
    <main class="row">
        <div class="card col-4">
            <img src="img/film_1.jpg" class="card-img-top" alt="">
            <div class="card-body">
                <h5 class="card-title">Reservoir dogs</h5>
                <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Nesciunt magni, ipsa ea pariatur unde praesentium deserunt perferendis asperiores fugiat itaque similique, consequatur obcaecati. Quae, nemo odit eum commodi beatae id laboriosam earum nulla tenetur adipisci saepe sapiente non tempora dolorum. Quod, explicabo. Voluptatum neque alias ut tenetur provident sed porro?</p>
            </div>
        </div>
        <div class="card col-4">
            <img src="img/film_2.jpg" class="card-img-top" alt="">
            <div class="card-body">
                <h5 class="card-title">Man on fire</h5>
                <p class="card-text">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Impedit hic quo alias dolore veniam ab, ullam perspiciatis earum totam libero? Eos eius alias cum odit assumenda tempora in perspiciatis atque eveniet repellendus. Cumque laboriosam iusto a quibusdam, dolorum reiciendis facere cupiditate eius error, iure neque?</p>
            </div>
        </div>
        <div class="card col-4">
            <img src="img/film_3.jpg" class="card-img-top" alt="">
            <div class="card-body">
                <h5 class="card-title">Avatar</h5>
                <p class="card-text">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Earum assumenda fuga perferendis libero sed voluptatum architecto ratione aperiam numquam veritatis nam doloremque nesciunt eveniet pariatur delectus necessitatibus provident at dolore molestias, cupiditate placeat ad! Tempora nesciunt provident ullam cupiditate suscipit velit cumque soluta porro tenetur itaque ut architecto, doloribus aperiam.</p>
            </div>
        </div>
    </main>
</body>
</html>