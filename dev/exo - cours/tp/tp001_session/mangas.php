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
    <title>Mangas</title>
</head>
<body>
    <h1>Liste des mangas</h1>
    <nav>
        <a href="logout.php" class="btn btn-danger">Se déconnecter</a>
        <a href="nav.php" class="btn btn-success">Navigation</a>
    </nav>
    <main class="row">
        <div class="card col-4">
            <img src="img/manga_1.jpg" class="card-img-top" alt="">
            <div class="card-body">
                <h5 class="card-title">Naruto</h5>
                <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Maiores rerum eius illo voluptas repellendus ipsum voluptates nihil rem vitae minus vero, iste distinctio quasi minima ea. Molestias natus temporibus excepturi accusamus, perferendis hic fugiat at earum? Consequuntur, aperiam rerum totam at accusantium illo doloremque atque!</p>
            </div>
        </div>
        <div class="card col-4">
            <img src="img/manga_2.jpg" class="card-img-top" alt="">
            <div class="card-body">
                <h5 class="card-title">One piece</h5>
                <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Reprehenderit, tenetur? Doloribus, veritatis quo? Repudiandae quae fuga fugiat magni assumenda ipsum impedit quasi aspernatur incidunt debitis, doloribus pariatur! Aspernatur a aliquam error magnam. Doloremque dicta rem hic similique perferendis accusamus aliquam maiores fuga expedita, debitis vero!</p>
            </div>
        </div>
        <div class="card col-4">
            <img src="img/manga_3.jpg" class="card-img-top" alt="">
            <div class="card-body">
                <h5 class="card-title">L'attaque des titans</h5>
                <p class="card-text">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Saepe quas voluptas voluptate quos distinctio, eius laboriosam consequuntur possimus laborum ea odit a, nihil incidunt aspernatur eos! Soluta qui, architecto ullam voluptatum enim deserunt consequuntur. Beatae, exercitationem. Autem molestias similique consequuntur praesentium minus molestiae minima fugiat voluptate tempore repellendus libero laudantium, quo doloribus atque quia fugit?</p>
            </div>
        </div>
        <div class="card col-4">
            <img src="img/manga_4.jpg" class="card-img-top" alt="">
            <div class="card-body">
                <h5 class="card-title">Samouraï Champloo</h5>
                <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quo et, quas fugiat consectetur, exercitationem aspernatur recusandae repudiandae tenetur consequatur quaerat ab veritatis libero sed alias veniam iste impedit excepturi maxime ipsam aut quam, amet ut pariatur!</p>
            </div>
        </div>
        <div class="card col-4">
            <img src="img/manga_5.jpg" class="card-img-top" alt="">
            <div class="card-body">
                <h5 class="card-title">Dororo</h5>
                <p class="card-text">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Quidem, voluptate iste? Repellat minima adipisci deserunt sit dolore magni exercitationem sapiente corporis quibusdam, incidunt minus harum corrupti itaque! Dignissimos magnam, cupiditate labore rerum architecto natus. Impedit, laudantium labore provident totam tenetur odit, explicabo dolores, nisi similique architecto sit aliquid sunt perspiciatis animi. Qui explicabo culpa similique quam?</p>
            </div>
        </div>
        <div class="card col-4">
            <img src="img/manga_6.jpg" class="card-img-top" alt="">
            <div class="card-body">
                <h5 class="card-title">Afro Samouraï</h5>
                <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Vero, quidem consectetur. Rerum cupiditate fuga iusto ea doloremque nam voluptatem amet odit ullam libero ducimus repellat, excepturi praesentium labore fugiat sapiente veritatis sequi accusamus ab. Non rerum officia autem exercitationem iure.</p>
            </div>
        </div>
    </main>
</body>
</html>