<?php

interface Animal {
    public function seNourrir();
    public function crier();
    public function seDeplacer();
}


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

// Création des objets
$lapin = new Lapin("blanc", 4);
$chasseur = new Chasseur("Paul");

// Le lapin se nourrit
$lapin->seNourrir();

while ($lapin->estEnVie()) {
    // Le chasseur se déplace
    $chasseur->seDeplacer();

    // Le lapin crie
    $lapin->crier();

    // Le chasseur chasse le lapin
    $chasseur->chasser($lapin);

    // Si le lapin est encore en vie, il fuit
    if ($lapin->estEnVie()) {
        $lapin->seDeplacer();
    }
}
?>
