<?php
// Créez une nouvelle fonction 'testEmail' et passez lui comme paramètre la variable 'chaine'.

// Dans le corps de la fonction 'testEmail' :
// • Faites la déclaration de la variable 'masque' avec l'expression régulière pour indiquer qu’on recherche :
// • une chaîne qui commence par un sous-masque comprenant une classe tous les caractères de a à z (minuscules), les nombres de 0 à 9, les points « . », les tirets « - » et les underscores « _ » et composé de 1 à 15 caractères,
// • le caractère arobase « @ »,
// • un sous-masque comprenant une classe de tous les caractères de « a » à « z » (minuscules), les nombres de 0 à 9 et les tirets « - » et composé d'au moins un caractère,
// • le caractère point « @ »,
// • un sous-masque comprenant la séquence de caractères « fr » ou « com » ou « org ».

// • Créez une condition afin de vérifier si le masque contenus dans 'masque' est trouvé dans la chaîne de caractères 'chaine' :
// • si c'est le cas alors :
// • affichez le message « "xxx" est une adresse email valide »,
// • Faites la déclaration de la variable 'masque2' avec l'expression régulière pour indiquer qu’on recherche :
// • une chaîne qui se termine par un sous-masque comprenant les caractères « fr » directement précédé du caractère point « . ».
//  • Créez une condition afin de vérifier si le masque contenus dans 'masque2' est trouvé dans la chaîne de caractères 'chaine' :
// • si c'est le cas alors affichez le message « et est une adresse email en ".fr" »,
// • sinon, affichez le message « La chaine "xxx" ne contient pas les caractères "le" ».
//  • sinon, affichez le message « et n'est pas une adresse email en ".fr" ».

// Faites la déclaration des variables suivantes :
// • 'email1' avec la valeur « contact@codeur.fr »
// • 'email2' avec la valeur « contact@codeur.com »
// • 'email3' avec la valeur « jesuisuneadressetroplongue@codeur.fr »
// • 'email4' avec la valeur « a.francis@codeur.org »

// Appelez la fonction 'testEmail' pour chacune des 4 variables déclarées précédemment.

function testEmail($chaine) {
    $masque = '/^([a-z0-9&_\-\.]{1,15})@([a-z0-9\-]+)\.(fr|com|org)/';
    if (preg_match($masque, $chaine)) {
        echo $chaine . ' est une adresse email valide';
        $masque2 = '/((?<=\.)fr)$/';
        if (preg_match($masque2, $chaine)) {
            echo ' et est une adresse email en ".fr"';
        }
        else {
            echo ' et n\'est pas une adresse email en ".fr"';
        }
    }
    else {
		echo '"' . $chaine . '" n\'est pas une adresse email valide';
	}
}

$email1 = "contact@codeur.fr";
$email2 = "contact@codeur.com";
$email3 = "jesuisuneadressetroplongue@codeur.fr";
$email4 = "a.francis@codeur.org";

testEmail($email1);
echo "<br />";
testEmail($email2);
echo "<br />";
testEmail($email3);
echo "<br />";
testEmail($email4);