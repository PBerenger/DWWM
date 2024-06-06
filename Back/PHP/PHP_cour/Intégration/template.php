<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire</title>
    <link rel="stylesheet" href="./public/css/style.css">
</head>

<body>
    <header>
        <nav>
            <ul>
                <li><a href="index.php">Accueil</a></li>
                <li><a href="cercle.php">Cercle EN POST</a></li>
                <li><a href="cercle2.php">Cercle EN GET</a></li>
                <li><a href="calculatrice.php">Calculatrice</a></li>
                <li><a href="formulaire.php">Formulaire</a></li>
                </ul>
                </nav>
                </header>
                
                
    <main>
        <h1><?= $titre ?></h1>
        <?= $content ?>

    </main>
</body>

<footer>
    BP 2024
</footer>

</html>