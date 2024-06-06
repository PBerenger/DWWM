<?php

require "fonction.php";
// $nombre1 = $nombre2 = $resultat = "";


// $_GET[demanderNombre($message)];
// $_GET[operation($choix,$nombre1,$nombre2)];
// $_GET[continuer()];

if(isset($_GET[$resultat])) {
    $restultat = $_GET[$resultat];
    if(verifieSaisie($restultat)) {
        $resultat = operation($choix,$nombre1,$nombre2);

    }else{
        $message = "NOOOOOOOO";
    }
}
ob_start();

?>


<?php if ($resultat) : ?>
    <p>Le résultat de l'addition est : <?= $resultat['addition']; ?></p>
    <p>Le résultat de la soustraction est : <?= $resultat['soustraction']; ?></p>
    <p>Le résultat de la multiplication est : <?= $resultat['multiplication']; ?></p>
    <p>Le résultat de la division est : <?= $resultat['division']; ?></p>
<?php endif; ?>

<?php
$content = ob_get_clean();
$titre = "Claculatrice";
require "template.php";
?>