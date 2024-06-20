<?php

//code PUBLIQUE
// class Plante
// {
//     //encapsulation 
//     public $nom;
//     public $type;
//     public $hauteur;
//     public $dureeDeVie;
//     public $famille;

//     // Constructeur (instanciation)
//     public function __construct($name, $type, $height, $leave, $family)
//     {
//         $this->nom = $name;
//         $this->type = $type;
//         $this->hauteur = $height;
//         $this->dureeDeVie = $leave;
//         $this->famille = $family;
//     }

//     // Méthode pour afficher les plantes

//     public function affichage()
//     {
//         echo "nom : $this->nom\n" . "<br>";
//         echo "type : $this->type\n" . "<br>";
//         echo "hauteur : $this->hauteur\n" . "<br>";
//         echo "dureeDeVie : $this->dureeDeVie\n" . "<br>";
//         echo "famille : $this->famille\n" . "<br>";
//         echo "********************************************<br>";
//     }
// }


class Plante
{
    //encapsulation 
    private $nom;
    private $type;
    private $hauteur;
    private $dureeDeVie;
    private $famille;

    // Constructeur (instanciation)
    public function __construct($name, $type, $height, $leave, $family)
    {
        $this->nom = $name;
        $this->type = $type;
        $this->hauteur = $height;
        $this->dureeDeVie = $leave;
        $this->famille = $family;
    }

    // Getter (acceder à l'attribut)
    public function getNom(){return $this->nom;}
    public function gettype(){return $this->type;}
    public function getHauteur(){return $this->hauteur;}
    public function getdureeDeVie(){return $this->dureeDeVie;}
    public function getFamille(){return $this->famille;}

    // Setter (permet de modifier)
    public function setNom($name){
        $this->nom = $name;
    }
    public function setType($type){
        $this->type = $type;
    }
    public function setHauteur($height){
        $this->hauteur = $height;
    }
    public function setdureeDeVie($leave){
        $this->dureeDeVie = $leave;
    }
    public function setFamille($family){
        $this->famille = $family;
    }


    // Méthode pour afficher les plantes
    public function affichage()
    {
        echo "nom : $this->nom\n" . "<br>";
        echo "type : $this->type\n" . "<br>";
        echo "hauteur : $this->hauteur\n" . "<br>";
        echo "dureeDeVie : $this->dureeDeVie\n" . "<br>";
        echo "famille : $this->famille\n" . "<br>";
        echo "********************************************<br><br>";

    }
}
