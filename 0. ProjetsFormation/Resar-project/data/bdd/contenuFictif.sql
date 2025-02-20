-- Insertion des utilisateurs (role: client)
INSERT INTO users (firstName, lastName, email, phone, password) VALUES
("Paul", "Mercier", "paul.mercier@example.com", "0612345678", "password123"),
("Quentin", "Benoit", "quentin.benoit@example.com", "0623456789", "password123"),
("Roxane", "Rey", "roxane.rey@example.com", "0634567890", "password123"),
("Sophie", "Lopez", "sophie.lopez@example.com", "0645678901", "password123"),
("Kevin", "Lambert", "kevin.lambert@example.com", "0667890123", "password123"),
("Laura", "Moreau", "laura.moreau@example.com", "0678901234", "password123"),
("Matthieu", "Fournier", "matthieu.fournier@example.com", "0689012345", "password123"),
("Nina", "Girard", "nina.girard@example.com", "0690123456", "password123"),
("Olivier", "Andre", "olivier.andre@example.com", "0601234567", "password123"),
("Ugo", "Martinez", "ugo.martinez@example.com", "0678912345", "password123"),
("Valentine", "Dupont", "valentine.dupont@example.com", "0689123456", "password123"),
("William", "Garnier", "william.garnier@example.com", "0691234567", "password123"),
("Xavier", "Lemoine", "xavier.lemoine@example.com", "0602345678", "password123"),
("Yasmine", "Perrot", "yasmine.perrot@example.com", "0613456789", "password123"),
("Thomas", "Dufresne", "thomas.dufresne@example.com", "0656789012", "password123");

-- Assignation des utilisateurs aux rôles

-- 5 CLIENTS
INSERT INTO user_roles (user_id, role_id) VALUES
((SELECT idUsers FROM users WHERE email = "paul.mercier@example.com"), 1),
((SELECT idUsers FROM users WHERE email = "quentin.benoit@example.com"), 1),
((SELECT idUsers FROM users WHERE email = "roxane.rey@example.com"), 1),
((SELECT idUsers FROM users WHERE email = "sophie.lopez@example.com"), 1),
((SELECT idUsers FROM users WHERE email = "thomas.dufresne@example.com"), 1);

-- 5 ADMINS
INSERT INTO user_roles (user_id, role_id) VALUES
((SELECT idUsers FROM users WHERE email = "kevin.lambert@example.com"), 2),
((SELECT idUsers FROM users WHERE email = "laura.moreau@example.com"), 2),
((SELECT idUsers FROM users WHERE email = "matthieu.fournier@example.com"), 2),
((SELECT idUsers FROM users WHERE email = "nina.girard@example.com"), 2),
((SELECT idUsers FROM users WHERE email = "olivier.andre@example.com"), 2);

-- 5 OWNERS
INSERT INTO user_roles (user_id, role_id) VALUES
((SELECT idUsers FROM users WHERE email = "ugo.martinez@example.com"), 3),
((SELECT idUsers FROM users WHERE email = "valentine.dupont@example.com"), 3),
((SELECT idUsers FROM users WHERE email = "william.garnier@example.com"), 3),
((SELECT idUsers FROM users WHERE email = "xavier.lemoine@example.com"), 3),
((SELECT idUsers FROM users WHERE email = "yasmine.perrot@example.com"), 3);

-- 2 CLIENT-ADMIN
INSERT INTO user_roles (user_id, role_id) VALUES
((SELECT idUsers FROM users WHERE email = "paul.mercier@example.com"), 2),
((SELECT idUsers FROM users WHERE email = "quentin.benoit@example.com"), 2);

-- 2 OWNER-ADMIN
INSERT INTO user_roles (user_id, role_id) VALUES
((SELECT idUsers FROM users WHERE email = "thomas.dufresne@example.com"), 2),
((SELECT idUsers FROM users WHERE email = "sophie.lopez@example.com"), 3);



