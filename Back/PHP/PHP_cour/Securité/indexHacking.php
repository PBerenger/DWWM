<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <!-- verifier si $nom existe dans le tableau -->

    <?php
    $nom=isset($_POST['nom']) ? $_POST['nom'] : null;
    ?>

    <h2>Bonjour <?=isset($nom)? $nom :"NULL"?></h2>
    <form action="index.php" method="POST">
        <label for="nom">Nom :</label>
        <input type="text" name="nom">
        <br>
        <input type="submit" value="Envoyer">

    </form>


<!-- taper cette ligne de commande dans l'input :

<script>console.log("Salut")</script>
pour le voir dans la console

ou

<script>alert("Salut")</script>
pour une alerte -->


</out>
</body>
</html>