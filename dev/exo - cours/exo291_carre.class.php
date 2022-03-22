<?php
class Carre extends Rectangle {
    private $couleur;
    public function __construct($newCote) {
        parent::__construct($newCote, $newCote);
    }
    public function setCouleur($newCouleur) {
        $this->couleur = $newCouleur;
    }
    public function getCouleur() {
        echo 'Le carré est ' . $this->couleur . '<br>';
    }
}