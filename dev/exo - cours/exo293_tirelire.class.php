<?php
class Tirelire {
    private static $solde;
    private $utilisateur;

    public function __construct($newUtilisateur) {
        $this->utilisateur = $newUtilisateur;
    }
    public function getSolde() {
        echo 'Il y a ' . Tirelire::$solde . '€ dans la tirelire <br>';
    }
    public function setSoldeAjouter($montant) {
        Tirelire::$solde += $montant;
        echo $this->utilisateur . ' a ajouté ' . $montant . '€ dans la tirelire <br>';
    }
    public function setSoldeRetirer($montant) {
        Tirelire::$solde -= $montant;
        echo $this->utilisateur . ' a retiré ' . $montant . '€ dans la tirelire <br>';
    }
}