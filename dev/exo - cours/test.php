<?php
$my_str =
    '<p>Bonjour ' . $_POST["lname"] .
    ' votre inscription à bien été prise en compte.</p>'.
    '<p>Pour terminer votre inscription, ' .
    'un code vous a été envoyé par email à l\'adresse suivante : ' .
    $_POST["email"] . '</p>'; 


echo json_encode($my_str);