<?php

class Employe {
    //je créé les attributs
    protected $nom;
    protected $salaire;

    // constructeur
    public function __construct($nom, $salaire) {
        // Va chercher le constructeur
        $this->nom = $nom;
        $this->salaire = $salaire;
    }
    

    // méthodes
    public function getNom() {
        return $this->nom;
    }

    public function getSalaire() {
        return $this->salaire;
    }

    public function afficherDetails() {
        echo "Nom: " . $this->getNom() . ", Salaire: " . $this->getSalaire() . "€. <br>";
    }
}