<?php
class Addition extends Operations {
    public function setResultat($valeur1, $valeur2) {
        echo 'Opération : ' . $valeur1 . ' + ' . $valeur2 . '<br>';
        $this->resultat = $valeur1 + $valeur2;
    }
}