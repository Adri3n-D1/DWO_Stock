<?php
// Créez les fichiers PHP suivant : index.php, connexion.php, compte.php et ajoututilisateur.php.
// -Dans le fichier index.php :
// Démarrez une session,

// Créez une condition afin de vérifier si une variable de session nommée 'utilisateur_co' existe et que celle-ci n'est pas vide, si c'est le cas alors renvoyez l'utilisateur vers la page compte.php, sinon :
// • Créez un formulaire HTML vers la page connexion.php avec la méthode POST et les champs suivants :
// • un champ 'mail' de type « email »,
// • un champ 'pass' de type « password ».

// -Dans le fichier connexion.php :
// Démarrez une session,
// Faites la déclaration des variables suivantes :
// • 'servername' avec la valeur « localhost »,
// • 'username' avec la valeur « root »,
// • 'password' avec comme valeur une chaine de caractère vide ou « root » (en fonctions des réglages),
// • 'dbname' avec la valeur « blog ».

// Créez un bloc try dans lequel :
// • Stockez dans une variable 'codb' une nouvelle instance de la classe PDO avec comme arguments la source de la base de données (serveur + nom de la base de données) ainsi que les variables 'username' et 'password',
// • Configurez l'attribut PDO qui sert à créer un rapport d’erreur pour qu’il émette une exception,
// • Déclarez une variable 'sql' contenant la requête préparées permettant de sélectionner les colonnes 'nom' et 'mail' dans la table 'Utilisateurs' quand la colonne 'mail' est égale au marqueur « :mail » et que la colonne 'password' est égale au marqueur « :pass »
// • Préparez la requête SQL dans une variable 'prepare'.
// • Déclarez une variable 'parametres' contenant un tableau avec les clés « :mail », « :pass » et en valeurs l'élément 'mail' de la superglobale 'POST', l'élément 'pass' de la superglobale 'POST',
// • Exécutez la requête avec en argument le tableau 'parametres',
// • Retournez une ligne de résultat (chaque couple mail/mot de passe ne peut être retrouvé qu'une fois) et stockez la dans une variable 'resultat',
// • Créez une condition afin de vérifier si la variable 'resultat' n'est pas vide :
// • si c'est le cas alors : • déclarez une variable de session nommée 'utilisateur_co' avec en valeur l'email de l'utilisateur,
// • déclarez une seconde variable de session nommée 'utilisateur_nom' avec en valeur le nom de l'utilisateur.
// • renvoyez l'utilisateur vers la page compte.php,
// • sinon affichez le message « Aucun utilisateur ne correspond.<br> »
// -Dans le fichier compte.php :
// Démarrez une session,

// Créez une condition afin de vérifier si une variable de session nommée 'utilisateur_co' existe et que celle-ci n'est pas vide, si c'est le cas alors :
// • Affichez le message « Bonjour [nom]<br> » avec la valeur de la variable de session 'utilisateur_nom',
// • Ouvrir une connexion vers la base de données 'Blog' et récupérez dans une variable 'resultat' le contenus de la table 'Roles',
// • Créez un formulaire HTML vers la page ajoututilisateur.php avec la méthode POST et les champs suivants :
// • un champ 'nom' de type « text »,
// • un champ 'mail' de type « email »,
// • un champ 'naissance' de type « number »,
// • un champ 'role' de type « select » avec une option vide et les options correspondant à chaque entrées de la table 'Roles' (utilisez la colonne 'id' pour les valeurs et la colonne 'type' pour les libellés),
// • un champ 'pass' de type « password ».

// Sinon, renvoyez l'utilisateur vers la page index.php.
// -Dans le fichier ajoututilisateur.php :
// Démarrez une session,

// Créez une condition afin de vérifier si une variable de session nommée 'utilisateur_co' existe et que celle-ci n'est pas vide, si c'est le cas alors :
// • Faites la déclaration des variables suivantes :
// • 'nom' avec pour valeur l'élément 'nom' de la superglobale 'POST',
// • 'mail' avec pour valeur l'élément 'mail' de la superglobale 'POST',
// • 'annee' avec pour valeur l'élément 'naissance' de la superglobale 'POST',
// • 'pass' avec pour valeur l'élément 'pass' de la superglobale 'POST',
// • 'role' avec pour valeur l'élément 'role' de la superglobale 'POST'.
// • Ouvrir une connexion vers la base de données 'Blog',
// • Déclarez une variable 'sql' contenant la requête préparées permettant d'insérer une nouvelle entrée dans la table 'Utilisateurs' avec les colonnes 'Nom', 'Mail', 'Password', 'AnneeNaissance' et 'Role',
// • Préparez la requête SQL dans une variable 'prepare',
// • Liez les marqueurs de la requête aux variables créées précédemment,
// • Exécutez la requête et affichez le message « Nouveau utilisateur ajouté !<br> »

// Sinon, renvoyez l'utilisateur vers la page index.php.

session_start();
if (isset($_SESSION['utilisateur_co']) && !empty($_SESSION['utilisateur_co'])) {
    header('Location: exo314_compte.php');
    die();
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <title>Exo 314 - Index</title>
</head>
<body>
    <form action="exo314_connexion.php" method="POST" class="container">
        <div class="form-group">
            <label for="form-email">Adresse email</label>
            <input type="email" class="form-control" id="form-email" name="form-email">
        </div>
        <div class="form-group">
            <label for="form-password">Mot de passe</label>
            <input type="password" class="form-control" id="form-password" name="form-password">
        </div>
        <button type="submit" class="btn btn-primary mt-2">Submit</button>
    </form>
</body>
</html>
