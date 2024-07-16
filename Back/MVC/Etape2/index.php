<?php
// Définit la constante URL
define("URL", str_replace("index.php", "", (isset($_SERVER["HTTPS"]) ? "https" : "http") . "://".$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'])); 

try {
    if (empty($_GET["page"])) {
        header("Location: " . URL . "accueil");
        exit();
    } else {
        $url = explode("/", filter_var($_GET["page"], FILTER_SANITIZE_URL));

        switch ($url[0]) {
            case "accueil": 
                require "views/accueil.view.php"; 
                break;
            case "login":
                require './Controllers/LoginController.class.php';
                $controller = new LoginController();
                $controller->login();
                break;
            case "logout":
                require './Controllers/LogoutController.class.php';
                $controller = new LogoutController();
                $controller->logout();
                break;
            default: 
                throw new Exception("La page n'existe pas");
        }
    }
} catch (Exception $e) {
    echo $e->getMessage();
}
