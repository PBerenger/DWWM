<?php

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

ob_start();

if (!isset($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
    echo 'hihi';
}
?>

<h2>❌ Erreur</h2>
<p>Votre action n'a pu être réalisée.</p>
<a href="index.php">D'accord</a>


<?php
$content = ob_get_clean();
require "layout.php"; // Inclure la mise en page
?>