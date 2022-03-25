<?php
namespace Recettes\Ingredients {
    class Ingredient {
        private $ingredients;
        public function __construct($tabIngredients) {
            $this->ingredients = $tabIngredients;
        }
        public function getIngredients() {
            echo implode($this->ingredients) . '<br>';
        }
    }
    function section() {
        echo 'Section ingrédients :<br>';
    }
}