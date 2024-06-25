<?php


class Pave extends Rectangle
{
    protected $hauteur;

    // Constructeur
    public function __construct($longueur, $largeur, $hauteur)
    {
        $this->longueur = $longueur;
        $this->largeur = $largeur;
        $this->hauteur = $hauteur;

    }

    // Assesseurs
    public function gethauteur()
    {
        return $this->hauteur;
    }


    // Mutateurs
    public function sethauteur($hauteur)
    {
        $this->hauteur = $hauteur;
    }



    // Méthode

    public function calculerVolumePave() {
        // Calculer le volume du pavé       
        $volume= 2 * $this->perimetreRectangle() + (4 * $this->hauteur);
        
        return $volume;
    }

}
