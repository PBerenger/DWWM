<?php
if (session_status() == PHP_SESSION_NONE) session_start();


require_once "dbConnect.php";
require_once "auth.php";
// Vérification de la variable $_SESSION['user_id'] dans le fichier 'index.php' pour s'assurer que seuls les utilisateurs authentifiés y accèdent. 
// if(!isset($_SESSION['user_id'])) {
//     header('location: login.php');
//     exit();
// }
// verifAdmin();
?>
<!-- <div class="Welcome-text">
    <p>Bienvenue</p>
</div> -->
<?php
// ob_start();
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





<?php
$content = ob_get_clean();
require "template.php";
?>