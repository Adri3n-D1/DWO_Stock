<?php
abstract class Operations {
    protected $resultat;
    public const VALEURDEFAUT = 0;

    abstract public function setResultat($valeur1, $valeur2);
    public function getResultat() {
        return $this->resultat;
    }
}