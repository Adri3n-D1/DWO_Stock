<?php
// Créez une condition afin de vérifier si un cookie nommé 'actualisation' existe :
//     • si c'est le cas alors :
//     • Affichez « La page a été actualisé [x] fois » avec 'x' la valeur du cookie 'actualisation',
//     • Créez une condition afin de vérifier si la valeur du cookie actualisation est supérieur ou égal à 10, si c'est le cas alors supprimez le cookie 'actualisation', sinon, incrémentez la valeur du cookie 'actualisation'.
//     • si le cookie n'existe pas :
//     • Affichez le message « La page ne contient pas de cookie »,
//     • Créez un cookie avec les paramètres suivant :
//     • le nom du cookie est 'actualisation',
//     • sa valeur est 1 (nombre entier),
//     • sa date d'expiration est dans 2 jours (48h).


setcookie('actualisation', '', time() - 3600);

if (isset($_COOKIE['actualisation'])) {
    echo 'La page a été actualisé ' . $_COOKIE['actualisation'] . ' fois';

    if ($_COOKIE['actualisation'] >= 10) {
        setcookie('actualisation', '', time() - 3600);
    }
    else {
        setcookie('actualisation', ++$_COOKIE['actualisation']);
    }
}
else {
    echo 'La page ne contient pas de cookie';
    setcookie('actualisation', 1, time() + 2 * 24 * 3600);
}