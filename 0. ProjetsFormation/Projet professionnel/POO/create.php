<?php
require_once "functions.php";
require_once "produit.php";

session_start();

if (!isset($_SESSION["produits"])) {
    $_SESSION["produits"] = array(
        "pomme" => new Produit("Pomme", 0.30, 10),
        "banane" => new Produit("Banane", 0.40, 7),
        "orange" => new Produit("Orange", 0.20, 25),
        "pomelo" => new Produit("Pomelo", 0.80, 3),
    );
}

$produits = &$_SESSION["produits"]; // Référence à la session

$postData = $_POST;
if (
    isset($postData["nom"])
    && isset($postData["prix"])
    && isset($postData["quantite"])
) {
    $nom = trim(strip_tags($postData["nom"]));
    $prix = (float) $postData["prix"];
    $stock = (int) $postData["quantite"];
    
    if (array_key_exists(strtolower($nom), $produits)) {
        $errorMessage = "Le produit existe déjà.";
    } else {
        $produits[strtolower($nom)] = new Produit($nom, $prix, $stock);
    }
}


ob_start();
?>

<?php if (!empty($errorMessage)): ?>
    <p class="errorMessage"><?= $errorMessage ?></p>
<?php endif; ?>

<form action="" method="post">
    <label for="nom">Nom du produit :</label>
    <input type="text" name="nom" id="nom" required>
    <label for="prix">Prix du produit :</label>
    <input type="number" name="prix" id="prix" min="0" step="0.01" required>
    <label for="quantite">Quantité du produit :</label>
    <input type="number" name="quantite" id="quantite" min="0" step="1" required>

    <input type="submit" value="Ajouter le produit">
</form>

<br>

<?php
$content = ob_get_clean();
$title = "Ajouter un produit";
$h1 = "Ajouter un produit";
require "template.php";
