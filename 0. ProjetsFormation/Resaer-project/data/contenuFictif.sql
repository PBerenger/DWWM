-- Insertion des utilisateurs (role: user)
INSERT INTO users (firstName, lastName, email, password, role, photo) VALUES
("Alice", "Martin", "alice.martin@example.com", "password123", "user", "u_default.jpg"),
("Bob", "Dupont", "bob.dupont@example.com", "password123", "user", "u_default.jpg"),
("Charlie", "Lemoine", "charlie.lemoine@example.com", "password123", "user", "u_default.jpg"),
("David", "Durand", "david.durand@example.com", "password123", "user", "u_default.jpg"),
("Emma", "Morel", "emma.morel@example.com", "password123", "user", "u_default.jpg"),
("Fanny", "Roux", "fanny.roux@example.com", "password123", "user", "u_default.jpg"),
("Gabriel", "Gauthier", "gabriel.gauthier@example.com", "password123", "user", "u_default.jpg"),
("Hugo", "Perrin", "hugo.perrin@example.com", "password123", "user", "u_default.jpg"),
("Isabelle", "Giraud", "isabelle.giraud@example.com", "password123", "user", "u_default.jpg"),
("Jules", "Blanc", "jules.blanc@example.com", "password123", "user", "u_default.jpg");

-- Insertion des propriétaires de restaurant (role: admin)
INSERT INTO users (firstName, lastName, email, password, role, photo) VALUES
("Kevin", "Lambert", "kevin.lambert@example.com", "password123", "admin", "u_default.jpg"),
("Laura", "Moreau", "laura.moreau@example.com", "password123", "admin", "u_default.jpg"),
("Matthieu", "Fournier", "matthieu.fournier@example.com", "password123", "admin", "u_default.jpg"),
("Nina", "Girard", "nina.girard@example.com", "password123", "admin", "u_default.jpg"),
("Olivier", "Andre", "olivier.andre@example.com", "password123", "admin", "u_default.jpg"),
("Paul", "Mercier", "paul.mercier@example.com", "password123", "admin", "u_default.jpg"),
("Quentin", "Benoit", "quentin.benoit@example.com", "password123", "admin", "u_default.jpg"),
("Roxane", "Rey", "roxane.rey@example.com", "password123", "admin", "u_default.jpg"),
("Sophie", "Lopez", "sophie.lopez@example.com", "password123", "admin", "u_default.jpg"),
("Thomas", "Dufresne", "thomas.dufresne@example.com", "password123", "admin", "u_default.jpg");

