<?php
//Empêcher le document d’expirer lorsque nous voulons revenir à une page avec une demande POST
ini_set('session.cache_limiter', 'public');
session_cache_limiter(false);
//Démarrer la session
if (session_status() !== PHP_SESSION_ACTIVE)
    session_start();

// Autoload the classes with the namespacec as the path ?????????
spl_autoload_register(function ($class) {
    $class = str_replace("\\", DIRECTORY_SEPARATOR, $class);
    $path = "../$class.class.php";
    include $path;
});

require_once "../config/dbConnect.php";

use App\Controllers\{Login, Register, User};

try {
    $url = parse_url($_SERVER["REQUEST_URI"]);

    switch ($url["path"]) {
        case '/':
            require '../App/Views/home.php';
            break;
        case '/register':
            (new Register())->execute($_POST);
            break;
        case 'restaurant_registration':
            require './views/restaurant_registration.php';
            break;
        case 'login':
            require './views/login.php';
            break;
        case 'restaurants':
            require '../App/views/restaurants/restaurants.php';
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
} catch (Exception $e) {
    $errorMessage = $e->getMessage();

    require "../App/Views/error.php";
}
