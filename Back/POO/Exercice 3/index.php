<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
   
<?php

require "stagiaire.class.php";

// Stagiaires
$stagiaire1 = new Stagiaire("Vigot", [8.0, 9.5, 16.9, 12.2]);
$stagiaire2 = new Stagiaire("Bigot", [12.6, 3.5, 6.0, 19.0]);
$stagiaire3 = new Stagiaire("Tricot", [18.7, 6.0, 3.0, 7.5]);
$stagiaire4 = new Stagiaire("Claude", [3.0, 5.5, 10.0, 11.3]);

$liste = [$stagiaire1, $stagiaire2, $stagiaire3, $stagiaire4];
?>


<?php foreach ($liste as $index => $stagiaire): ?>
    <div class="card">
        <h2><?= "Stagiaire " . ($index + 1); ?></h2>
        <p class="nomEleve">Nom : <?= $stagiaire->getNom(); ?></p>
        <p><?= "Notes : "; ?></p>
        <ul>
            <?php foreach ($stagiaire->getNotes() as $note): ?>
                <li>
                    - <?=$note;?>
                </li> 
                <?php endforeach; ?>
        </ul>
        <p>Moyenne : <?=$stagiaire->calculerMoyenne(); ?></p>
        <p>Note maximale : <?=$stagiaire->trouverMax(); ?></p>
        <p>Note minimale : <?=$stagiaire->trouverMin(); ?></p>
    </div>
<?php endforeach; ?>


</body>
</html>



