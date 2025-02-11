<?php

namespace App\Controllers;

use App\Models\Restaurant;

class Home
{
    public static function getRandomRestaurants(\PDO $pdo): array
    {
        $query = "SELECT idRestaurants, 
                      owner_id, 
                      name, 
                      address, 
                      phone, 
                      description, 
                      location, 
                      photo, 
                      created_at 
              FROM Restaurants 
              ORDER BY RAND() 
              LIMIT 5";  // Limite à 5 restaurants aléatoires

        $stmt = $pdo->query($query);
        $restaurantsInfo = $stmt->fetchAll(\PDO::FETCH_ASSOC);

        $restaurants = [];
        foreach ($restaurantsInfo as $restaurant) {
            $newRestaurant = new Restaurant();
            $newRestaurant->setId($restaurant["idRestaurants"]);
            $newRestaurant->setOwner($restaurant["owner_id"]);
            $newRestaurant->setName($restaurant["name"]);
            $newRestaurant->setAddress($restaurant["address"]);
            $newRestaurant->setPhone($restaurant["phone"]);
            $newRestaurant->setDescription($restaurant["description"]);
            $newRestaurant->setLocation($restaurant["location"]);
            $newRestaurant->setPhoto($restaurant["photo"] ?? 'r_default.jpg');
            $newRestaurant->setCreatedAt($restaurant["created_at"]);

            $restaurants[] = $newRestaurant;
        }

        return $restaurants;
    }
}