-- Insertion des restaurants
INSERT INTO restaurants (owner_id, name, phone, description, address, city, zip_code, country, latitude, longitude) VALUES
(11, "Le Gourmet", "12 rue des Oliviers, Paris", "0123456789", "Cuisine gastronomique", "Paris", "r_default.jpg"),
(12, "Bistro du Marché", "24 avenue des Champs, Lyon", "0987654321", "Cuisine traditionnelle", "Lyon", "r_default.jpg"),
(13, "Chez Luigi", "5 place Saint-Michel, Marseille", "0543216789", "Cuisine italienne", "Marseille", "r_default.jpg"),
(14, "L'Escale", "34 rue de la Plage, Nice", "0765432198", "Fruits de mer et poissons", "Nice", "r_default.jpg"),
(15, "Le Petit Japon", "7 rue des Sakura, Toulouse", "0678912345", "Cuisine japonaise", "Toulouse", "r_default.jpg"),
(16, "Le Brunch Royal", "2 boulevard Haussmann, Paris", "0123987654", "Brunch et pâtisseries", "Paris", "r_default.jpg"),
(17, "Steakhouse Deluxe", "11 rue de la Viande, Bordeaux", "0654321098", "Spécialiste des grillades", "Bordeaux", "r_default.jpg"),
(18, "Veggie Paradise", "50 rue Verte, Nantes", "0789654321", "Cuisine végétarienne", "Nantes", "r_default.jpg"),
(19, "Saveurs d'Orient", "9 boulevard du Souk, Strasbourg", "0345678901", "Cuisine marocaine", "Strasbourg", "r_default.jpg"),
(20, "Tacos Mania", "3 rue du Mexique, Lille", "0567894321", "Tacos et spécialités mexicaines", "Lille", "r_default.jpg");


-- Insertion des plats (5 par restaurant)
INSERT INTO dishes (restaurant_id, name, price, description) VALUES
(1, "Foie Gras Maison", 18.50, "Foie gras de canard avec pain toasté"),
(1, "Magret de Canard", 25.00, "Magret grillé avec purée maison"),
(1, "Tarte Tatin", 8.50, "Tarte tatin aux pommes caramélisées"),
(1, "Risotto aux Truffes", 22.00, "Risotto crémeux avec truffes noires"),
(1, "Soupe à l'Oignon", 10.00, "Soupe à l'oignon gratinée au fromage"),
(2, "Salade Lyonnaise", 12.00, "Salade verte avec lardons et oeuf poché"),
(2, "Quenelles de Brochet", 18.00, "Quenelles de brochet sauce Nantua"),
(2, "Tarte Praline", 6.50, "Tarte à la praline rose"),
(2, "Tablier de Sapeur", 20.00, "Tablier de sapeur avec sauce gribiche"),
(2, "Gratin Dauphinois", 8.00, "Gratin de pommes de terre au fromage"),
(3, "Pizza Margherita", 10.00, "Pizza classique avec tomates et mozzarella"),
(3, "Pâtes Carbonara", 12.00, "Pâtes à la carbonara avec lardons et crème"),
(3, "Osso Buco", 18.00, "Osso buco de veau avec risotto"),
(3, "Tiramisu", 6.50, "Tiramisu traditionnel au café"),
(3, "Café Gourmand", 8.00, "Assortiment de desserts avec café"),
(4, "Plateau de Fruits de Mer", 30.00, "Plateau de fruits de mer frais"),
(4, "Bouillabaisse", 25.00, "Bouillabaisse traditionnelle avec rouille"),
(4, "Salade Niçoise", 15.00, "Salade composée avec thon et légumes"),
(4, "Poisson Grillé", 20.00, "Poisson grillé avec légumes de saison"),
(4, "Crème Brûlée", 8.00, "Crème brûlée à la vanille"),
(5, "Sushi Assorti", 18.00, "Assortiment de sushis et makis"),
(5, "Ramen au Porc", 15.00, "Ramen au porc avec oeuf mollet"),
(5, "Bento Teriyaki", 12.00, "Bento de poulet teriyaki avec riz"),
(5, "Mochi Glacé", 6.50, "Mochi glacé à la mangue"),
(5, "Thé Vert Matcha", 4.00, "Thé vert matcha en poudre"),
(6, "Brunch Complet", 20.00, "Brunch complet avec oeufs, bacon et pancakes"),
(6, "Croissant au Saumon", 8.00, "Croissant au saumon fumé et fromage frais"),
(6, "Pancakes au Sirop d'Érable", 10.00, "Pancakes moelleux avec sirop d'érable"),
(6, "Salade de Fruits Frais", 6.50, "Salade de fruits frais de saison"),
(6, "Café Latte", 4.00, "Café latte avec lait chaud et mousse de lait"),
(7, "Entrecôte Grillée", 25.00, "Entrecôte grillée avec frites maison"),
(7, "Burger Deluxe", 18.00, "Burger avec steak haché, cheddar et bacon"),
(7, "Salade Caesar", 12.00, "Salade Caesar avec poulet grillé et croûtons"),
(7, "Fondant au Chocolat", 8.00, "Fondant au chocolat avec glace vanille"),
(7, "Cocktail de Fruits", 6.50, "Cocktail de fruits frais pressés"),
(8, "Burger Végétarien", 15.00, "Burger végétarien avec steak de légumes"),
(8, "Salade de Quinoa", 12.00, "Salade de quinoa avec légumes grillés"),
(8, "Velouté de Potiron", 8.00, "Velouté de potiron avec crème fraîche"),
(8, "Tarte aux Légumes", 10.00, "Tarte aux légumes de saison"),
(8, "Smoothie Vert", 6.50, "Smoothie vert aux épinards et kiwi"),
(9, "Tajine d'Agneau", 20.00, "Tajine d'agneau aux pruneaux et amandes"),
(9, "Couscous Royal", 18.00, "Couscous royal avec agneau, poulet et merguez"),
(9, "Pastilla au Poulet", 15.00, "Pastilla au poulet et amandes"),
(9, "Baklava", 6.50, "Baklava aux pistaches et miel"),
(9, "Thé à la Menthe", 4.00, "Thé à la menthe fraîche"),
(10, "Tacos au Boeuf", 10.00, "Tacos au boeuf avec guacamole et cheddar"),
(10, "Burrito au Poulet", 8.00, "Burrito au poulet avec riz et haricots"),
(10, "Nachos au Fromage", 6.50, "Nachos au fromage fondu et salsa"),
(10, "Churros Cannelle", 4.00, "Churros à la cannelle et sucre"),
(10, "Soda Mexicain", 2.50, "Soda mexicain à la mangue");


