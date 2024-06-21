<?php
class Produit
{
    private $nomProduit;
    public $prix;
    public $stock;

    //==========
    //=METHODES=
    //==========

    // Constructeur (instanciation)
    public function __construct($nomProduit, $prix, $stock)
    {
        $this->nomProduit = $nomProduit;
        $this->prix = $prix;
        $this->stock = $stock;
    }
    
     // Getter (acceder à l'attribut)
     public function getNomProduit(){return $this->nomProduit;}
     public function getPrix(){return $this->prix;}
     public function getStock(){return $this->stock;}
 
 
     // Setter
     public function setNomProduit($nomProduit){$this->nomProduit = $nomProduit;}
     public function setprix($prix){$this->prix = $prix;}
     public function setstock($stock){$this->stock = $stock;}
    

}

?>