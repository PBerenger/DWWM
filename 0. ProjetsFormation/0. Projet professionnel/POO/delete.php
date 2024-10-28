<?php
require_once "produit.php";
require_once "functions.php";

$produits = array(
    "pomme" => new Produit("Pomme", 0.30, 10),
    "banane" => new Produit("Banane", 0.40, 7),
    "orange" => new Produit("Orange", 0.20, 25),
    "pomelo" => new Produit("Pomelo", 0.80, 3),
);

if (isset($_GET["key"])) {
    unset($produits[$_GET["key"]]);
}

ob_start();
?>

<?php afficherProduits($produits); ?>

<?php
$content = ob_get_clean();
$title = "Mettre à jour le prix";
$h1 = "Mettre à jour le prix";
require "template.php";