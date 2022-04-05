<?php
trait Recharger {
    protected $capacite;
    protected $capaciteMax;

    public function recharger() {
        $this->capacite = $this->capaciteMax;
        echo 'Recharge !<br>';
        return $this;
    }

    public function getCapacite() {
        echo 'Il reste ' . $this->capacite;
        return $this;
    }

    abstract function getUnite();
    
    public function utiliser() {
        if ($this->capacite >= 50) {
            $this->capacite -= 50;
            echo 'Utilisation<br>';
        }
        else {
            echo 'Capacité insuffisante, rechargez !<br>';
        }
        return $this;
    }
}