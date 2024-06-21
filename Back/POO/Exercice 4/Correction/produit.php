<?php
class Produit {
    private string $nom;
    private float $prix;
    private int $stock;


    public function __construct($nom, $prix, $stock) {
        $this->nom = $nom;
        $this->prix = $prix;
        $this->stock = $stock;
    }

    // GETTERS
    public function getNom() {return $this->nom;}
    public function getPrix() {return $this->prix;}
    public function getStock() {return $this->stock;}

    // SETTERS
    public function setNom($nom) {$this->nom = $nom;}
    public function setPrix($prix) {$this->prix = $prix;}
    public function setStock($stock) {$this->stock = $stock;}

    // METHODS
    public function afficherProduit() {
        echo "Produit : $this->nom <br />"
        . "Prix : " . number_format($this->prix, 2, ",") . "€ <br />"
        . "Quantité en stock : $this->stock <br />";
    }

public function mettreAjourPrix(float $nouveauPrix) {
    $this->setPrix($nouveauPrix);
}

public function ajouterStock(int $quantiteAjoutee) {
    if ($quantiteAjoutee > 0) {
        $this->stock += $quantiteAjoutee;
    } else {
        echo "Erreur lors de l'ajout des produits dans le stock";
    }
}

public function vendreProduit(int $quantiteVendue) {
    if ($this->stock >= $quantiteVendue) {
        $this->stock -= $quantiteVendue;
    } else {
        echo "Stock insuffisant";
    }
}
}