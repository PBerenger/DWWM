<?php

// Dans ton contrôleur Read.php
namespace App\Controllers;

use App\Config\DbConnect;
use App\Models\{User, Restaurant};

class ReadForHome {
    public function execute(array $postData) {
        $pdo = DbConnect::getPDO();
        $restaurants = Restaurant::getAllRestaurants($pdo);

        $user = new User($pdo);
        if (isset($_SESSION["USER_ID"])) {
            $user->findUserById($_SESSION["USER_ID"]);
        }
        $userAdmin = $user->isAdmin();
        require __DIR__ . "/../Views/home_view.php";
    }
}
