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
    <title>Jouets</title>
</head>
<body>
    <h1>Liste des jouets</h1>
    <nav>
        <a href="logout.php" class="btn btn-danger">Se déconnecter</a>
        <a href="nav.php" class="btn btn-success">Navigation</a>
    </nav>
    <main class="row">
        <div class="card col-4">
            <img src="img/jouet_1.jpg" class="card-img-top" alt="">
            <div class="card-body">
                <h5 class="card-title">Card_title</h5>
                <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Molestias expedita necessitatibus sequi suscipit eligendi recusandae porro distinctio, blanditiis minus quasi explicabo. Nobis ipsum veniam deserunt laboriosam, veritatis voluptate facere esse accusantium beatae neque maiores earum cumque, in exercitationem totam atque vel placeat animi omnis temporibus ad sunt. Voluptates, adipisci amet?.</p>
            </div>
        </div>
        <div class="card col-4">
            <img src="img/jouet_2.jpg" class="card-img-top" alt="">
            <div class="card-body">
                <h5 class="card-title">Card_title</h5>
                <p class="card-text">Lorem ipsum dolor sit, amet consectetur adipisicing elit. At voluptatum assumenda, quia ut ab minus qui. Velit, inventore. Delectus sequi quod quas sit, iste quo ab vitae illo nisi nam odit repellendus nesciunt tempora non quisquam voluptatibus quibusdam. Modi molestiae consequuntur beatae veritatis odio aliquid.</p>
            </div>
        </div>
        <div class="card col-4">
            <img src="img/jouet_3.jpg" class="card-img-top" alt="">
            <div class="card-body">
                <h5 class="card-title">Card_title</h5>
                <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Nisi ducimus provident quam omnis velit eligendi qui dolor ad, dolores sint reiciendis corporis vero tenetur nostrum officia deleniti cupiditate maxime, amet minima saepe? Vero recusandae id omnis, eligendi perspiciatis beatae eius nisi rem eveniet, totam iste sunt? Ut reiciendis cupiditate asperiores minus odit consequuntur, ad quam?</p>
            </div>
        </div>
        <div class="card col-4">
            <img src="img/jouet_4.jpg" class="card-img-top" alt="">
            <div class="card-body">
                <h5 class="card-title">Card_title</h5>
                <p class="card-text">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Beatae, mollitia temporibus. Sint veritatis temporibus eaque totam facilis placeat quidem voluptates tempore libero dolore non, autem qui animi, odio neque repellendus!</p>
            </div>
        </div>
        <div class="card col-4">
            <img src="img/jouet_5.jpg" class="card-img-top" alt="">
            <div class="card-body">
                <h5 class="card-title">Card_title</h5>
                <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatem accusantium blanditiis labore omnis magni repellendus dolorem, esse suscipit provident aspernatur explicabo eaque vero amet vitae sequi. Impedit quaerat maxime veniam pariatur velit hic officia dolore corrupti, qui error voluptates ipsam voluptate optio ratione animi architecto nihil iure dicta tenetur facilis..</p>
            </div>
        </div>
        <div class="card col-4">
            <img src="img/jouet_6.jpg" class="card-img-top" alt="">
            <div class="card-body">
                <h5 class="card-title">Card_title</h5>
                <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Magni sunt doloribus ipsa sequi? Impedit, nesciunt, sunt commodi illum eum sed laudantium repudiandae error eius molestias rem cumque, aut amet? Ipsa tempore iusto voluptatem, mollitia, rerum non rem corporis veniam adipisci atque fugiat sunt? Odit quo eligendi optio vel nostrum, autem voluptatum ab.</p>
            </div>
        </div>
    </main>
</body>
</html>