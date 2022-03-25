<form method='post' action='exo285.php'>
    <label for='titre'>Entrez un nom de fichier :</label><br>
    <input type="text" name="titre" id="titre"><br>
    <label for='com'>Entrez un commentaire :</label><br>
    <textarea id="com" name="com"></textarea><br>
    <input type='submit' value='Envoyer'>
</form>

<?php
// Reprenez le formulaire HTML suivant :
//     <form method='post' action='index.php'>
//         <label for='titre'>Entrez un nom de fichier :</label><br>
//         <input type="text" name="titre" id="titre"><br>
//         <label for='com'>Entrez un commentaire :</label><br>
//         <textarea id="com" name="com"></textarea><br>
//         <input type='submit' value='Envoyer'>
//     </form>

//     Créez une condition afin de vérifier si la superglobale 'POST' contient bien un élément 'com' ET la superglobale 'POST' contient également un élément 'titre' ET que celui-ci n'est pas vide. Si c'est le cas :
//     • Déclarez une variable 'titre' dans laquelle vous utiliserez la concaténation afin d'obtenir l'élément 'titre' de la superglobale 'POST' auxquel vous ajouterez la chaîne « .txt ».
//     • Créez un nouveau fichier en lecture et en écriture nommé avec la valeur de la variable 'titre' et stockez le dans une variable 'document'.
//     • Écrire dans le fichier le contenus de l'élément 'com' de la superglobale 'POST'.
//     • Fermez le fichier.
//     • Lire le fichier et affichez son contenus.

if (isset($_POST['com']) && isset($_POST['titre']) && !empty($_POST['titre'])) {
    $titre = $_POST['titre'] . '.txt';
    file_put_contents($titre, $_POST['com']);
    echo fread(fopen($titre, 'r'), filesize($titre));
}
?>