-- Insertion des réservations
INSERT INTO reservations (user_id, restaurant_id, reservation_time, guests) VALUES
(1, 3, "2025-02-05 19:30:00", 2),
(2, 5, "2025-02-06 20:00:00", 4),
(3, 1, "2025-02-07 18:30:00", 2),
(4, 10, "2025-02-08 21:00:00", 3),
(5, 2, "2025-02-09 19:00:00", 5),
(6, 6, "2025-02-10 12:30:00", 2),
(7, 7, "2025-02-11 19:45:00", 6),
(8, 8, "2025-02-12 20:15:00", 2),
(9, 4, "2025-02-13 18:45:00", 4),
(10, 9, "2025-02-14 21:30:00", 3);


-- insertion des avis
INSERT INTO reviews (user_id, restaurant_id, rating, comment) VALUES
(1, 2, 5, "Excellent restaurant ! Service impeccable et plats délicieux."),
(2, 3, 4, "Très bon repas, ambiance agréable, mais un peu cher."),
(3, 1, 3, "Correct mais sans plus, les portions sont un peu petites."),
(4, 2, 5, "Une vraie pépite ! J'y retournerai sans hésitation."),
(5, 3, 2, "Déçu... Attente trop longue et plats tièdes."),
(6, 1, 4, "Super découverte, le chef est un vrai artiste culinaire !"),
(7, 2, 3, "Le cadre est joli, mais le service manque de professionnalisme."),
(8, 3, 5, "Meilleur restaurant du coin, je recommande vivement !"),
(9, 1, 1, "Très mauvaise expérience, nourriture insipide et service désagréable."),
(10, 2, 4, "Très bon mais manque un peu d’originalité dans le menu.");

INSERT INTO photos (photo_path) VALUES 
("uploads/users/u_default.jpg"),
("uploads/restaurants/r_default.jpg"),
("uploads/dishes/d_default.jpg");