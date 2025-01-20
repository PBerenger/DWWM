<?php
$page = $_GET['page'] ?? 'home';

switch ($page) {
    case 'home':
        require 'views/home.php';
        break;
    case 'register':
        require 'views/register.php';
        break;
    case 'login':
        require 'views/login.php';
        break;
    case 'restaurants':
        require 'views/restaurants.php';
        break;
    case 'admin_restaurant':
        if (isset($_SESSION['role']) && $_SESSION['role'] === 'admin') {
            require 'views/admin_restaurant.php';
        } else {
            echo "Accès refusé.";
        }
        break;
    default:
        echo "Page non trouvée.";
        break;
}
?>
