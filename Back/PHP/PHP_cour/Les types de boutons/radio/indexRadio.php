<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <form action="indexRadio.php" method="post">
        <P>Etat civil :</P>
        <label for="option1">Marié(e)</label>
        <input type="radio" id="option1" name="etatCivil" value="Marié">
        <br>
        <label for="option2">Célibataire</label>
        <input type="radio" id="option2" name="etatCivil" value="Célibataire">
        <br>
        <label for="option3">Pacsé(e)</label>
        <input type="radio" id="option3" name="etatCivil" value="Pacse">
        <br>
        <br>
        <input type="submit" value="Soumettre">

    </form>

    <?php
    if(isset($_POST["etatCivil"])) {
        $etatCivil = $_POST['etatCivil'];
        echo "Vous avez selectionner : " . $etatCivil;
    }else{
        echo "<p>Aucune option sélectionnée.</p>";
    }



    ?>
</body>
</html>