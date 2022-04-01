<?php
// Créez les fichiers PHP suivant : index.php et test.class.php, dans un même dossier
// -Dans le fichier test.class.php :
// Créez une classe nommée 'Test''.

// Déclarez la méthode constructeur qui prend en paramètre une variable 'var' et l'affiche.
// -Dans le fichier index.php :
// Créez un bloc try dans lequel :

// Créez une condition afin de vérifier si le fichier fruits.class.php existe :
// • Si c'est le cas, inclure le fichier fruits.class.php,
// • Sinon, définir une exception qui contient le message « Le fichier fruits.class.php n'existe pas. Impossible de charger la classe. »

// Ajoutez ensuite un bloc pour attraper l’exception dans lequel vous afficherez « Message d'erreur : [erreur]<br><br> »

// Pour finir, ajoutez un bloc qui sera toujours exécuté et qui inclus le fichier test.class.php.

// Définissez une fonction 'init' prenant en paramètres une variable 'classe' et une variable 'arg' ayant comme valeur par défaut un tableau vide.

// A l'intérieur de la fonction 'init' créez un bloc try qui retourne une nouvelle instance de la classe passé dans le paramètre 'classe' et passez lui en argument le paramètre 'arg' avec l'opérateur de décomposition avant l'argument.

// Ajoutez ensuite un bloc pour attraper l’erreur dans lequel vous afficherez « Message d'erreur : [erreur]<br> ».

// Affichez également le message « L'erreur est apparu dans le fichier [file] à la ligne [line]<br><br> » avec 'file' et 'line' équivalent au fichier et à la ligne où c'est produit l'erreur.

// Déclarez une variable 'obj1' et affectez lui comme valeur le résultat de la fonction 'init' avec comme arguments « Test » et un tableau contenant la chaîne « Je suis un objet de la classe Test ».

// Déclarez une deuxième variable 'obj2' et affectez lui comme valeur le résultat de la fonction 'init' avec comme argument « Fruits ».

// Déclarez une dernière variable 'obj3' et affectez lui comme valeur le résultat de la fonction 'init' avec comme argument « Test ».

try {
    if (file_exists('fruits.class.php')) {
        include 'fruits.class.php';
    }
    else {
        throw new Exception('Le fichier fruits.class.php n\'existe pas. Impossible de charger la classe.');
    }
}
catch (Exception $e) {
    echo 'Message d\'erreur : ' . $e->getMessage() . '<br><br>';
}
finally {
    include 'exo301_test.class.php';
}

function init($classe, $arg=[]) {
    try {
        return new $classe(...$arg);
    }
    catch (Error $e) {
        echo 'Message d\'erreur : ' . $e->getMessage() . '<br><br>';
        echo 'L\'erreur est apparu dans le fichier ' . $e->getfile() . ' à la ligne ' . $e->getLine() . '<br><br>';
    }
}

$obj1 = init('Test', ['Je suis un objet de la classe Test']);
$obj2 = init('Fruits');
$obj3 = init('Test');