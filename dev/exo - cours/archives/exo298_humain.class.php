<?php
class Humain {
    private $generation;
    private $nom;

    public function __construct($newNom) {
        $this->nom = $newNom;
    }

    public function __clone() {
        $this->generation++;
    }
    
    public function getInfos() {
        if ($this->generation != 0) {
            $texte = 'Je suis un ';
            for ($i = 0; $i < $this->generation; $i++) {
                $texte .= 'clone de ';
            }
            $texte .= $this->nom . '. Un clone de génération ' . $this->generation . '.<br>';
            echo $texte;
        }
    	else {
    		echo 'Je suis ' . $this->nom . ', le vrai !<br>'; 
    	}
    }
}