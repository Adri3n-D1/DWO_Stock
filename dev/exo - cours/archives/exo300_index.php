<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exo300</title>
</head>
<body>

    <form method='post' action='exo300_index.php'>
        <label for='com'>Entrez un commentaire :</label>
        <br>
        <textarea id="com" name="com">
            <script>alert("Ce que l'on ne veut pas !");</script>
        </textarea>
        <br>
        <input type='submit' value='Envoyer'>
    </form>

</body>
</html>

<?php
// Créez le fichier PHP suivant : index.php
// Dans le fichier index.php :
// Reprenez le formulaire HTML suivant :
// <form method='post' action='index.php'>
//     <label for='com'>Entrez un commentaire :</label>
//     <br>
//     <textarea id="com" name="com">
//         <script>alert("Ce que l'on ne veut pas !");</script>
//     </textarea>
//     <br>
//     <input type='submit' value='Envoyer'>
// </form>

// Créez une condition afin de vérifier si la superglobale 'POST' contient bien un élément 'com' ET que celui-ci n'est pas vide. Si c'est le cas :
// • Utilisez le filtre de nettoyage qui transforme en entité HTML les caractères « ‘ »<>& » et supprime ou encode les autres caractères spéciaux puis récupérez le résultat (la valeur filtrée) dans une variable 'comEncode'.
// • Utilisez le filtre de nettoyage qui supprime les balises, et supprime ou encode les caractères spéciaux puis récupérez le résultat (la valeur filtrée) dans une variable 'comBalises'.
// • Affichez le message « Valeur encodée : [x] <br>Valeur sans balises : [y] <br>Valeur originale : [z]<br> » avec 'x' équivalent à la valeur de 'comEncode', 'y' équivalent à la valeur de 'comBalises' et 'z' équivalent à la valeur de l'élément 'com' de la superglobale 'POST'.

// Testez une première fois avec la valeur par défaut du formulaire puis une seconde fois avec la valeur « &lt;M&amp;M's&gt; » pour observer les différents comportements.

if (isset($_POST['com']) && !empty($_POST['com'])) {
    $comEncode = filter_input(INPUT_POST, 'com', FILTER_SANITIZE_SPECIAL_CHARS);
    $comBalise = filter_input(INPUT_POST, 'com', FILTER_SANITIZE_STRING);
    // $comEncode = htmlspecialchars($_POST['com']);
    // $comBalise = strip_tags($_POST['com']);
    echo 'Valeur encodée : ' . $comEncode . ' <br>Valeur sans balises : ' . $comBalise . ' <br>Valeur originale : ' . $_POST['com'] . '<br>';
}