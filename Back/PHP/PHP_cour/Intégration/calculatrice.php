<?php

ob_start();
?>


<!-- Fonction pour afficher le menu et obtenir le chois de l'utilisateur -->

<form action="suiteCalculatrice.php" method="GET">
    <h3>MENU <br>de la <br>CLACULATRICE</h3>
    <label for="nbr1">Entrez un premier nombre :</label>
    <br>
    <input type="text" name="nombre1">
    <br>
    <label for="nbr2">Entrez un deuxième nombre :</label>
    <br>
    <input type="text" name="nombre2">
    <br>
    <label for="selection">selectionnez le type de calcul :</label>
    <br>
    <select name="calculateur" id="calculateur">
        <option value="">--choisir calculateur--</option>
        <option value="addition">addition</option>
        <option value="soustraction">soustraction</option>
        <option value="multiplication">multiplication</option>
        <option value="division">division</option>
    </select>
    <input type="submit" value="calcul">

</form>

<?php
