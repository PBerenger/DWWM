<?php


class Pyramide extends TriangleRectangle
{
    protected $hauteur;

    // Constructeur
    public function __construct($hauteur)
    {
        $this->hauteur = $hauteur;
    }

    // Assesseurs
    public function getHauteur()
    {
        return $this->hauteur;
    }


    // Mutateurs
    public function setHauteur($hauteur)
    {
        $this->hauteur = $hauteur;
    }

    // methode
    function calculerVolumePyramide()
    {
        // Calculer le volume de la pyramide
        $volume = (1 / 3) * $this->perimetreTrangleRectangle();

        return $volume;
    }
}
