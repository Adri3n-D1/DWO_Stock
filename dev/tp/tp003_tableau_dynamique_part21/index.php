<?php

define('ROOT', dirname(__DIR__).DIRECTORY_SEPARATOR.'tp003_tableau_dynamique_part21'.DIRECTORY_SEPARATOR);
define('host', 'http://localhost/DWO/dev/tp/tp003_tableau_dynamique_part21/');

$class = $_GET['class'];
$method = $_GET['method'].'Action';

require 'controller/'.$class.'.php';

$c = new $class();
$c->$method();
die;