<?php
// Créez une fonction 'tax' et passez lui :
// • comme premier paramètre la variable 'x' : indiquez qu’on souhaite passer un argument par référence pour la variable 'x'
// • comme second paramètre la variable 'y' , à laquelle vous affecterez une valeur par défaut de « 20 ».

// Dans le corps de la fonction, affectez à la variable 'x' la valeur 'x' + 'x' / 100 * 'y'

// Déclarez une variable 'firstPrice' et affectez lui une valeur numérique

// Appelez la fonction 'tax' et passez-lui en argument la variable 'firstPrice'

// Affichez « Le prix majoré est [firstPrice]<br> »

// Déclarez une variable 'secondPrice' et affectez lui une valeur numérique

// Appelez la fonction 'tax' et passez-lui :
// • en premier argument la variable 'secondPrice'
// • en second argument une valeur numérique correspond à la taxe que vous souhaitez appliquer
// • Affichez « Le prix majoré est [secondPrice] »

function tax(&$x, $y=20) {
    $x = $x + $x / 100 * $y;
}

$firstPrice = 100;

tax($firstPrice);
echo 'Le prix majoré est ' . $firstPrice . '<br>';


$secondPrice = 200;
tax($secondPrice, 15);
echo 'Le prix majoré est ' . $secondPrice;