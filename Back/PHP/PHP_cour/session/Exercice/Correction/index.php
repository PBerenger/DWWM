<?php
session_start();
ob_start();
?>

<?php
if (isset($_SESSION['username']) && isset($_SESSION['mail'])) {
        echo "<p>Inscription réussie !</p>";
        echo "<p>Vous êtes : " . $_SESSION['username'] . "</p>";
        echo "<p>Votre email :" . $_SESSION['mail'] . "</p>";
    
    echo '<form action="logout.php" method="POST">
            <input type="submit" value="Se déconnecter">
          </form>';
} else {
    echo "<p>Veuillez vous connecter.</p>";
}
?>

<?php
$content = ob_get_clean();
$titre = "Bonjour";
$title = "Accueil";
require "traitement.php";
?>