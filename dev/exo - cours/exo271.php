<form method='post' action='exo271.php'>
    <label for='digit'>Choisissez un chiffre en 0 et 3 :</label><br>
    <input type="number" name="digit" id="digit"  min="0" max="8"><br>
    <input type='submit' value='Envoyer'>
</form>

<?php
// Copiez ce code dans votre fichier index.php, à l'extérieur des balises « < ?php » et « ? >; »
// <form method='post' action='index.php'>
//     <label for='digit'>Choisissez un chiffre en 0 et 3 :</label><br>
//     <input type="number" name="digit" id="digit"  min="1" max="8"><br>
//     <input type='submit' value='Envoyer'>
// </form>
// L'utilisateur peut choisir un chiffre entre 0 et 8, mais la consigne est de choisir un nombre entre 0 et 3. Écrivez l'instruction switch de façon à ce que :
// • si l'utilisateur choisit un chiffre compris entre 0 et 3, le chiffre s'affiche ;
// • sinon, l'information selon laquelle le nombre choisi n'est pas compris entre 0 et 3 apparaît.

// Encadrez votre instruction switch avec le code suivant pour ne pas avoir d'erreurs
// if(isset($_POST['digit']) && !empty($_POST['digit'])) 
// {
//     // Votre code ici.
// }

if(isset($_POST['digit']) && !empty($_POST['digit'])) {
    switch($_POST['digit']) {
        case 0:
        case 1:
        case 2:
        case 3:
            echo $_POST['digit'];
            break;
        default:
            echo 'Le nombre choisi n\'est pas compris entre 0 et 3 !';            
    }
}
?>