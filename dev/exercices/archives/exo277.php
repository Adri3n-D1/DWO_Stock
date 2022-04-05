<?php
// Créez une fonction 'sayHello' qui prend 2 paramètres : 'prenom' et 'nom'

// Dans le corps de la fonction, retournez « Bonjour [prenom] [nom]<br> ».

// À l'extérieur de la fonction, déclarez une variable 'displayResult' et affectez lui la fonction, à qui vous passez en argument un prénom et un nom

// Affichez la variable 'displayResult'

function sayHello($prenom, $nom) {
    echo  'Bonjour ' . $prenom . ' ' . $nom . '<br>';
}

$displayResult = sayHello('John', 'Doe');

echo $displayResult;