<?php
class Voiture {
    use Recharger, Rouler {
        Rouler::utiliser insteadof Recharger;
    }
    public function __construct($newMax) {
        $this->capaciteMax = $newMax;
        echo 'Nouvelle voiture avec un réservoir de ' . $this->capaciteMax . ' L<br>';
    }
    public function recharger() {        
        $this->capacite = $this->capaciteMax;
        echo 'Le plein est fait.<br>';
        return $this;
    }
    public function getUnite() {
        echo 'L de carburant.';
    }


}