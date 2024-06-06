<?php 

require "fonction.php";
$rayon = $resultats = $message = "";


if(isset($_GET['rayon'])){
    $rayon = $_GET['rayon'];
    if(verifieSaisie($rayon)){
        $resultats = calculeRayon($rayon);
    }else{
        $message = "Veuillez entrer un nombre valide";
    }
}

ob_start();

?>

<?php if($resultats): ?>
    <p>La circonférence du cercle est : <?= $resultats['circonference']; ?></p>
    <p>La surface du cercle est : <?= $resultats['surface']; ?> </p>
<?php endif; ?>

<?php if($message): ?>
    <p><?=$message; ?></p>
<?php endif; ?>



<?php
    $content = ob_get_clean();
    $titre = "Exemple avec la méthode GET";
    require "template.php";
?>