<?php

namespace Recettes {
    require_once 'exo299_ingredients.namespace.php';
    require_once 'exo299_commentaires.namespace.php';

    use Recettes\Ingredients;
    use Recettes\Commentaires as Com;
    use Recettes\Ingredients\Ingredient as Liste;

    use function Recettes\Ingredients\section as sectionIngredients;
    use function Recettes\Commentaires\section as sectionCommentaires;

    class Recette {
        private $ingredients;
        private $commentaires;
        private $nom;

        public function __construct($newNom) {
            $this->nom = $newNom;
            $this->commentaires = new Com\Commentaire();
        }
        public function setIngredients($tabIngredients) {
            $this->ingredients = new Liste($tabIngredients);
        }
        public function setCommentaire($com) {
            $this->commentaires->setCommentaire($com);
        }
        public function getRecette() {
            echo $this->nom . '<br>';
            sectionIngredients();
            $this->ingredients->getIngredients();
            sectionCommentaires();
            $this->commentaires->getCommentaires();
			namespace\fin();
			\fin();
        }
    }
    function fin() {
        echo '<br>Fin de la recette.';
    }
}
namespace {
    function fin() {
        echo '<br>A table.';
    }
}
