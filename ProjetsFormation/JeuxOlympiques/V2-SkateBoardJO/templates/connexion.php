<?php
if (session_status() == PHP_SESSION_NONE) session_start();


require_once __DIR__ . "/../src/lib/database.php";
require_once __DIR__ . "/../src/controllers/auth.php";
?>

<div id="connexionContent">
    <div class="conContainer">
        <div class="cerateUser">
            <span>Première fois ici ?</span>
            <p class="arrow1">&#x2193;</p>
            <li><a href="create.php">S'inscrire</a></li>
        </div>
        <div class="connectUser">
            <span>Déjà inscrit ?</span>
            <p class="arrow2">&#x2193;</p>
            <li><a href="login.php">Se connecter</a></li>
        </div>
    </div>
    <img src="/ressources/img/Desktop/imgConnexion.jpg" alt="conSkate">
</div>



<?php
$content = ob_get_clean();
require "templates/layout.php";
?>