<?php
// Créez les fichiers PHP suivant : index.php, ingredients.namespace.php, commentaires.namespace.php et recettes.namespace.php, dans un même dossier.
// -Dans le fichier ingredients.namespace.php :
// Créez un sous espace de noms nommé 'Ingredients' de l'espace 'Recettes'.

// Créez une classe 'Ingredient' dans laquelle :
// • Faites la déclaration d'une propriété privée 'ingredients' ;
// • Déclarez la méthode constructeur qui prend en paramètre une variable 'tabIngredients' et la stocke dans la propriété 'ingredients' ;
// • Déclarez ensuite la méthode 'getIngredients' qui affiche le résultat de la fonction 'implode' prenant comme arguments une virgule (« , ») et la propriété 'ingredients' suivi d'un « <br> ».

// Définissez une fonction 'section' qui affiche le message « Section ingrédients :<br> ».
// -Dans le fichier commentaires.namespace.php :
// Créez un sous espace de noms nommé 'Commentaires' de l'espace 'Recettes'.

// Créez une classe 'Commentaire' dans laquelle :
// • Faites la déclaration d'une propriété privée 'commentaire' contenant un tableau vide ;
// • Déclarez la méthode 'setCommentaire' qui prend en paramètre une variable 'com' et l'ajoute au tableau de la propriété 'commentaire' ;
// • Déclarez ensuite la méthode 'getCommentaires' qui contient une boucle foreach pour parcourir la propriété 'commentaire' où vous déclarerez la variable 'com' pour les valeurs et dans laquelle vous affichez la valeur de 'com'.
// Définissez une fonction 'section' qui affiche le message « Section commentaires :<br> ».
// -Dans le fichier recettes.namespace.php :
// Créez un espace de noms nommé 'Recettes'.

// Inclure les fichiers ingredients.namespace.php et commentaires.namespace.php.

// Importez les éléments suivant :
// • le sous espace de noms 'Ingredients' ;
// • le sous espace de noms 'Commentaires' avec l'alias 'Com' ;
// • la classe 'Ingredient' du sous espace de noms 'Ingredients' avec l'alias 'Liste' ;
// • la fonction 'section' du sous espace de noms 'Ingredients' avec l'alias 'sectionIngredients' ;
// • la fonction 'section' du sous espace de noms 'Commentaires' avec l'alias 'sectionCommentaires' ;

// Créez une classe 'Recette' dans laquelle :
// • Faites la déclaration des propriétés privée 'ingredients', 'commentaires' et 'nom' ;
// • Déclarez la méthode constructeur qui prend en paramètre une variable 'newNom' et dans laquelle :
// • Stocker dans la propriété 'nom' la variable 'newNom';
// • Stocker dans la propriété 'commentaires' une nouvelle instance de la classe 'Commentaire' du sous espace de noms 'Commentaires'.
//  • Déclarez une méthode 'setIngredients' qui prend en paramètre une variable 'tabIngredients' et dans laquelle vous stockez dans la propriété 'ingredients' une nouvelle instance de la classe 'Ingredient' du sous espace de noms 'Ingredients' avec comme argument la variable 'tabIngredients'.
// • Déclarez ensuite une méthode 'setCommentaire' qui prend en paramètre une variable 'com' et appelle sur l'objet contenus dans la propriété 'commentaires' la méthode 'setCommentaire' prenant en argument la variable 'com'.
// • Enfin, déclarez la méthode 'getRecette' dans laquelle :
// • Affichez la propriété 'nom' ;
// • Appelez la fonction 'section' du sous espace de noms 'Ingredients' ;
// • Appelez sur l'objet contenus dans la propriété 'ingredients' la méthode 'getIngredients' ;
// • Appelez la fonction 'section' du sous espace de noms 'Commentaires' ;
// • Appelez sur l'objet contenus dans la propriété 'commentaires' la méthode 'getCommentaires' ;
// • Appelez une fonction 'fin' depuis l’espace de noms courant ;
// • Enfin, appelez une fonction 'fin' depuis l'espace global.

// Déclarez une fonction 'fin' qui affiche le message « <br>Fin de la recette. ».

// Déclarez une seconde fonction 'fin' dans l'espace global qui affiche le message « A table. ».
// -Dans le fichier index.php :
// Inclure le fichier recettes.namespace.php.

// Déclarez une variable 'obj' qui contiendra une nouvelle instance de la classe 'Recette' situé dans l'espace de noms 'Recettes' avec comme argument la valeur « Soupe ».

// Appelez la méthode 'setIngredients' sur l'objet 'obj' avec comme argument un tableau contenant les valeurs « carottes », « tomates » et « choux-fleurs ».

// Appelez ensuite la méthode 'setCommentaire' sur l'objet 'obj' avec comme argument la valeur « Super recette ! ».

// Appelez à nouveau la méthode 'setCommentaire' avec comme argument la valeur « Manque de sel... ».

// Pour finir, appelez la méthode 'getRecette' sur l'objet 'obj'.

require_once 'exo299_recettes.namespace.php';
$obj = new Recettes\Recette('Soupe');
$obj->setIngredients(['carottes', 'tomates', 'choux-fleurs']);
$obj->setCommentaire('Super recette !');
$obj->setCommentaire('Manque de sel...');
$obj->getRecette();
