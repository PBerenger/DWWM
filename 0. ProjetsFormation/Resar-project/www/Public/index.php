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
    // echo $path;
    if (file_exists($path)) {
        include $path;
    }
});

require_once "../Config/DbConnect.php";

use App\Controllers\{User, Login, Restaurants, Home, RegisterUserAdmin, RegisterOwnerAdmin, Search};
use App\Config\DbConnect;

$pdo = DbConnect::getPDO();

try {
    $url = parse_url($_SERVER["REQUEST_URI"]);
    parse_str($url["query"] ?? '', $query);
    $page = $query['page'] ?? 'home';

    switch ($page) {
        case 'home':
            $restaurantModel = new Home();
            $restaurants = Home::getRandomRestaurants($pdo);
            $reviews = Home::getRandomReviews($pdo);
            require '../App/Views/home_view.php';
            break;

            //case search

        case 'restaurants':
            (new Restaurants\Read())->execute($_POST);
            break;

        case 'restaurant-details':
            $id = $_GET['id'] ?? null;
            if ($id === null) {
                header("HTTP/1.1 400 Bad Request");
                echo "Identifiant du restaurant manquant.";
                exit;
            }
            (new Restaurants\Details())->execute($id);
            break;

        case 'RegisterUserAdmin':
            (new RegisterUserAdmin())->execute($_POST);
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
