<?php
// Déclarez une variable 'x' et affectez lui une valeur inférieure à 18.

// Ré-écrivez la condition suivante en utilisant la syntaxe ternaire :

// if($x <= 18){
//     echo 'Vous avez '. $x .' ans, vous êtes mineur !<br>';
// }else{
//     echo 'Vous avez '. $x .' ans, vous êtes majeur !<br>';
// }

// Affichez le résultat.

// Déclarez une variable 'y' et affectez lui une valeur supérieure à 18.

// Ré-écrivez la condition suivante en utilisant la syntaxe ternaire :

// if($y <= 18){
//     echo 'Vous avez '. $y .' ans, vous êtes mineur !<br>';
// }else{
//     echo 'Vous avez '. $y .' ans, vous êtes majeur !<br>';
// }

// Affichez le résultat.

$x = 17;
echo 'Vous avez '. $x .' ans, ' . ($x < 18 ? 'vous êtes mineur' : 'vous êtes majeur') . '!<br>';


$y = 19;
echo 'Vous avez '. $y .' ans, ' . ($y < 18 ? 'vous êtes mineur' : 'vous êtes majeur') . '!<br>';