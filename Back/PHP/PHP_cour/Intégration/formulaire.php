<?php ob_start(); ?>

<form action="" method="POST">
    <label for="nom">Nom :</label>
    <input type="text" name="nom" id="nom" required>
    <br>
    <label for="email">Email :</label>
    <input type="email" name="email" id="email" required>
    <br>
    <label for="age">Votre âge :</label>
    <input type="number" name="age" id="age" required>
    <br>
    <input type="submit" value="Envoyer">
    <?php
        if (isset($_POST["nom"]) && isset($_POST["email"]) && isset($_POST["age"])) {
            $name = $_POST["nom"];
            $email = $_POST["email"];
            $age = $_POST["age"];
            echo"<p>Nom : $name</p>";
            echo"<p>Email : $email</p>";
            echo"<p>Age : $age</p>";

        }else{
            echo "Aucune donnée soumise.";
        }
    ?>

</form>


<?php
    $content = ob_get_clean();
    $titre = "FORMULAIRE";
    require "template.php";
?>