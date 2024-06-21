<?php
require_once "functions.php";
require_once "produit.php";

$produits = array(
    "pomme" => new Produit("Pomme", 0.30, 10),
    "banane" => new Produit("Banane", 0.40, 7),
    "orange" => new Produit("Orange", 0.20, 25),
    "pomelo" => new Produit("Pomelo", 0.80, 3),
);

$postData = $_POST;
if (
    isset($postData["nom"])
    && isset($postData["prix"])
    && isset($postData["quantite"])
) {
    if (array_key_exists(strtolower($postData["nom"]), $produits)) {
        $errorMessage = "Le produit existe déjà";
    } else {

        $nom = trim(strip_tags($postData["nom"]));
        $prix = (float) $postData["prix"];
        $stock = (int) $postData["quantite"];

        $produits[] = new Produit($nom, $prix, $stock);
    }
}

ob_start();
?>

<?php if (isset($errorMessage)): ?>
    <p class="errorMessage"><?= $errorMessage ?></p>
<?php endif; ?>

<form action="" method="post">
    <label for="nom">Nom du produit :</label>
    <input type="text" name="nom" id="nom">
    <label for="prix">Prix du produit</label>
    <input type="number" name="prix" id="prix" min="0" step="0.01">
    <label for="quantite">Quantitée du produit :</label>
    <input type="number" name="quantite" id="quantite" min="0" step="1">

    <input type="submit" value="Ajouter le produit">
</form>

<br>

<?php
$content = ob_get_clean();
$title = "Ajouter un produit";
$h1 = "Ajouter un produit";
require "template.php";