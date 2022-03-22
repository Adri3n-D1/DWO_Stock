<?php
class Division extends Operations {
    public function setResultat($valeur1, $valeur2) {
        echo 'Opération : ' . $valeur1 . ' / ' . $valeur2 . '<br>';
        if ($valeur2 != 0) {
            $this->resultat = $valeur1 / $valeur2;
        }
        else {
            echo 'Division par zéro impossible<br>';
            $this->resultat = Operations::VALEURDEFAUT;
        }
    }
}