<?php
class Pile {
    use Recharger;
    public const MAX = 100;
    public function __construct() {
        $this->capacite = Pile::MAX;
        $this->capaciteMax = Pile::MAX;
        echo 'Nouvelle pile à ' . $this->capacite . '% <br>';
    }
    public function getUnite() {
        echo '% de batterie.<br>';
    }
}