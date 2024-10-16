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
) {
    $produits[strtolower($postData["nom"])]->mettreAjourPrix($postData["prix"]);
}

ob_start();
?>

<?php if (isset($errorMessage)): ?>
    <p class="errorMessage"><?= $errorMessage ?></p>
<?php endif; ?>

<form action="" method="post">
    <label for="nom">Nom du produit :</label>
    <input type="text" name="nom" id="nom" value="<?= isset($_GET["key"]) ? $_GET["key"] : ""; ?>">
    <label for="prix">Prix du produit</label>
    <input type="number" name="prix" id="prix" min="0" step="0.01">

    <input type="submit" value="Ajouter le produit">
</form>
<br>

<?php afficherProduits($produits) ?>

<?php
$content = ob_get_clean();
$title = "Mettre à jour le prix";
$h1 = "Mettre à jour le prix";
require "template.php";