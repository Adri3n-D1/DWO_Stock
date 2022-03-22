<?php
class PoidsLourd implements Vehicule {
    protected $marque;
    protected $modele;
    protected $annee;
    protected $carburant;
    protected $autorisation;
    protected $ptac;

    public function __construct($newMarque, $newModele, $newAnnee, $newCarburant) {
        $this->marque = $newMarque;
        $this->modele = $newModele;
        $this->annee = $newAnnee;
        $this->carburant = $newCarburant;
    }
    public function getVehicule() {
        echo 'Poids lourd : ' . $this->marque . ' ' . $this->modele . '. Mise en circulation : ' . $this->annee . '. Carburant : ' . $this->carburant . ' <br>';
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
            echo 'Ce poids lourd est autorisée à circuler dans Paris.<br>';
        }
        else {
            echo 'Ce poids lourd n\'est pas autorisée à circuler dans Paris.<br>';
        }
    }
    public function getPtac() {
        echo 'PTAC : ' . $this->ptac . ' tonnes.<br>';
    }
}