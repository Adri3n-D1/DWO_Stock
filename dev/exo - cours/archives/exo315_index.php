<?php
/*Reprenez les fichiers PHP suivant du cas précédent : index.php, connexion.php, compte.php et ajoututilisateur.php.
-Dans le fichier index.php :
• Modifiez le formulaire pour que les champs 'mail' et 'pass' doivent être automatiquement remplis.

-Dans le fichier connexion.php :
Créez une fonction 'valid_donnees' qui prend un parametre 'donnees' et exécute les fonctions trim, stripslashes et htmlspecialchars sur la variable 'donnees' avant de la retourner.

Utilisez votre fonction 'valid_donnees' sur les données du formulaire utilisées.

-Dans le fichier compte.php :
Modifiez le formulaire pour que :
• tous les champs doivent être automatiquement remplis,
• le champ 'nom' soit limité à 40 caractères,
• la valeur du champ 'naissance' soit comprise entre 1950 et 2005,
• le champ 'password' doit respecter l'expression régulière qui indique qu’on recherche une chaîne d'au moins 12 caractères contenant des lettres de « a » à « z » (minuscules et majuscules), des chiffres de 0 à 9 et les caractères « ! @ # $ % & * - _ + , . ? ».

-Dans le fichier ajoututilisateur.php :
Créez une fonction 'valid_donnees' qui prend un parametre 'donnees' et exécute les fonctions trim, stripslashes et htmlspecialchars sur la variable 'donnees' avant de la retourner.

Utilisez votre fonction 'validdonnees' sur les données du formulaire utilisées.

Ajoutez une condition qui vérifie que :
• la variable 'nom' n'est pas vide,
• ET que la variable 'nom' ne fasse pas plus de 40 caractères,
• ET que la variable 'nom' est composée uniquement des lettres de « a » à « z » (minuscules et majuscules) et des caractères «  '- » (espace, tiret et apostrophe),
• ET que la variable 'mail' n'est pas vide,
• ET que la variable 'mail' ait bien la forme attendue à l'aide des filtres,
• ET que la variable 'annee' n'est pas vide,
• ET que la 'annee' est comprise entre 1950 et 2006 (inclus),
• ET que la variable 'pass' n'est pas vide,
• ET que la variable 'pass' est composée d'au moins 12 caractères contenant des lettres de « a » à « z » (minuscules et majuscules), des chiffres de 0 à 9 et les caractères « ! @ # $ % & * -  + , . ? »
• ET que la variable 'role' n'est pas vide,

Si c'est le cas, exécutez votre bloc try/catch pour l'insertion des données, sinon, renvoyez l'utilisateur vers la page compte.php.*/

session_start();
if (isset($_SESSION['utilisateur_co']) && !empty($_SESSION['utilisateur_co'])) {
    header('Location: exo315_compte.php');
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
    <title>Exo 315 - Index</title>
</head>
<body>
    <form action="exo315_connexion.php" method="POST" class="container">
        <div class="form-group">
            <label for="form-email">Adresse email</label>
            <input type="email" class="form-control" id="form-email" name="form-email" required>
        </div>
        <div class="form-group">
            <label for="form-password">Mot de passe</label>
            <input type="password" class="form-control" id="form-password" name="form-password" required>
        </div>
        <button type="submit" class="btn btn-primary mt-2">Submit</button>
    </form>
</body>
</html>
