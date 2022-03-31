<?php
session_start();

setcookie('ageRestriction', false, -1);

session_destroy();

header('Location: index.php');
die();