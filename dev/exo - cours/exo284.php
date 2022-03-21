<?php
// Dans votre répertoire de travail, créez un fichier texte.txt, et collez un paragraphe de Lorem Ipsum à l'intérieur.

// Vous pouvez récupérer du Lorem Ipsum sur https://fr.lipsum.com/feed/html 

// Déclarez une variable 'document' et affectez lui la fonction qui permet d'ouvrir les fichiers en php, avec :
// • comme premier argument, le nom de votre fichier
// • comme second argument, un mode de lecture

// Affichez le résultat de la fonction qui permet d'ouvrir des fichiers en PHP, en lui passant comme arguments :
// • votre variable 'document'
// • la fonction qui renvoie la taille d’un fichier et permet donc de lire entièrement ce fichier, en lui passant votre document en argument

$filePath = 'exo284.txt';
$document = fopen($filePath, 'r');
echo fread($document, filesize($filePath));