<?php

namespace App\Controllers;

use App\Models\Restaurant;

class Home
{
    public static function getRandomRestaurants(\PDO $pdo): array
    {
        $query = "SELECT r.idRestaurants, 
                         r.owner_id, 
                         r.name, 
                         r.address, 
                         r.phone, 
                         r.description, 
                         p.photo_path AS photo, 
                         r.created_at 
          FROM restaurants r
          LEFT JOIN restaurant_photos rp ON r.idRestaurants = rp.restaurant_id
          LEFT JOIN photos p ON rp.photo_id = p.idPhoto
          ORDER BY RAND() 
          LIMIT 5";


        $stmt = $pdo->query($query);
        $restaurantsInfo = $stmt->fetchAll(\PDO::FETCH_ASSOC);

        $restaurants = [];
        foreach ($restaurantsInfo as $restaurant) {
            $newRestaurant = new Restaurant($pdo);
            $newRestaurant->setId($restaurant["idRestaurants"]);
            $newRestaurant->setOwner($restaurant["owner_id"]);
            $newRestaurant->setName($restaurant["name"]);
            $newRestaurant->setAddress($restaurant["address"]);
            $newRestaurant->setPhone($restaurant["phone"]);
            $newRestaurant->setDescription($restaurant["description"]);
            $newRestaurant->setPhoto($restaurant["photo"] ?? 'r_default.jpg');
            $newRestaurant->setCreatedAt($restaurant["created_at"]);

            $restaurants[] = $newRestaurant;
        }

        return $restaurants;
    }

    public static function getRandomReviews(\PDO $pdo, int $limit = 5): array
    {
        $query = "SELECT r.idReviews, 
                         r.rating, 
                         r.comment, 
                         r.created_at, 
                         u.firstName, u.lastName, 
                         uph.photo_path AS userPhoto, 
                         res.idRestaurants, res.name AS restaurantName, 
                         rph.photo_path AS restaurantPhoto
          FROM reviews r
          JOIN users u ON r.user_id = u.idUsers
          LEFT JOIN user_photos up ON u.idUsers = up.user_id
          LEFT JOIN photos uph ON up.photo_id = uph.idPhoto
          JOIN restaurants res ON r.restaurant_id = res.idRestaurants
          LEFT JOIN restaurant_photos rp ON res.idRestaurants = rp.restaurant_id
          LEFT JOIN photos rph ON rp.photo_id = rph.idPhoto
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
                'rating' => $review['rating'],
                'content' => $review['comment'],
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
 