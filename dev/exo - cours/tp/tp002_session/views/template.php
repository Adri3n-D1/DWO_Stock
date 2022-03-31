<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="views/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <title><?= $titleTabPage ?></title>
</head>
<body>
    <header>
        <h1><?= $titlePage ?></h1>
        <nav>
            <a href="index.php?action=logout" class="btn btn-danger">Se déconnecter</a>
            <a href="index.php?action=nav" class="btn btn-success">Navigation</a>
        </nav>
    </header>
    <main class="row">
        <?= $content ?>
    </main>
</body>
</html>