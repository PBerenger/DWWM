<?php

class Cercle 
{
    protected float $rayon;

    public function __construct($rayon)
    {
        $this->rayon = $rayon;
    }

    // Assesseurs
    public function getRayonC()
    {
        return $this->rayon;
    }

    // Mutateurs
    public function setRayonC($rayon)
    {
        $this->rayon = $rayon;
    }

    // Méthodes
    public function perimetreCercle()
    {
        // Définir la valeur de pi
        $pi = pi(); // Utilisation de la fonction pi() de PHP pour obtenir la valeur de pi

        // Calculer le périmètre du cercle
        $perimetre = 2 * $pi * $this->rayon;

        // Retourner le résultat
        return $perimetre;
    }

    public function aireCercle()
    {
        // Définir la valeur de pi
        $pi = pi(); // Utilisation de la fonction pi() de PHP pour obtenir la valeur de pi

        // Calculer l'aire du cercle
        $aire = $pi * pow($this->rayon, 2); // Utilisation de la fonction pow() pour calculer le carré du rayon

        // Retourner le résultat
        return $aire;
    }

    public function afficherCercle()
    {
        $diametre = $this->rayon * 2;

        $perimetre = $this->perimetreCercle();
        $aire = $this->aireCercle();
        echo "Base : $diametre - Périmètre : $perimetre - Aire : $aire \n";
    }
}