-- Insertion des restaurants
INSERT INTO restaurants (owner_id, name, address, phone, description, location, photo) VALUES
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
INSERT INTO dishes (restaurant_id, name, price, description, photo) VALUES
(1, "Foie Gras Maison", 18.50, "Foie gras de canard avec pain toasté", "d_default.jpg"),
(1, "Magret de Canard", 25.00, "Magret grillé avec purée maison", "d_default.jpg"),
(1, "Tarte Tatin", 8.50, "Tarte tatin aux pommes caramélisées", "d_default.jpg"),
(1, "Risotto aux Truffes", 22.00, "Risotto crémeux avec truffes noires", "d_default.jpg"),
(1, "Soupe à l'Oignon", 10.00, "Soupe à l'oignon gratinée au fromage", "d_default.jpg"),
(2, "Salade Lyonnaise", 12.00, "Salade verte avec lardons et oeuf poché", "d_default.jpg"),
(2, "Quenelles de Brochet", 18.00, "Quenelles de brochet sauce Nantua", "d_default.jpg"),
(2, "Tarte Praline", 6.50, "Tarte à la praline rose", "d_default.jpg"),
(2, "Tablier de Sapeur", 20.00, "Tablier de sapeur avec sauce gribiche", "d_default.jpg"),
(2, "Gratin Dauphinois", 8.00, "Gratin de pommes de terre au fromage", "d_default.jpg"),
(3, "Pizza Margherita", 10.00, "Pizza classique avec tomates et mozzarella", "d_default.jpg"),
(3, "Pâtes Carbonara", 12.00, "Pâtes à la carbonara avec lardons et crème", "d_default.jpg"),
(3, "Osso Buco", 18.00, "Osso buco de veau avec risotto", "d_default.jpg"),
(3, "Tiramisu", 6.50, "Tiramisu traditionnel au café", "d_default.jpg"),
(3, "Café Gourmand", 8.00, "Assortiment de desserts avec café", "d_default.jpg"),
(4, "Plateau de Fruits de Mer", 30.00, "Plateau de fruits de mer frais", "d_default.jpg"),
(4, "Bouillabaisse", 25.00, "Bouillabaisse traditionnelle avec rouille", "d_default.jpg"),
(4, "Salade Niçoise", 15.00, "Salade composée avec thon et légumes", "d_default.jpg"),
(4, "Poisson Grillé", 20.00, "Poisson grillé avec légumes de saison", "d_default.jpg"),
(4, "Crème Brûlée", 8.00, "Crème brûlée à la vanille", "d_default.jpg"),
(5, "Sushi Assorti", 18.00, "Assortiment de sushis et makis", "d_default.jpg"),
(5, "Ramen au Porc", 15.00, "Ramen au porc avec oeuf mollet", "d_default.jpg"),
(5, "Bento Teriyaki", 12.00, "Bento de poulet teriyaki avec riz", "d_default.jpg"),
(5, "Mochi Glacé", 6.50, "Mochi glacé à la mangue", "d_default.jpg"),
(5, "Thé Vert Matcha", 4.00, "Thé vert matcha en poudre", "d_default.jpg"),
(6, "Brunch Complet", 20.00, "Brunch complet avec oeufs, bacon et pancakes", "d_default.jpg"),
(6, "Croissant au Saumon", 8.00, "Croissant au saumon fumé et fromage frais", "d_default.jpg"),
(6, "Pancakes au Sirop d'Érable", 10.00, "Pancakes moelleux avec sirop d'érable", "d_default.jpg"),
(6, "Salade de Fruits Frais", 6.50, "Salade de fruits frais de saison", "d_default.jpg"),
(6, "Café Latte", 4.00, "Café latte avec lait chaud et mousse de lait", "d_default.jpg"),
(7, "Entrecôte Grillée", 25.00, "Entrecôte grillée avec frites maison", "d_default.jpg"),
(7, "Burger Deluxe", 18.00, "Burger avec steak haché, cheddar et bacon", "d_default.jpg"),
(7, "Salade Caesar", 12.00, "Salade Caesar avec poulet grillé et croûtons", "d_default.jpg"),
(7, "Fondant au Chocolat", 8.00, "Fondant au chocolat avec glace vanille", "d_default.jpg"),
(7, "Cocktail de Fruits", 6.50, "Cocktail de fruits frais pressés", "d_default.jpg"),
(8, "Burger Végétarien", 15.00, "Burger végétarien avec steak de légumes", "d_default.jpg"),
(8, "Salade de Quinoa", 12.00, "Salade de quinoa avec légumes grillés", "d_default.jpg"),
(8, "Velouté de Potiron", 8.00, "Velouté de potiron avec crème fraîche", "d_default.jpg"),
(8, "Tarte aux Légumes", 10.00, "Tarte aux légumes de saison", "d_default.jpg"),
(8, "Smoothie Vert", 6.50, "Smoothie vert aux épinards et kiwi", "d_default.jpg"),
(9, "Tajine d'Agneau", 20.00, "Tajine d'agneau aux pruneaux et amandes", "d_default.jpg"),
(9, "Couscous Royal", 18.00, "Couscous royal avec agneau, poulet et merguez", "d_default.jpg"),
(9, "Pastilla au Poulet", 15.00, "Pastilla au poulet et amandes", "d_default.jpg"),
(9, "Baklava", 6.50, "Baklava aux pistaches et miel", "d_default.jpg"),
(9, "Thé à la Menthe", 4.00, "Thé à la menthe fraîche", "d_default.jpg"),
(10, "Tacos au Boeuf", 10.00, "Tacos au boeuf avec guacamole et cheddar", "d_default.jpg"),
(10, "Burrito au Poulet", 8.00, "Burrito au poulet avec riz et haricots", "d_default.jpg"),
(10, "Nachos au Fromage", 6.50, "Nachos au fromage fondu et salsa", "d_default.jpg"),
(10, "Churros Cannelle", 4.00, "Churros à la cannelle et sucre", "d_default.jpg"),
(10, "Soda Mexicain", 2.50, "Soda mexicain à la mangue", "d_default.jpg");


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
