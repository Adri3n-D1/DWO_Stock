<?php
class Taxe {
    private $prixHt;
    private $prixTtc;
    private $tva = 20;

    public function getPrixHt() {
        return $this->prixHt;
    }
    public function getTva() {
        return $this->tva;
    }
    public function getPrixTtc() {
        return $this->prixTtc;        
    }
    public function setPrixHt($new_prix_ht) {
        $this->prixHt = $new_prix_ht;
    }
    public function setTva($new_tva) {
        $this->tva = $new_tva;
    }
    public function setPrixTtc() {
        $this->prixTtc = $this->prixHt + $this->prixHt / 100 * $this->tva;
    }
}