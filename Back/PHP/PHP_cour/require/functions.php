<?php
function phpAlert($msg)
{
    $safe_msg = htmlspecialchars($msg, ENT_QUOTES, 'UTF-8');
    echo '<script type="text/javascript">alert(' . json_encode($safe_msg) . ');</script>';
}

// Vérifier s'il y a des majuscules
if (isset($_POST['email'], $_POST['nom'])) {
    $phrase = $_POST['email'] && $_POST['nom'];
    $majuscule = "/[A-Z]/";

    if (preg_match($majuscule, $phrase)) {
        echo "La phrase contient des majuscules";
    } else {
        echo "Ne contient pas de majuscules";
    }
} else {
    echo "Veuillez soumettre le formulaire";
}
