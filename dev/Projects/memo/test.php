<?php

$nb1 = 70;
$nb2 = 0;

try {
    if ($nb2 == 0) {
        throw new Exception("Division par zero impossible");
    }
}
catch(Exception $e) {
    echo $e->getMessage();
}