<?php
class Rectangle {
    protected $longueur;
    protected $largeur;
    protected $perimetre;

    public function __construct($newLongueur, $newLargeur) {
        $this->longueur = $newLongueur;
        $this->largeur = $newLargeur;
    }
    public function setPerimetre() {
        $this->perimetre = 2 * ($this->longueur + $this->largeur);
    }
    public function getPerimetre() {
        return $this->perimetre;
    }
}