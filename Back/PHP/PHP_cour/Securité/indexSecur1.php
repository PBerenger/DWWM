<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<!-- htmlspecialchars() -->

    <form action="indexSecur1.php" method="POST">
        <label for="email">Votre adresse Email :</label>
        <input type="text" name="email" id="email" value="">
        <input type="submit" value="Envoyer">
    </form>

    <?php
    $email="";
    if(isset($_POST["email"])) {
        $email=filter_input(INPUT_POST,"email", FILTER_VALIDATE_EMAIL);
        //verifier validité Email
        if($email) {
            echo"<p> l'adresse est : $email </p>";
        } else {
            echo "<p> l'adresse est invalide </p>";
        }
    }
    ?>


</body>
</html>