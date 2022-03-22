<?php
class JeuneConducteur extends Conducteur {
    const LIMITE = 0.2;
    const PERIODE = 3;
    protected $anciennete;

    public function __construct($newNom, $newAnciennete) {
        parent::__construct($newNom);
        $this->anciennete = $newAnciennete;
    }
    public function setAnciennetePlus() {
        $this->anciennete++;
        echo $this->nom . ' a désormais ' . $this->anciennete . ' an(s) de permis <br>';
    }    
    public function getInfos() {
        if ($this->anciennete >= self::PERIODE) {
            echo 'Pour ' . $this->nom . ', la limite fixée est de ' . parent::LIMITE . ' grammes d’alcool par litre de sang <br>';
        }
        else {
            echo 'Pour ' . $this->nom . ', la limite fixée est de ' . self::LIMITE .' grammes d’alcool par litre de sang <br>';
        }
    }
}