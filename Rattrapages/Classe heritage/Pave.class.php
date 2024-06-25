<?php

class Pave extends Rectangle
{
    protected $perimetre;
    protected $volume;

    // Constructeur
    public function __construct($perimetre, $volume)
    {
        $this->perimetre = $perimetre;
        $this->volume = $volume;
    }

    // Assesseurs
    public function getPerimetre()
    {
        return $this->perimetre;
    }

    public function getVolume()
    {
        return $this->volume;
    }

    // Mutateurs
    public function setPerimetre($perimetre)
    {
        $this->perimetre = $perimetre;
    }

    public function setVolume($volume)
    {
        $this->volume = $volume;
    }


    // Méthode

    function calculerVolumePave($longueur, $largeur, $hauteur) {
        // Vérifier si les dimensions forment un rectangle (périmètre non nul)
        if ($longueur <= 0 || $largeur <= 0 || $hauteur <= 0) {
            return "Les dimensions doivent être positives et non nulles.";
        }
        
        // Calculer le périmètre du rectangle
        $perimetre = 2 * ($longueur + $largeur);
        
        // Vérifier si les dimensions forment effectivement un rectangle (périmètre non nul)
        if ($perimetre <= 0) {
            return "Les dimensions ne forment pas un rectangle valide.";
        }
        
        // Calculer le volume du pavé
        $volume = $longueur * $largeur * $hauteur;
        
        return $volume;
    }
    
    // // Exemple d'utilisation
    // $longueur = 5;
    // $largeur = 3;
    // $hauteur = 2;
    
    // $volume = calculerVolumePave($longueur, $largeur, $hauteur);
    
    // if (is_numeric($volume)) {
    //     echo "Le volume du pavé avec une longueur de $longueur, une largeur de $largeur et une hauteur de $hauteur est : $volume";
    // } else {
    //     echo $volume; // Affiche un message d'erreur
    // }

}
