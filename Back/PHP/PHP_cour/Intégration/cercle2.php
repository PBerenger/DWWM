<?php 

ob_start(); 
?>

<form action="suiteFormCercle2.php" method="GET">
    <label for="rayon">Entrez le rayon du cercle :</label>
    <br>
    <input type="number" name="rayon" id="rayon">
    <br>
    <input type="submit" value="Calculer">
</form>

<?php
    $content = ob_get_clean();
    $titre = "Exemple avec la méthode GET";
    require "template.php";
?>