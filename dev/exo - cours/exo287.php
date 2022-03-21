<?php
// Créez une nouvelle fonction 'formaterChaine' et passez lui comme paramètre la variable 'chaine' .

// Dans le corps de la fonction 'formaterChaine' :
// • Faites la déclaration des variables suivantes :
// • 'masque' avec l'expression régulière pour indiquer qu’on recherche le caractère « @ »
// • 'masque2' avec l'expression régulière pour indiquer qu’on recherche les caractères « le » insensible à la casse,
// • 'masque3' avec l'expression régulière pour indiquer qu’on recherche le caractère « - ».
// • Créez une condition afin de vérifier si le masque contenu dans 'masque' est trouvé dans la chaîne de caractères 'chaine' :
// • si c'est le cas alors :
// • éclatez la chaîne de caractères 'chaine' selon le masque contenu dans 'masque' et stockez le résultat dans une variable 'tableau',
// • recherchez le masque contenu dans 'masque2' dans la variable tableau 'tableau' et stockez les résultats trouvés dans une variable 'resultat',
// • Créez une condition afin de vérifier si la variable 'resultat' est vide :
// • si c'est le cas alors affichez le message « La chaîne "xxx" ne contient pas les caractères "le" »,
// • sinon, créez une boucle 'foreach' pour parcourir le tableau 'resultat' où vous déclarerez la variable 'clef' pour les clefs et la variable 'valeur' pour les valeurs dans laquelle :
// • recherchez et remplacez le masque contenu dans 'masque3' dans la variable 'valeur' et stocker le résultat dans une variable 'remplace' (si le schéma de recherche n’est pas trouvé dans la chaîne de caractères, renvoyez la chaine de caractères de départ ),
// • affichez le contenu de 'remplace'.
//  • sinon, affichez le message « La chaine "xxx" ne contient pas le caractère "@" ».

// Faites la déclaration des variables suivantes :
// • 'str1' avec la valeur « johndoe@Les-roses-sont-rouges@les-violettes-sont bleues@php-est-fantastique@le sucre est doux@la-mer est-turquoise »,
// • 'str2' avec la valeur « Bonjour le monde ! »,
// • 'str3' avec la valeur « Hello W@rld ».

// Appelez la fonction 'formaterChaine' pour chacune des 3 variables déclarées précédemment.

function formaterChaine($chaine) {
    $masque = '/@/';
    $masque2 = '/le/i';
    $masque3 = '/-/';
    if (preg_match($masque, $chaine)) {
        $tableau = preg_split($masque, $chaine);
        $resultat = preg_grep($masque2, $tableau);
        if (empty($resultat)) {
            echo 'La chaine "' . $chaine . '" ne contient pas les caractères "le"';
        }
        else {
            foreach ($resultat as $clef => $valeur) {
                $remplace = preg_replace($masque3, ' ', $valeur);
                echo $remplace.' ';
            }
        }
    }
    else {
        echo 'La chaine "' . $chaine . '" ne contient pas le caractère "@"';
    }
}

$str1 = 'johndoe@Les-roses-sont-rouges@les-violettes-sont bleues@php-est-fantastique@le sucre est doux@la-mer est-turquoise';
$str2 = "Bonjour le monde !";
$str3 = "Hello W@rld";

formaterChaine($str1);
echo '<br />';
formaterChaine($str2);
echo '<br />';
formaterChaine($str3);