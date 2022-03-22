<?php
class Voiture implements Vehicule {
    protected $marque;
    protected $modele;
    protected $annee;
    protected $carburant;
    protected $autorisation;

    public function __construct($newMarque, $newModele, $newAnnee, $newCarburant) {
        $this->marque = $newMarque;
        $this->modele = $newModele;
        $this->annee = $newAnnee;
        $this->carburant = $newCarburant;
    }
    public function getVehicule() {
        echo 'Voiture : ' . $this->marque . ' ' . $this->modele . '. Mise en circulation : ' . $this->annee . '. Carburant : ' . $this->carburant . '<br>';
    }
    public function setAutorisation() {
        if ($this->annee < Vehicule::ANNEE && $this->carburant == 'Diesel') {
            $this->autorisation = false;
        }
        else {
            $this->autorisation = true;
        }
    }
    public function getAutorisation() {
        if ($this->autorisation) {
            echo 'Cette voiture est autorisée à circuler dans Paris.<br>';
        }
        else {
            echo 'Cette voiture n\'est pas autorisée à circuler dans Paris.<br>';
        }
    }
}