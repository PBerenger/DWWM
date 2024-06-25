<?php

class TriangleRectangle 
{
    private $base;
    private $hauteur;

    public function __construct($base, $hauteur)
    {
        $this->base = $base;
        $this->hauteur = $hauteur;
    }

    // Assesseurs
    public function getBaseTR()
    {
        return $this->base;
    }

    public function getHauteurTR()
    {
        return $this->hauteur;
    }

    // Mutateurs
    public function setBaseTR($base)
    {
        $this->base = $base;
    }

    public function setHauteurTR($hauteur)
    {
        $this->hauteur = $hauteur;
    }


    // Méthodes
    public function perimetreTrangleRectangle()
    {
        // Calcul de l'hypoténuse en utilisant le théorème de Pythagore
        $hypotenuse = sqrt(pow($this->base, 2) + pow($this->hauteur, 2));

        // Calcul du périmètre
        $perimetre = $this->base + $this->hauteur + $hypotenuse;

        return $perimetre;
    }

    public function aireTrangleRectangle()
    {
        return ($this->base * $this->hauteur) / 2;
    }

    public function afficherTriangleRectangle()
    {
        $base = $this->getBaseTR();
        $hauteur = $this->gethauteurTR();
        $perimetre = $this->perimetreTrangleRectangle();
        $aire = $this->aireTrangleRectangle();
        echo "Base : $base - Hauteur : $hauteur - Périmètre : $perimetre - Aire : $aire \n";
    }
}


?>