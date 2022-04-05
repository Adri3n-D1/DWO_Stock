<?php
class Conducteur {
    protected $nom;
    const LIMITE = 0.5;

    public function __construct($newNom) {
        $this->nom = $newNom;
    }
    public function getInfos() {
        echo 'Pour ' . $this->nom . ', la limite fixée est de ' . self::LIMITE .' grammes d’alcool par litre de sang <br>';
    }
}
