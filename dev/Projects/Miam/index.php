<?php

// Nom de la release = Nom du dossier
define('release_name', 'miam_0.0.0-alpha');

// Chemin absolu du projet actuel
define('ROOT', dirname(__DIR__) . DIRECTORY_SEPARATOR . release_name . DIRECTORY_SEPARATOR);
define('host', 'http://localhost/miam/' . release_name);

function pageNotFound() {
    /* Appel la page d'erreur 404 */
    require_once('controller/MainController.php');
    $mainController = new MainController();
    $mainController->pageNotFoundAction();
    die;
}

$className = '';
$methodName = '';

// Test si les cibles on été renseignées
if (!isset($_GET['class']) || !isset($_GET['method'])) {
    pageNotFound();
}

// Récupere les données reçues
$className = htmlentities($_GET['class']);
$methodName = htmlentities($_GET['method'] . 'Action');

// Créé le chemin relatif du fichier de la classe cible
$classFilePath = 'controller/'.$className.'.php';

// Test si le fichier de la classe cible existe
if (!file_exists($classFilePath) || !is_readable($classFilePath)) {
    pageNotFound();
}

// Inclut le fichier demandé
require_once $classFilePath;

// Test si la classe cible ainsi que la méthode cible existe
if (!class_exists($className) || !method_exists($className, $methodName)) {
    pageNotFound();
}

// Instancie la classe cible
$class = new $className();

// Appelle la méthode cible
$class->$methodName();

// Fin du programme
die;