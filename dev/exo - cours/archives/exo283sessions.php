<?php
session_start();

if (isset($_SESSION['pages'])) {
    $_SESSION['pages']++;
}
else {    
    $_SESSION['pages'] = 1;
}

if (isset($_SESSION['pages'])) {
    echo 'Nombre de page(s) visitée(s) : ' . $_SESSION['pages'] . '<br>';
}

echo ('<a href="exo283.php">index.php</a><br>');
echo ('<a href="exo283page.php">page.php</a><br>');
echo ('<a href="exo283reset.php">reset.php</a><br>');
