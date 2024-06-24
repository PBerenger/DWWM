<?php

class Personnage {
    protected $nom;

    
    public function __construct($nom) {
        $this->nom = $nom;

    }
}

class Humain extends Personnage {
    // On peut ajouter des méthodes spécifiques aux Cadres ici si nécessaire

}



?>