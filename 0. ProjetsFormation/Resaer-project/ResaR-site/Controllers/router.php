<?php
define("URL", str_replace("index.php", "", (isset($_SERVER["HTTPS"]) ? "https" : "http") . "://" . $_SERVER['HTTP_HOST'] . $_SERVER['PHP_SELF']));
$page = $_GET['page'] ?? 'home';
$page = preg_replace('/[^a-zA-Z0-9_-]/', '', $page); // Nettoie les caractères non autorisés

switch ($page) {
    case 'home':
        require './views/home.php';
        break;
    case 'register':
        require './views/register.php';
        break;
    case 'restaurant_registration':
        require './views/restaurant_registration.php';
        break;
    case 'login':
        require './views/login.php';
        break;
    case 'restaurants':
        require './views/restaurants.php';
        break;
    case 'admin_restaurant':
        if (isset($_SESSION['role']) && $_SESSION['role'] === 'admin') {
            require './views/admin_restaurant.php';
        } else {
            header("HTTP/1.1 403 Forbidden");
            echo "Accès refusé.";
        }
        break;
    default:
        header("HTTP/1.1 404 Not Found");
        echo "Page non trouvée.";
        break;
}
