<?php

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

ob_start();

if (!isset($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
    echo 'haha';
}
?>

<h2>✅ Succès !</h2>
<p>Votre action a été réalisée avec succès.</p>
<a href="index.php">D'accord</a>

<?php
$content = ob_get_clean();
require "layout.php";
