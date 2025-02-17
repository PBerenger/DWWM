CREATE DATABASE resar_bdd;

USE resar_bdd;

-- Table pour les utilisateurs
CREATE TABLE users (
    idUsers INT AUTO_INCREMENT PRIMARY KEY,
    firstName VARCHAR(100) NOT NULL,
    lastName VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    role ENUM('user', 'admin') DEFAULT 'user',
    photo VARCHAR(255) NOT NULL DEFAULT 'u_default.jpg',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Table pour les restaurants
CREATE TABLE restaurants (
    idRestaurants INT AUTO_INCREMENT PRIMARY KEY,
    owner_id INT NOT NULL,
    name VARCHAR(255) NOT NULL,
    address VARCHAR(255) NOT NULL,
    phone VARCHAR(20),
    description TEXT,
    location VARCHAR(255),
    photo VARCHAR(255) NOT NULL DEFAULT 'r_default.jpg',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (owner_id) REFERENCES users(idUsers) ON DELETE CASCADE
);

-- Table pour les menus (plats)
CREATE TABLE dishes (
    idDishes INT AUTO_INCREMENT PRIMARY KEY,
    restaurant_id INT NOT NULL,
    name VARCHAR(255) NOT NULL,
    price DECIMAL(10, 2) NOT NULL,
    description TEXT,
    photo VARCHAR(255) NOT NULL DEFAULT 'd_default.jpg',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (restaurant_id) REFERENCES restaurants(idRestaurants) ON DELETE CASCADE
);

-- Table pour les réservations
CREATE TABLE reservations (
    idReservations INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    restaurant_id INT NOT NULL,
    reservation_time DATETIME NOT NULL,
    guests INT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(idUsers) ON DELETE CASCADE,
    FOREIGN KEY (restaurant_id) REFERENCES restaurants(idRestaurants) ON DELETE CASCADE
);

-- Table pour les avis
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
