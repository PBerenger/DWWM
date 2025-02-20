-- Création de la base de données
CREATE DATABASE resar_bdd;
USE resar_bdd;

-- Table des rôles
CREATE TABLE roles (
    idRole INT AUTO_INCREMENT PRIMARY KEY,
    roleName VARCHAR(50) NOT NULL UNIQUE
);

-- Insertion des rôles
INSERT INTO roles (idRole, roleName) VALUES
(1, 'client'),
(2, 'admin'),
(3, 'owner');

-- Table des utilisateurs (sans role_id)
CREATE TABLE users (
    idUsers INT AUTO_INCREMENT PRIMARY KEY,
    firstName VARCHAR(100) NOT NULL,
    lastName VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    phone VARCHAR(20) NULL,
    password VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Table pour gérer les rôles multiples des utilisateurs
CREATE TABLE user_roles (
    user_id INT NOT NULL,
    role_id INT NOT NULL,
    PRIMARY KEY (user_id, role_id),
    FOREIGN KEY (user_id) REFERENCES users(idUsers) ON DELETE CASCADE,
    FOREIGN KEY (role_id) REFERENCES roles(idRole) ON DELETE CASCADE
);

-- Table des restaurants
CREATE TABLE restaurants (
    idRestaurants INT AUTO_INCREMENT PRIMARY KEY,
    owner_id INT NOT NULL,
    name VARCHAR(255) NOT NULL,
    phone VARCHAR(20) NULL,
    description TEXT,
    address VARCHAR(255) NOT NULL,
    city VARCHAR(100) NOT NULL,
    zip_code VARCHAR(10) NOT NULL,
    country VARCHAR(100) NOT NULL,
    latitude DECIMAL(9,6) NULL,
    longitude DECIMAL(9,6) NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (owner_id) REFERENCES users(idUsers) ON DELETE CASCADE
);

-- Table des menus (plats)
CREATE TABLE dishes (
    idDishes INT AUTO_INCREMENT PRIMARY KEY,
    restaurant_id INT NOT NULL,
    name VARCHAR(255) NOT NULL,
    price DECIMAL(10,2) NOT NULL,
    description TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (restaurant_id) REFERENCES restaurants(idRestaurants) ON DELETE CASCADE
);

-- Table des réservations
CREATE TABLE reservations (
    idReservations INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    restaurant_id INT NOT NULL,
    reservation_time DATETIME NOT NULL,
    guests INT NOT NULL CHECK (guests > 0),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(idUsers) ON DELETE CASCADE,
    FOREIGN KEY (restaurant_id) REFERENCES restaurants(idRestaurants) ON DELETE CASCADE
);

-- Table des avis
CREATE TABLE reviews (
    idReviews INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    restaurant_id INT NOT NULL,
    rating TINYINT NOT NULL CHECK (rating BETWEEN 1 AND 5),
    comment TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(idUsers) ON DELETE CASCADE,
    FOREIGN KEY (restaurant_id) REFERENCES restaurants(idRestaurants) ON DELETE CASCADE
);

-- Table pour stocker les photos
CREATE TABLE photos (
    idPhoto INT AUTO_INCREMENT PRIMARY KEY,
    photo_path VARCHAR(255) NOT NULL,
    uploaded_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Relation photos/utilisateurs
CREATE TABLE user_photos (
    user_id INT NOT NULL,
    photo_id INT NOT NULL,
    PRIMARY KEY (user_id, photo_id),
    FOREIGN KEY (user_id) REFERENCES users(idUsers) ON DELETE CASCADE,
    FOREIGN KEY (photo_id) REFERENCES photos(idPhoto) ON DELETE CASCADE
);

-- Relation photos/restaurants
CREATE TABLE restaurant_photos (
    restaurant_id INT NOT NULL,
    photo_id INT NOT NULL,
    PRIMARY KEY (restaurant_id, photo_id),
    FOREIGN KEY (restaurant_id) REFERENCES restaurants(idRestaurants) ON DELETE CASCADE,
    FOREIGN KEY (photo_id) REFERENCES photos(idPhoto) ON DELETE CASCADE
);

-- Relation photos/plats
CREATE TABLE dishes_photos (
    dish_id INT NOT NULL,
    photo_id INT NOT NULL,
    PRIMARY KEY (dish_id, photo_id),
    FOREIGN KEY (dish_id) REFERENCES dishes(idDishes) ON DELETE CASCADE,
    FOREIGN KEY (photo_id) REFERENCES photos(idPhoto) ON DELETE CASCADE
);
