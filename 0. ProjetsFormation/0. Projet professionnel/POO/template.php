<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title><?= $title ?></title>
    <link rel="icon" href="/favicon.ico" type="image/x-icon">
</head>

<body>

    <nav>
        <ul>
            <li><a href="index.php">Accueil</a></li>
            <li><a href="read.php">Afficher les produits</a></li>
            <li><a href="create.php">Ajouter un produit</a></li>
            <li><a href="modifier.php">Modifier un produit</a></li>
            <li><a href="ajouterQuantite.php">Ajouter une quantite</a></li>
            <li><a href="soustraireQuantite.php">Soustraire une quantite</a></li>
        </ul>
    </nav>

    <h1><?= $h1 ?></h1>

    <?= $content ?>

</body>

</html>