<?php
// Créez une condition afin de vérifier si le fichier texte.txt n'existe pas :
//     • Si c'est le cas, créez une condition afin de vérifier si le fichier del.txt existe :
//     • Si c'est le cas, supprimez le fichier del.txt et affichez le message « Etape 3 : Le fichier del.txt a été supprimé. »
//     • Sinon :
//     • Créez un nouveau fichier en lecture et en écriture nommé texte.txt et stockez le dans une variable 'document',
//     • Écrire dans ce fichier la chaîne « Je suis un texte »,
//     • Affichez le message « Etape 1 : Le fichier texte.txt a été créé. ».
    
//     • Sinon :
//     • Renommez le fichier texte.txt en newtexte.txt,
//     • Affichez le message « Etape 2 : Le fichier texte.txt a été renommé en newtexte.txt. »,
//     • Créez un nouveau fichier en lecture et en écriture nommé del.txt et stockez le dans une variable 'document2',
//     • Écrire dans ce fichier la chaîne « Je suis un autre texte »,
//     • Affichez le message « Le fichier del.txt a été créé. ».

if (!file_exists('texte.txt')) {
    if (file_exists('del.txt')) {
        unlink('del.txt');
        echo 'Etape 3 : Le fichier del.txt a été supprimé.';
    }
    else {
        $document = fopen('texte.txt', 'w+');
        fwrite($document, 'Je suis un texte');
        echo 'Etape 1 : Le fichier texte.txt a été créé.';
    }
}
else {
    rename('texte.txt', 'newtexte.txt');
    echo 'Etape 2 : Le fichier texte.txt a été renommé en newtexte.txt.';
    $document2 = fopen('del.txt', 'w+');
    fwrite($document2, 'Je suis un autre texte');
    echo 'Le fichier del.txt a été créé.';
}