<?php
session_start();

if (isset($_SESSION["user_id"])) {
    // Pour supprimer la session
    unset($_SESSION["user_id"]);
    if (ini_get("session.use_cookies")) {
        $params = session_get_cookie_params();
        setcookie(session_name(), "", time() - 42000, $params["path"], $params["domain"], $params["secure"], $params["httponly"]);
    }

    session_destroy();
}


header('location:login.php');
exit();
