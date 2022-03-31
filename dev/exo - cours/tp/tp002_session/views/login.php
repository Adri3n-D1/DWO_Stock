<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="views/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <title>Connexion</title>
</head>
<body>

    <h1>Connexion</h1>
    <form action="index.php?action=form_analysis" method="post">

        <?php
        if (isset($_SESSION['errorInput'])) {
        ?>
            <div class="alert alert-danger" role="alert">
                Veuillez saisir un <?= strip_tags($_SESSION['errorInput'])?> correct !
            </div>
        <?php
        unset($_SESSION['errorInput']);
        }
        ?>
        <?php
        if (isset($_SESSION['errorAccess'])) {
        ?>
            <div class="alert alert-danger" role="alert">
                Ce contenu est réservé au <?= strip_tags($_SESSION['errorAccess'])?> !
            </div>
        <?php
        unset($_SESSION['errorAccess']);
        }
        ?>
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