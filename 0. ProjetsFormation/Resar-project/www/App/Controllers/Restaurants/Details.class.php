<?php

namespace App\Controllers\Restaurants;

use App\Config\DbConnect;
use App\Models\Restaurant;

class Details {
    public function execute(int $id) {
        $pdo = DbConnect::getPDO();
        $restaurant = Restaurant::getRestaurantFindById($pdo, $id);

        if (!$restaurant) {
            header("HTTP/1.1 404 Not Found");
            echo "Restaurant non trouvé.";
            exit;
        }

        // La vue doit s'attendre à une variable $restaurant contenant les infos du restaurant.
        require __DIR__ . "/../../Views/Restaurants/restaurant-details.php";
    }
}
