<?php
//Empêcher le document d’expirer lorsque nous voulons revenir à une page avec une demande POST
ini_set('session.cache_limiter', 'public');
session_cache_limiter(false);
//Démarrer la session
if (session_status() !== PHP_SESSION_ACTIVE)
    session_start();

// Autoload des classes avec le namespace comme chemin
spl_autoload_register(function ($class) {
    $class = str_replace("\\", DIRECTORY_SEPARATOR, $class);
    $path = "../$class.class.php";
    if (file_exists($path)) {
        include $path;
    }
});

require_once "../config/dbConnect.php";

use App\Controllers\{User, Login, Register, Restaurants};

try {
    $url = parse_url($_SERVER["REQUEST_URI"]);
    parse_str($url["query"] ?? '', $query);
    $page = $query['page'] ?? 'home'; // Si 'page' n'est pas défini, on affiche home

    switch ($page) {
        case 'home':
            require '../App/Views/home.php';
            break;
        case 'restaurants':
            (new Restaurants\Read())->execute($_POST);
            break;
        case 'register':
            (new Register())->execute($_POST);
            break;
        case 'restaurant_registration':
            require '../App/Views/restaurant_registration.php';
            break;
        case 'login':
            require '../App/Views/login.php';
            break;
        case 'admin_restaurant':
            if (isset($_SESSION['role']) && $_SESSION['role'] === 'admin') {
                require '../App/Views/admin_restaurant.php';
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
