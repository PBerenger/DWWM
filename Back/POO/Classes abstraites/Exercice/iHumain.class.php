<?php

class Chasseur extends Humain {
    public function __construct($nom) {
        parent::__construct($nom);
        echo "Le chasseur {$this->nom} a été créé avec un fusil\n";
    }

    public function seDeplacer() {
        echo "{$this->nom} avance avec son fusil\n";
    }

    public function chasser(Lapin $lapin) {
        echo "{$this->nom} tire sur le lapin avec son fusil et... ";
        $resultat = rand(1, 6);
        if ($resultat == 1 || $resultat == 6) {
            echo "le touche\n";
            $lapin->mourir();
        } else {
            echo "le rate\n";
        }
    }
}


?>