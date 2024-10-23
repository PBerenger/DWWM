<?php

function afficherProduits(&$produits) {
    foreach ($produits as $produit) {
        $produit->afficherProduit();
        echo "<br />";
    }    
}