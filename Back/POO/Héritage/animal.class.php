<?php

// Classe mère
class Animal {
    public $nom;

    // constructeur
    public function __construct($nom){
        $this->nom = $nom;
    }

    // méthode qui appartient à la classe mère
    public function parler() {
        return "Cet animal ne fait pas de bruit spécifique.";
    }
    
}

?>