<?php

namespace App\Models;

use App\Config\DbConnect;

class Restaurant
{
    private int $idRestaurants;
    private int $owner_id;
    private string $name;
    private string $address;
    private string $city;
    private string $zip_code;
    private string $country;
    private ?float $latitude; // Peut être NULL
    private ?float $longitude; // Peut être NULL
    private ?string $phone; // Peut être NULL
    private ?string $description; // Peut être NULL
    private ?string $photo; // Photo récupérée via une jointure
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
    public function getOwner(): int
    {
        return $this->owner_id;
    }
    public function getName(): string
    {
        return $this->name;
    }
    public function getPhone(): string
    {
        return $this->phone;
    }
    public function getDescription(): string
    {
        return $this->description;
    }
    public function getAddress(): string
    {
        return $this->address;
    }
    public function getCity(): string
    {
        return $this->city;
    }
    public function getZipCode(): string
    {
        return $this->zip_code;
    }
    public function getCountry(): string
    {
        return $this->country;
    }
    public function getLatitude(): ?float
    {
        return $this->latitude;
    }
    public function getLongitude(): ?float
    {
        return $this->longitude;
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
    public function setOwner(int $owner_id): void
    {
        $this->owner_id = $owner_id;
    }
    public function setName(string $name): void
    {
        $this->name = $name;
    }
    public function setPhone(string $phone): void
    {
        $this->phone = $phone;
    }
    public function setDescription(string $description): void
    {
        $this->description = $description;
    }
    public function setAddress(string $address): void
    {
        $this->address = $address;
    }
    public function setCity(string $city): void
    {
        $this->city = $city;
    }
    public function setZipCode(string $zip_code): void
    {
        $this->zip_code = $zip_code;
    }
    public function setCountry(string $country): void
    {
        $this->country = $country;
    }
    public function setLatitude(?float $latitude): void
    {
        $this->latitude = $latitude;
    }
    public function setLongitude(?float $longitude): void
    {
        $this->longitude = $longitude;
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
        $query = "SELECT r.idRestaurants, 
                         r.owner_id, 
                         r.name, 
                         r.phone, 
                         r.description, 
                         r.address,
                         r.city,
                         r.zip_code,
                         r.country,
                         r.latitude,
                         r.longitude, 
                         p.photo_path AS photo, 
                         r.created_at 
              FROM restaurants r
              LEFT JOIN restaurant_photos rp ON r.idRestaurants = rp.restaurant_id
              LEFT JOIN photos p ON rp.photo_id = p.idPhoto
              WHERE r.idRestaurants = ?";
        $stmt = $pdo->prepare($query);
        $stmt->execute([$id]);
        $restaurantInfo = $stmt->fetch(\PDO::FETCH_ASSOC);

        if (!$restaurantInfo) {
            return null;
        }

        $restaurant = new Restaurant($pdo);
        $restaurant->setId($restaurantInfo['idRestaurants']);
        $restaurant->setOwner($restaurantInfo['owner_id']);
        $restaurant->setName($restaurantInfo['name']);
        $restaurant->setAddress($restaurantInfo['address']);
        $restaurant->setPhone($restaurantInfo['phone'] ?? null);
        $restaurant->setDescription($restaurantInfo['description'] ?? null);
        $restaurant->setPhoto($restaurantInfo['photo'] ?? 'r_default.jpg');
        $restaurant->setCreatedAt($restaurantInfo['created_at']);

        return $restaurant;
    }


    // Récupérer tous les restaurants
    public static function getAllRestaurants(\PDO $pdo): array
    {
        $query = "SELECT r.idRestaurants, 
                         r.owner_id, 
                         r.name, 
                         r.phone, 
                         r.description, 
                         r.address, 
                         r.city,
                         r.zip_code,
                         r.country,
                         r.latitude,
                         r.longitude, 
                         p.photo_path AS photo, 
                         r.created_at 
          FROM restaurants r
          LEFT JOIN restaurant_photos rp ON r.idRestaurants = rp.restaurant_id
          LEFT JOIN photos p ON rp.photo_id = p.idPhoto";



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


    // Créer un nouveau restaurant
    public static function createRestaurant(\PDO $pdo, int $owner_id, string $name, string $phone, string $description, string $address, string $city, string $zip_code, string $country, string $latitude, string $longitude, string $photo): bool
    {
        $query = "INSERT INTO Restaurants 
                            (owner_id, 
                            name, 
                            phone, 
                            description, 
                            address,
                            city,
                            zip_code,
                            country,
                            latitude,
                            longitude,
                            photo, 
                            created_at) 
                  VALUES (?, ?, ?, ?, ?, ?, ?, NOW())";

        $stmt = $pdo->prepare($query);
        $success = $stmt->execute([$owner_id, $name, $phone, $description, $address, $city, $zip_code, $country, $latitude, $longitude, $photo]);

        return $success;
    }

    // Supprimer un restaurant
    public function deleteRestaurant(): bool
    {
        $stmt = $this->pdo->prepare("DELETE FROM Restaurants 
                                    WHERE idRestaurants = ?");
        return $stmt->execute([$this->idRestaurants]);
    }

    // Mettre à jour un restaurant
    public function update($pdo, int $owner_id, string $name, string $phone, string $description, string $address, string $city, string $zip_code, string $country, string $latitude, string $longitude, string $photo): bool
    {
        $this->name = $name;
        $this->address = $address;
        $this->phone = $phone;
        $this->description = $description;
        $this->photo = $photo ?? $this->photo;

        $stmt = $this->pdo->prepare("UPDATE Restaurants 
                             SET name = ?, 
                                 phone = ?, 
                                 description = ?, 
                                 address = ?,
                                 city = ?,
                                 zip_code = ?,
                                 country = ?,
                                 latitude = ?,
                                 longitude = ?,
                                 photo = ? 
                             WHERE idRestaurants = ?");


        return $stmt->execute([$owner_id, $name, $phone, $description, $address, $city, $zip_code, $country, $latitude, $longitude, $photo]);
    }
}
