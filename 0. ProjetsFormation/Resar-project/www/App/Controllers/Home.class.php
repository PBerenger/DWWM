<?php

namespace App\Controllers;

use App\Models\Restaurant;

class HomeController
{
    public function index()
    {
        $pdo = \App\Config\DbConnect::getPDO();
        $restaurants = Restaurant::getAllRestaurants($pdo);
        require_once __DIR__ . '/../Views/home.php';
    }
}
