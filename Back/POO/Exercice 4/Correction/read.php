<?php
require_once "produit.php";

$produits = array(
    "pomme" => new Produit("Pomme", 0.30, 10),
    "banane" => new Produit("Banane", 0.40, 7),
    "orange" => new Produit("Orange", 0.20, 25),
    "pomelo" => new Produit("Pomelo", 0.80, 3),
);

ob_start();
?>

<table>
    <thead>
        <tr>
            <th>Produit</th>
            <th>Prix</th>
            <th>Quantite</th>
            <th colspan="2"></th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($produits as $key => $produit): ?>
            <tr>
                <td><?= $produit->getNom(); ?></td>
                <td><?= $produit->getPrix(); ?></td>
                <td><?= $produit->getStock(); ?></td>
                <td><a href="modifier.php?key=<?= $key ?>">Modifier</a></td>
                <td><a href="delete.php?key=<?= $key ?>">Supprimer</a></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<?php
$content = ob_get_clean();
$title = "Mettre à jour le prix";
$h1 = "Mettre à jour le prix";
require "template.php";