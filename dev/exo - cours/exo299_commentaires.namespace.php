<?php
namespace Recettes\Commentaires {
    class Commentaire {
        private $commentaires = [];
        public function setCommentaire($com) {
            $this->commentaires[] = $com;
        }
        public function getCommentaires() {
            foreach ($this->commentaires as $com) {
                echo $com . '<br>';
            }
        }
    }
    function section() {
        echo 'Section commentaires :<br>';
    }
}