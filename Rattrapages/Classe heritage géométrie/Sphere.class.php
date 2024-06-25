<?php


class sphere extends cercle
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


    function calculerVolumeSphere()
    {
        $volume = (4 / 3) * pi() * $this->rayon**3;
        return $volume;
    }
}
