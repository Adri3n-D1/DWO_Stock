<?php
session_start();

if (isset($_COOKIE['ageRestriction'])) {
    $_SESSION['login'] = true;
    $_SESSION['isMajor'] = $_COOKIE['ageRestriction'];

    header('Location: nav.php');
    die();
}


if (isset($_SESSION['login'])) {
    unset($_SESSION['login']);
}
if (isset($_SESSION['isMajor'])) {
    unset($_SESSION['isMajor']);
}
if (isset($_SESSION['ageRestriction'])) {
    ?>
        <div class="alert alert-danger" role="alert">
            Cette page est réservée au <?= $_SESSION['ageRestriction'] ?> !
        </div>
    <?php    
    unset($_SESSION['ageRestriction']);
}
$validData = false;
// Si le formulaire à bien été envoyé
if (isset($_POST['form-email'], $_POST['form-password'], $_POST['form-age'])) {
    $validData = true;
    // Si un champs est vide afficher un message
    if (empty($_POST['form-email'])) : ?>
            <div class="alert alert-danger" role="alert">
                Veuillez saisir un email correct !
            </div>
        <?php
        $validData = false;
    endif;
    if (empty($_POST['form-password'])) : ?>
            <div class="alert alert-danger" role="alert">
                Veuillez saisir un mot de passe correct !
            </div>
        <?php
        $validData = false;    
    endif;
    if (empty($_POST['form-age'])) : ?>
            <div class="alert alert-danger" role="alert">
                Veuillez saisir un age correct !
            </div>
        <?php
        $validData = false;
    endif;
}

if ($validData) {
    $_SESSION['login'] = true;
    $_SESSION['isMajor'] = ($_POST['form-age'] >= 18);

    if (isset($_POST['form-remember'])) {
        setcookie('ageRestriction', $_SESSION['isMajor'], time() + 3600 * 24);
    }

    header('Location: nav.php');
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
    <title>Connexion</title>
</head>
<body>

    <form action="index.php" method="post">
        <div class="mb-3">
            <label for="form-email" class="form-label">Email</label>
            <input type="email" class="form-control" id="form-email" name="form-email">
        </div>
        <div class="mb-3">
            <label for="form-password" class="form-label">Password</label>
            <input type="password" class="form-control" id="form-password" name="form-password">
        </div>
        <div class="mb-3">
            <label for="form-age" class="form-label">Age</label>
            <input type="number" class="form-control" id="form-age" name="form-age">
        </div>
        <div class="mb-3 form-check">
            <input type="checkbox" class="form-check-input" id="form-remember" name="form-remember">
            <label class="form-check-label" for="form-remember">Remember me</label>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>

    </form>
</body>
</html>
