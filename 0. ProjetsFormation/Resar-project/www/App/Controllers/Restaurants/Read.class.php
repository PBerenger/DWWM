<?php

namespace App\Controllers\Restaurants;

use App\Config\DbConnect;
use App\Models\{User, Restaurant};

class Read {
    public function execute(array $postData) {        
        $pdo = DbConnect::getPDO();
        $restaurants = Restaurant::getAllRestaurants($pdo);

        $user = new User($pdo);
        if (isset($_SESSION["USER_ID"])) {
            $user->findUserById($_SESSION["USER_ID"]);
        }
        $userAdmin = $user->isAdmin();

        require __DIR__ . "/../../Views/Restaurants/restaurants.php";
    }
}
?>
