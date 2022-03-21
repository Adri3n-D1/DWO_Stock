<?php
// Créez une fonction 'addProducts' et passez lui en paramètre la variable 'productsName' précédée de l'opérateur de décomposition (...)

// Dans le corps de la fonction, créez une boucle foreach qui parcours 'productsName'

// Dans le corps de la boucle foreach, affichez pour chaque itération
// « Produit : [nomProduit] <br> »

// Appelez la fonction 'addProducts' et passez lui plusieurs arguments de type chaîne de caractère, séparés par des virgules.

function addProducts(...$productsName) {
    foreach($productsName as $value) {
        echo 'Produit : ' . $value . '<br>';
    }
}

addProducts('aaa', 'bbb', 'ccc');