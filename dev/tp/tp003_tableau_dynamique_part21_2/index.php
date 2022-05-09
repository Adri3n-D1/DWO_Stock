<?php 

define('host', 'http://localhost/DWO/dev/tp/tp003_tableau_dynamique_part21_2/');
define('ROOT', dirname(__DIR__).DIRECTORY_SEPARATOR.'tp003_tableau_dynamique_part21_2'.DIRECTORY_SEPARATOR);

require 'vendor/autoload.php';

$class = 'App\\'.$_GET['class'];
$method = $_GET['method'].'Action';

$c = new $class();
$c->$method();
die;