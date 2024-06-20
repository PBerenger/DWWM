<?php

// 1
class stagiaire
{
    //2
    //privé et publique
    private $nom;
    public $notes;


    //==========
    //=METHODES=
    //==========

    // Constructeur (instanciation)
    public function __construct($nom, $notes)
    {
        $this->nom = $nom;
        $this->notes = $notes;
    }


    // Getter (acceder à l'attribut)
    public function getNom()
    {
        return $this->nom;
    }
    public function getNotes()
    {
        return $this->notes;
    }


    // Setter
    public function setNom($nom)
    {
        $this->nom = $nom;
    }
    public function setNotes($notes)
    {
        $this->notes = $notes;
    }


    //3
    // Méthode pour calculer la moyenne des notes
    public function calculerMoyenne()
    {
        if (count($this->notes) == 0) {
            return 0; // Eviter division par zéro
        }
        return array_sum($this->notes) / count($this->notes);
    }

    //4
    // Méthode pour trouver la note maximale
    public function trouverMax()
    {
        if (count($this->notes) == 0) {
            return 0; // Au cas où il n'y a pas de notes
        }
        return max($this->notes);
    }

    // Méthode pour trouver la note minimale
    public function trouverMin(): float
    {
        if (count($this->notes) == 0) {
            return 0; // Pour gérer le cas où il n'y a pas de notes
        }
        return min($this->notes);
    }





    // Methode d'affichage
    public function afficher()
    {

    }
}