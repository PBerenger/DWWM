<?php

class Rectangle 
{
    private $longueur;
    private $largeur;

    public function __construct($longueur, $largeur)
    {
        $this->longueur = $longueur;
        $this->largeur = $largeur;
    }

    // Assesseurs
    public function getLongueurR()
    {
        return $this->longueur;
    }

    public function getLargeurR()
    {
        return $this->largeur;
    }

    // Mutateurs
    public function setLongueurR($longueur)
    {
        $this->longueur = $longueur;
    }

    public function setLargeurR($largeur)
    {
        $this->largeur = $largeur;
    }

    // Méthodes
    public function perimetreRectangle()
    {
        return 2 * ($this->longueur + $this->largeur);
    }

    public function aireRectangle()
    {
        return $this->longueur * $this->largeur;
    }

    /**
     * Renvoie si le rectangle est un carré
     * @return bool Renvoie l'information
     */
    public function estCarre(): bool
    {
        return $this->longueur === $this->largeur;
    }

    public function afficherRectangle()
    {
        $longueur = $this->getLongueurR();
        $largeur = $this->getLargeurR();
        $perimetre = $this->perimetreRectangle();
        $aire = $this->aireRectangle();
        $carreMessage = $this->estCarre() ? "Il s’agit d’un carré" : "Il ne s’agit pas d’un carré";
        echo "Longueur : $longueur - Largeur : $largeur - Périmètre : $perimetre - Aire : $aire - $carreMessage \n";
    }
}

?>