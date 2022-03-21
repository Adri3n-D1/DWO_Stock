<?php
// Créez une condition afin de vérifier si une variable de session nommée 'pages' existe, si c'est le cas alors incrémentez la valeur de la variable de session 'pages', sinon, initialisez la valeur de la variable de session 'pages' à 1

// Créez une seconde condition afin de vérifier si une variable de session nommée 'pages' existe, si c'est le cas alors affichez « Nombre de page(s) visitée(s) : |x] » avec 'x' la valeur de la variable de session 'pages'

// Enfin, définissez 3 liens html vers les pages index.php, page.php et reset.php.
// - Dans les fichiers index.php et page.php :
//      Inclure le fichier sessions.php
// - Dans le fichier reset.php :
//      Inclure le fichier sessions.php
//      Détruisez la variable de session nommée 'pages'

// Détruisez la session
// Affichez le message « Les informations de sessions ont été détruites ».

require_once('exo283sessions.php');
