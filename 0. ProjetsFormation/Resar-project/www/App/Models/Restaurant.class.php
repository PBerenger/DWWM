<?php

namespace App\Models;

use App\Config\DbConnect;
use Exception;

class Restaurant
{
    private int $idRestaurants;
    private string $owner_id;
    private string $name;
    private string $address;
    private string $phone;
    private string $description;
    private string $location;
    private string $photo;
    private string $created_at;

    private \PDO $pdo;

    public function __construct()
    {
        $this->pdo = DbConnect::getPDO();
    }

    // GETTERS
    public function getId(): int
    {
        return $this->idRestaurants;
    }

    public function getOwner(): string
    {
        return $this->owner_id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getAddress(): string
    {
        return $this->address;
    }

    public function getPhone(): string
    {
        return $this->phone;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function getLocation(): string
    {
        return $this->location;
    }

    public function getPhoto(): string
    {
        return $this->photo;
    }

    public function getCreatedAt(): string
    {
        return $this->created_at;
    }

    // SETTERS
    public function setId(int $id): void
    {
        $this->idRestaurants = $id;
    }

    public function setOwner(string $owner_id): void
    {
        $this->owner_id = $owner_id;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function setAddress(string $address): void
    {
        $this->address = $address;
    }

    public function setPhone(string $phone): void
    {
        $this->phone = $phone;
    }

    public function setDescription(string $description): void
    {
        $this->description = $description;
    }

    public function setLocation(string $location): void
    {
        $this->location = $location;
    }

    public function setPhoto(?string $photo): void
    {
        $this->photo = $photo ?? 'r_default.jpg';
    }

    public function setCreatedAt(string $created_at): void
    {
        $this->created_at = $created_at;
    }

    // Récupérer les informations d'un restaurant par ID
    public static function getRestaurantFindById(\PDO $pdo, int $id): ?Restaurant
    {
        $query = "SELECT idRestaurants, owner_id, name, address, phone, description, location, photo, created_at 
              FROM Restaurants 
              WHERE idRestaurants = ?";
        $stmt = $pdo->prepare($query);
        $stmt->execute([$id]);
        $restaurantInfo = $stmt->fetch(\PDO::FETCH_ASSOC);

        if (!$restaurantInfo) {
            return null; // Aucun restaurant trouvé
        }

        $restaurant = new Restaurant();
        $restaurant->setId((int)$restaurantInfo['idRestaurants']);
        $restaurant->setOwner($restaurantInfo['owner_id']);
        $restaurant->setName($restaurantInfo['name']);
        $restaurant->setAddress($restaurantInfo['address']);
        $restaurant->setPhone($restaurantInfo['phone']);
        $restaurant->setDescription($restaurantInfo['description']);
        $restaurant->setLocation($restaurantInfo['location']);
        $restaurant->setPhoto($restaurantInfo['photo'] ?? 'r_default.jpg');
        $restaurant->setCreatedAt($restaurantInfo['created_at']);

        return $restaurant;
    }

    // Récupérer tous les restaurants
    public static function getAllRestaurants(\PDO $pdo): array
    {
        $query = "SELECT idRestaurants, owner_id, name, address, phone, description, location, photo, created_at 
              FROM Restaurants 
              ORDER BY name ASC";

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


    // Créer un nouveau restaurant
    public static function createRestaurant(\PDO $pdo, string $owner_id, string $name, string $address, string $phone, string $description, string $location, string $photo): ?Restaurant
    {
        $query = "INSERT INTO Restaurants (owner_id, name, address, phone, description, location, photo, created_at) 
                  VALUES (?, ?, ?, ?, ?, ?, ?, NOW())";

        $stmt = $pdo->prepare($query);
        $success = $stmt->execute([$owner_id, $name, $address, $phone, $description, $location, $photo]);

        if ($success) {
            $newRestaurant = new Restaurant();
            $newRestaurant->setId($pdo->lastInsertId());
            $newRestaurant->setOwner($owner_id);
            $newRestaurant->setName($name);
            $newRestaurant->setAddress($address);
            $newRestaurant->setPhone($phone);
            $newRestaurant->setDescription($description);
            $newRestaurant->setLocation($location);
            $newRestaurant->setPhoto($photo);
            $newRestaurant->setCreatedAt(date("Y-m-d H:i:s"));

            return $newRestaurant;
        }

        return null;
    }

    // Supprimer un restaurant
    public function deleteRestaurant(): bool
    {
        $stmt = $this->pdo->prepare("DELETE FROM Restaurants WHERE idRestaurants = ?");
        return $stmt->execute([$this->idRestaurants]);
    }

    // Mettre à jour un restaurant
    public function update(string $name, string $address, string $phone, string $description, string $location, ?string $photo): bool
    {
        $this->name = $name;
        $this->address = $address;
        $this->phone = $phone;
        $this->description = $description;
        $this->location = $location;
        $this->photo = $photo ?? $this->photo;

        $stmt = $this->pdo->prepare("UPDATE Restaurants 
                                     SET name = ?, address = ?, phone = ?, description = ?, location = ?, photo = ? 
                                     WHERE idRestaurants = ?");

        return $stmt->execute([$this->name, $this->address, $this->phone, $this->description, $this->location, $this->photo, $this->idRestaurants]);
    }

    // Récupérer trois restaurants aléatoires
    public static function getRandomRestaurants(\PDO $pdo): array
    {
        $query = "SELECT idRestaurants, owner_id, name, address, phone, description, location, photo, created_at 
                  FROM Restaurants 
                  ORDER BY RAND() LIMIT 3";
    
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
