<?php
class Fibonacci implements Iterator {
    private $tableau = [];
    private $max;

    public function __construct($newValeurMax) {
        $this->max = $newValeurMax;
    }
    public function rewind() {
        $this->tableau[] = 0;
        echo 'Les ' . $this->max . ' premiers éléments de la suite de Fibonacci :<br>';
    }
    public function current() {
        return current($this->tableau);
    }
    public function key() {
        return key($this->tableau) + 1;
    }
    public function next() {
        if (key($this->tableau) == 0) {
            $this->tableau[] = current($this->tableau) + 1;
        }
        else {            
            $this->tableau[] = $this->tableau[key($this->tableau)-1] + current($this->tableau);
            return next($this->tableau);
        }
    }
    public function valid() {
        $tab = count($this->tableau) <= $this->max;
        return $tab;
    }
}