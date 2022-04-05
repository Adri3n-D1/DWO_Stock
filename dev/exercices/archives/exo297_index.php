<?php
// Créez les fichiers PHP suivant : index.php et fibonacci.class.php, dans un même dossier.
// - Dans le fichier fibonacci.class.php :
// Créez une classe nommée 'Fibonacci'.

// Déclarez une propriété privée 'tableau' qui contient un tableau vide.

// Déclarez une seconde propriété privée 'max'.

// Déclarez la méthode constructeur prenant en paramètre une variable 'newValeurMax', stockez 'newValeurMax' dans la propriété 'max'.

// Implémentez la méthode 'rewind' qui ajoute la valeur 0 dans la tableau 'tableau' et affiche le message « Les [max] premiers éléments de la suite de Fibonacci : <br> ».

// Implémentez la méthode 'current' qui retourne la valeur de l’élément courant du tableau 'tableau'.

// Implémentez la méthode 'key' qui retourne la clef liée à la valeur de l’élément courant du tableau 'tableau' plus 1.

// Implémentez ensuite la méthode 'next' dans laquelle vous :
// • créez une condition afin de vérifier si la clef liée à la valeur de l’élément courant du tableau est égale à 0 :
// • si c'est le cas, ajoutez la valeur de l’élément courant du tableau 'tableau' plus 1 au tableau 'tableau',
// • sinon, ajoutez la valeur de l’élément courant du tableau 'tableau' plus la valeur de l’élément clé de l’élément courant moins 1 au tableau 'tableau'.
//  • Avancez le pointeur interne du tableau 'tableau' d’un élément et retournez la valeur de l’élément au niveau duquel se situe le pointeur.

// Enfin, implémentez la méthode 'valid' qui :
// • stocke dans une variable 'tab' la comparaison nombre d'éléments dans le tableau 'tableau' inférieur ou égal à la propriété 'max',
// • retourne la variable 'tab'.
// - Dans le fichier index.php :
// Inclure le fichier fibonacci.class.php.

// Déclarez une variable 'suite' qui contiendra une nouvelle instance de la classe 'Fibonacci' avec comme argument la valeur 15.

// Créez ensuite une boucle foreach pour parcourir l'objet 'suite' où vous déclarerez la variable 'clef' pour les clefs et la variable 'valeur' pour les valeurs dans laquelle vous affichez le message « L'élément numéro [clef] est [valeur]<br> ».

require_once 'exo297_fibonacci.class.php';

$suite = new Fibonacci(15);

foreach ($suite as $clef => $valeur) {
    echo 'L\'élément numéro ' .$clef. ' est ' .$valeur. '<br>';
}