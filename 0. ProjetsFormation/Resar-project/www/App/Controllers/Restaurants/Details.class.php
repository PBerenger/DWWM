<?php

namespace App\Controllers\Restaurants;

use App\Config\DbConnect;
use App\Models\Restaurant;

class Details
{
    public function execute(int $id)
    {
        $pdo = DbConnect::getPDO();
        $restaurant = Restaurant::getRestaurantFindById($pdo, $id);

        if (!$restaurant) {
            header("HTTP/1.1 404 Not Found");
            echo "Restaurant non trouvé.";
            exit;
        }
        
        $photo = $restaurant->getPhoto();

        $dishes = $this->getDishes($id);

        require __DIR__ . "/../../Views/Restaurants/restaurant-details_view.php";
    }

    public function getDishes(int $id): array
    {
        $pdo = DbConnect::getPDO();
        $query = "SELECT idDishes, name, description, price FROM dishes WHERE restaurant_id = ?";
        $stmt = $pdo->prepare($query);
        
        if (!$stmt->execute([$id])) {
            throw new \Exception('Erreur lors de la récupération des plats.');
        }

        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function getPhoto(): string
    {
        return $this->photo ?? 'd_default.jpg';
    }
}

