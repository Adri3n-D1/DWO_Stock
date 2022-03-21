<?php
// Déclarez une variable 'price' et affectez lui une valeur numérique

// Afficher la valeur « Prix hors taxe : [price]<br> »

// Créez une fonction 'addTVA' et passez-lui comme paramètre une variable 'x'

// Dans la fonction :
// • Affectez à la variable 'x' la valeur 'x' + 'x' / 100 x 20
// • Afficher la valeur « Le prix majoré est : [x] »

// Appelez la fonction et passez lui en argument la variable 'price'

$price = 100;
echo 'Prix hors taxe : ' . $price . '<br>';

function addTVA($x) {
    $x = $x + $x / 100 * 20;
    echo 'Le prix majoré est : ' . $x;
}
addTVA($price);