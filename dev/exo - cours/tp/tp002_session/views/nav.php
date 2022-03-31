<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="views/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <title>Nav</title>
</head>
<body>
    <h1>Page de navigation</h1>
    <a href="index.php?action=logout" class="btn btn-danger">Se déconnecter</a>
    <a href="index.php?action=nav&id=articles" class="btn btn-primary">Articles</a>
    <a href="index.php?action=nav&id=movies" class="btn btn-success">Films</a>
    <a href="index.php?action=nav&id=mangas" class="btn btn-warning">Mangas</a>
    <a href="index.php?action=nav&id=cartoons" class="btn btn-secondary">Dessins animés</a>
    <a href="index.php?action=nav&id=toys" class="btn btn-info">Jouets</a>
</body>
</html>