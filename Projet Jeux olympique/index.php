<?php
if (session_status() == PHP_SESSION_NONE) session_start();


require_once "dbConnect.php";
require_once "auth.php";
// Vérification de la variable $_SESSION['user_id'] dans le fichier 'index.php' pour s'assurer que seuls les utilisateurs authentifiés y accèdent. 
if(!isset($_SESSION['user_id'])) {
    header('location: login.php');
    exit();
}
verifAdmin();
?>
<br><br>
<div class="Welcome-text">
    <h2>Bienvenue sur la page d'accueil du CRUD Répertoire</h2>
    <p>Utilisez le menu ci-dessus pour naviger entre les différentes action du CRUD</p>
</div>

<div class="imgAccueil">
    <img src="img/crud.jpeg" alt="">
</div>

<?php
// ob_start();
?>



<?php
$content = ob_get_clean();
$titre = "Réperetoire";
require "template.php";
?>