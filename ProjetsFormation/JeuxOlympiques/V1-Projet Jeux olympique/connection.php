<?php
if (session_status() == PHP_SESSION_NONE) session_start();


require_once "dbConnect.php";
require_once "auth.php";
?>

<div id="connectionContent">
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



<script src="js.js"></script>

<?php
$content = ob_get_clean();
require "template.php";
?>