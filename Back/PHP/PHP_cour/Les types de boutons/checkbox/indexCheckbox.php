<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <form action="indexCheckbox.php" method="post">
        <p>Intérêt :</p>
        <br>
        <label for="music">Musique</label>
        <input type="checkbox" name="interet[]" value="listeMusic" cheched>
        <br>
        <label for="voyage">voyage</label>
        <input type="checkbox" name="interet[]" value="listeVoyage" cheched>
        <br>
        <label for="lecture">lecture</label>
        <input type="checkbox" name="interet[]" value="listeLecture" cheched>
        <br>
        <label for="cinema">cinema</label>
        <input type="checkbox" name="interet[]" value="listeCinema" cheched>
        <br>
        <br>
        <input type="submit" value="Envoyer">

    </form>

        <?php
        if (isset($_POST['interet']) && is_array($_POST['interet'])) {
            $interets = $_POST['interet'];

            echo'<div class="modif">';
            foreach ($interets as $interet) {
                echo ($interet) . "<br>";
            }
            echo "</div>";
        } else {
            echo "<div class=\"modif2\">" . "Aucun intérêt" . "</div>";
        }

        ?>

</body>

</html>