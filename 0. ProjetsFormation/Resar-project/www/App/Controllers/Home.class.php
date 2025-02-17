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

    public static function getRandomReviews(\PDO $pdo, int $limit = 5): array
    {
        $query = "SELECT r.idReviews, 
                        r.comment, 
                        r.rating, 
                        r.created_at, 
                        u.firstName, u.lastName, u.photo AS userPhoto, 
                        res.idRestaurants, res.name AS restaurantName, res.photo AS restaurantPhoto
              FROM reviews r
              JOIN users u ON r.user_id = u.idUsers
              JOIN restaurants res ON r.restaurant_id = res.idRestaurants
              ORDER BY RAND()
              LIMIT :limit";

        $stmt = $pdo->prepare($query);
        $stmt->bindValue(':limit', $limit, \PDO::PARAM_INT);
        $stmt->execute();
        $reviewsData = $stmt->fetchAll(\PDO::FETCH_ASSOC);

        $reviews = [];
        foreach ($reviewsData as $review) {
            $reviews[] = (object) [
                'id' => $review['idReviews'],
                'content' => $review['comment'],
                'rating' => $review['rating'],
                'created_at' => $review['created_at'],
                'userName' => $review['firstName'] . ' ' . $review['lastName'],
                'userPhoto' => $review['userPhoto'] ?? 'u_default.jpg',
                'restaurantId' => $review['idRestaurants'],
                'restaurantName' => $review['restaurantName'],
                'restaurantPicture' => $review['restaurantPhoto'] ?? 'r_default.jpg',
            ];
        }

        return $reviews;
    }

    public static function getStars($rating)
    {
        $stars = '';
        for ($i = 1; $i <= 5; $i++) {
            if ($i <= $rating) {
                $stars .= '★'; // Étoile pleine
            } else {
                $stars .= '☆'; // Étoile vide
            }
        }
        return $stars;
    }
}
 