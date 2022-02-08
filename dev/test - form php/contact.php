<?php require_once("data_form.php") ?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact</title>
</head>
<body>
    <form action="form_analysis.php" method="post">
        <div class="input-first-name">
            <label for="user-first-name">Votre prénom</label>
            <input type="text" name="user-first-name" id="user-first-name" value="<?= $_SESSION["form"]["first-name"]['value'] ?>">
        </div>
        <div class="input-last-name">
            <label for="user-last-name">Votre prénom</label>
            <input type="text" name="user-last-name" id="user-last-name" value="<?= $_SESSION["form"]["last-name"]['value'] ?>">
        </div>
        <input type="submit">
    </form>
</body>
</html>