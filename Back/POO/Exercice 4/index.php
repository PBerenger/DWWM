<?php
require "produit.class.php";

$produit1 = new Produit("Poulet", 3.80, 1);
$produit2 = new Produit("banane", 2.75, 10);

$liste = [$produit1, $produit2];


foreach ($liste as $index => $produit) {
    echo "Nom du produit : " . $produit->getNomProduit() . "<br>";
    echo " Prix du produit : " . $produit->getPrix() . "<br>";
    echo "Quantité en stock : " . $produit->getstock() . "<br><br>";
}
