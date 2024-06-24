<?php

class Lapin implements Animal {
    private $couleur;
    private $nbPattes;
    private $estEnVie;

    public function __construct($couleur, $nbPattes) {
        $this->couleur = $couleur;
        $this->nbPattes = $nbPattes;
        $this->estEnVie = true;
        echo "Le lapin {$this->couleur} à {$this->nbPattes} pattes a été créé\n";
    }

    public function seNourrir() {
        echo "Le lapin se nourrit\n";
    }

    public function crier() {
        echo "Le lapin glapit de peur\n";
    }

    public function seDeplacer() {
        echo "Le lapin {$this->couleur} s'enfuit sur ses {$this->nbPattes} pattes d'un seul bond !\n";
    }

    public function estEnVie() {
        return $this->estEnVie;
    }

    public function mourir() {
        $this->estEnVie = false;
        echo "Le pauvre petit lapin {$this->couleur} est malheureusement mort\n";
    }
}



?>