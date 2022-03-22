<?php
// Créez les fichiers PHP suivant : index.php et humain.class.php, dans un même dossier.
// - Dans le fichier humain.class.php :
// Créez une classe nommé 'Humain'.

// Déclarez une propriété privée 'generation'.

// Déclarez une seconde propriété privée 'nom'.

// Déclarez la méthode constructeur prenant en paramètre une variable 'newNom', stockez 'newNom' dans la propriété 'nom' et stockez dans la propriété 'generation' la valeur 0.

// Déclarez ensuite la méthode clone qui incrémente la valeur de la propriété 'generation'.

// Enfin, déclarez une méthode 'getInfos' dans laquelle vous créez une condition afin de vérifier si 'generation' est différent de 0 :
// • si c'est le cas :
// • créez une variable 'texte' avec la valeur « Je suis un  »,
// • créez une boucle for où vous déclarerez la variable 'i' à 0 jusqu'à ce que 'i' soit inférieur à 'generation' dans laquelle vous ajoutez à 'texte' la chaîne « clone de  »,
// • ajoutez à 'texte' la chaîne « [nom]. Un clone de génération [generation].<br> »,
// • affichez le contenus de la variable 'texte'.
//  • sinon, affichez le message «  Je suis [nom], le vrai !<br> ».
// - Dans le fichier index.php :
// Inclure le fichier humain.class.php.

// Déclarez une variable 'obj' qui contiendra une nouvelle instance de la classe 'Humain' avec comme argument la valeur « Pierre ».

// Déclarez ensuite une variable 'obj2' qui contiendra un clone de l'objet 'obj'.

// Déclarez une troisième variable 'obj3' qui contiendra un clone de l'objet 'obj2'.
// Appelez la méthode 'getInfos' sur chacun des objets 'obj', 'obj2' et 'obj3'.

require_once('exo298_humain.class.php');

$obj = new Humain('Pierre');
$obj2 = clone $obj;
$obj3 = clone $obj2;

$obj->getInfos();
$obj2->getInfos();
$obj3->getInfos();