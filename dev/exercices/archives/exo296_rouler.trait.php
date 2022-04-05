<?php
trait Rouler {
    protected $capacite;

    public function utiliser($kilometre) {
        $consomation = $kilometre * 8 / 100;

        if ($this->capacite >= $consomation) {
            $this->capacite -= $consomation;
        }
        else {
            echo 'Le réservoir n\'a pas assez de carburant, vous devez faire le plein !<br>';
        }
        return $this;
    }
}