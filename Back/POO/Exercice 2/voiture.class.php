<?php

class voiture
{
    //privé
    private $marque;
    private $modele;
    private $annee;
    private $couleur;

    // publique
    public $vitesseActu = 0;

    //==========
    //=METHODES=
    //==========

    // 1
    // Constructeur (instanciation)
    public function __construct($marque, $modele, $annee, $couleur, $vitesseActu)
    {
        $this->marque = $marque;
        $this->modele = $modele;
        $this->annee = $annee;
        $this->couleur = $couleur;

        $this->vitesseActu = $vitesseActu;
    }


    // 2
    // Getter (acceder à l'attribut)
    public function getMarque()
    {
        return $this->marque;
    }
    public function getModele()
    {
        return $this->modele;
    }
    public function getAnnee()
    {
        return $this->annee;
    }
    public function getCouleur()
    {
        return $this->couleur;
    }

    // Setter
    public function setMarque($marque)
    {
        $this->marque = $marque;
    }
    public function setModele($modele)
    {
        $this->modele = $modele;
    }
    public function setannee($annee)
    {
        $this->annee = $annee;
    }
    public function setCouleur($couleur)
    {
        $this->couleur = $couleur;
    }


    // Méthode pour afficher les plantes
    public function afficher()
    {
        echo "Marque : $this->marque\n" . "<br>";
        echo "Modele : $this->modele\n" . "<br>";
        echo "Annee : $this->annee\n" . "<br>";
        echo "Couleur : $this->couleur\n" . "<br>";
        echo "Vitesse Actuelle : $this->vitesseActu\n" . "km/h." . "<br>";
        echo "********************<br><br>";
    }


    // 3
    // Méthode pour accélérer la voiture
    public function accelerer($vitesse)
    {
        $this->vitesseActu += $vitesse;
    }

}
