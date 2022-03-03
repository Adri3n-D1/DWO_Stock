<?php

$classe = [
    'eleve1' => [
        'nom' => 'Albert',
        'prénom' => 'Bo',
        'note' => [15, 20, 18, 17, 15]
    ],
    'eleve2' => [
        'nom' => 'Jo',
        'prénom' => 'Azer',
        'note' => [12, 19, 18, 19, 20]
    ]
];

foreach($classe as $key => $eleve) {
    echo $key . "<br>";
    foreach($eleve as $key2 => $tab) {
        echo $key2 . '<br>';
        if () {

        }
        echo $tab . '<br>';

    }
}