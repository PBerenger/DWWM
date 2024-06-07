<?php

ob_start();
?>


<!-- Fonction pour afficher le menu et obtenir le choix de l'utilisateur -->

<form action="suiteCalculatrice.php" method="GET">
    <h3>MENU <br>de la <br>CLACULATRICE</h3>
    <label for="nombre1">Entrez un premier nombre :</label>
    <br>
    <input type="number" name="nombre1" required>
    <br>
    <label for="nombre2">Entrez un deuxième nombre :</label>
    <br>
    <input type="number" name="nombre2" required>
    <br>
    <label for="calculateur">selectionnez le type de calcul :</label>
    <br>
    <select name="calculateur" id="calculateur" required>
        <option value="">--choisir calculateur--</option>
        <option value="addition">addition</option>
        <option value="soustraction">soustraction</option>
        <option value="multiplication">multiplication</option>
        <option value="division">division</option>
    </select>
    <input type="submit" value="calculer">
</form>

<?php
$content = ob_get_clean();
$titre = "Calculatrice";
require "template.php";
?>