-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : dim. 13 oct. 2024 à 16:40
-- Version du serveur : 8.3.0
-- Version de PHP : 8.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `super7_main_bdd`
--

-- --------------------------------------------------------

--
-- Structure de la table `games_board_game`
--

DROP TABLE IF EXISTS `games_board_game`;
CREATE TABLE IF NOT EXISTS `games_board_game` (
  `id_games_bg` int NOT NULL AUTO_INCREMENT,
  `bg_name` varchar(256) NOT NULL,
  `bg_skills` varchar(256) NOT NULL,
  `bg_max_players` int NOT NULL,
  `bg_duration` int NOT NULL,
  `bg_likes` int NOT NULL,
  PRIMARY KEY (`id_games_bg`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `games_board_game`
--

INSERT INTO `games_board_game` (`id_games_bg`, `bg_name`, `bg_skills`, `bg_max_players`, `bg_duration`, `bg_likes`) VALUES
(1, '10 familles', '[7, 8, 6]', 6, 30, 0),
(2, 'oie sportive', '[2, 7, 1]', 6, 20, 0),
(3, '7000', '[2, 5, 8]', 4, 60, 0),
(4, 'travail coopératif', '[1, 3, 6]', 8, 45, 0),
(5, '170 actions', '[1, 3, 5]', 4, 30, 0),
(6, 'improvisation théâtrale', '[2, 7, 6]', 6, 60, 0),
(7, 'Chasse aux trésors', '[3, 5, 8]', 6, 90, 0);

-- --------------------------------------------------------

--
-- Structure de la table `give`
--

DROP TABLE IF EXISTS `give`;
CREATE TABLE IF NOT EXISTS `give` (
  `id_skill` int NOT NULL,
  `id_games_bg` int NOT NULL,
  PRIMARY KEY (`id_skill`,`id_games_bg`),
  KEY `give_games_board_game0_FK` (`id_games_bg`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `likes`
--

DROP TABLE IF EXISTS `likes`;
CREATE TABLE IF NOT EXISTS `likes` (
  `id_games_bg` int NOT NULL,
  `id_user` int NOT NULL,
  PRIMARY KEY (`id_games_bg`,`id_user`),
  KEY `likes_users0_FK` (`id_user`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `played`
--

DROP TABLE IF EXISTS `played`;
CREATE TABLE IF NOT EXISTS `played` (
  `id_games_bg` int NOT NULL,
  `id_user` int NOT NULL,
  `score` int NOT NULL,
  `has_won` tinyint(1) NOT NULL,
  `date` date NOT NULL,
  `likes_round` int NOT NULL,
  `players_round` int NOT NULL,
  PRIMARY KEY (`id_games_bg`,`id_user`),
  KEY `played_users0_FK` (`id_user`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `questionnaire`
--

DROP TABLE IF EXISTS `questionnaire`;
CREATE TABLE IF NOT EXISTS `questionnaire` (
  `questionnaire_id` int NOT NULL AUTO_INCREMENT,
  `responses_questionnaire` text NOT NULL,
  `id_user` int NOT NULL,
  PRIMARY KEY (`questionnaire_id`),
  KEY `questionnaire_users_FK` (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=145 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `questionnaire`
--

INSERT INTO `questionnaire` (`questionnaire_id`, `responses_questionnaire`, `id_user`) VALUES
(144, '{\"logique\":7,\"intrapersonnelle\":6,\"musicale\":6,\"interpersonnelle\":5,\"spatiale\":5,\"ecologique\":5,\"kinesthesique\":5,\"verbale\":4}', 2);

-- --------------------------------------------------------

--
-- Structure de la table `skills`
--

DROP TABLE IF EXISTS `skills`;
CREATE TABLE IF NOT EXISTS `skills` (
  `id_skill` int NOT NULL AUTO_INCREMENT,
  `s_skills` varchar(50) NOT NULL,
  PRIMARY KEY (`id_skill`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;


INSERT INTO `skills` (`s_skills`) VALUES
('NULL'),
('Interpersonnelle'),
('Intrapersonnlle'),
('Saptiale'),
('Musicale'),
('Ecologique'),
('Kinesthésique'),
('Verbale'),
('Logique');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id_user` int NOT NULL AUTO_INCREMENT,
  `u_lname` varchar(256) NOT NULL,
  `u_fname` varchar(256) NOT NULL,
  `u_email` varchar(256) NOT NULL,
  `u_password` varchar(256) NOT NULL,
  `u_date_birth` date NOT NULL,
  `u_gender` varchar(10) NOT NULL,
  `u_phone` varchar(25) NOT NULL,
  `u_profil_img` varchar(100) NOT NULL,
  `id_role` int NOT NULL,
  PRIMARY KEY (`id_user`),
  KEY `users_user_roles_FK` (`id_role`)
) ENGINE=InnoDB AUTO_INCREMENT=65 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id_user`, `u_lname`, `u_fname`, `u_email`, `u_password`, `u_date_birth`, `u_gender`, `u_phone`, `u_profil_img`, `id_role`) VALUES
(1, 'Demeulenaere', 'François', 'demeulenaerefrancois7@yahoo.fr', '$2y$10$48PnUkxXZV645D98noyCQOS5NLulzqaE25do5jGolp5NdbZ.tWptq', '2024-10-15', 'masculin', '0123456789', 'default.jpg', 1),
(2, 'Pommelet', 'Bérenger', 'b.pommelet@gmail.com', '$2y$10$RVJ8oPFYg9oOyG1oxXYwi.tGYGVw96DuFEmkYQ038aJhrhMV7uqYW', '2024-07-08', 'masculin', '0123456789', 'default.jpg', 1),
(3, 'nonAdmin', 'Lambda', 'nondmin@gmail.com', '$2y$10$tzJLvjSvZT5qvMMuV2da/.L0Ga2LTLiiWB7pLhpPdtFVoehVPY9yK', '2024-07-18', 'F', '0123456789', '', 2),
(5, 'Martin', 'Paul', 'paul.martin@gmail.com', '$2y$10$U8I.H7EckFmk0W4FzTXDKeAnvdsTlE5qVpOSvX/7bhZlo6nfiqgG2', '1985-03-22', 'M', '0123456781', '', 2),
(7, 'Dubois', 'Luc', 'luc.dubois@gmail.com', '$2y$10$Bn6Ae8.uUB0oWj5cI/HHBuIKXbgD1sCjDPT4npZLhmOW4rLqQuu7a', '1989-12-30', 'M', '0123456783', '', 2),
(8, 'Petit', 'Chloe', 'chloe.petit@gmail.com', '$2y$10$uHO/7OIR.P1/vETvydY8XeVxZcG0eGe56W7u2E.lPpJHfScaBxV6.', '2001-11-05', 'F', '0123456784', '', 2),
(9, 'Leroy', 'Julien', 'julien.leroy@gmail.com', '$2y$10$ihP4E8/L9/NYwRl.tjZB4Ow5Ndv/t4vYaYUPY2vEcLV7yR2g9tPkm', '1987-06-17', 'M', '0123456785', '', 2),
(10, 'Moreau', 'Claire', 'claire.moreau@gmail.com', '$2y$10$Fl8nbZx5P1/NxWOYwb6mW.A1Me2GzG8Ns1WbHqD.VLVp9SEgRh0fi', '1993-12-08', 'F', '0123456786', '', 2),
(11, 'Simon', 'Laura', 'laura.simon@gmail.com', '$2y$10$Uk/9tPH8/wdL.f1qlxIY/uzH5N7zEvgYvLaGHsZaFspuY4ZnV/A8S', '1999-08-14', 'F', '0123456787', '', 2),
(12, 'Laurent', 'Mathieu', 'mathieu.laurent@gmail.com', '$2y$10$pL1IUehZhf3nyGNCEX6GFeAGJ6oK0k6QFm6tHqsYp0L5zTzC0La1K', '1981-11-02', 'M', '0123456788', '', 2),
(13, 'Renard', 'Sophie', 'sophie.renard@gmail.com', '$2y$10$QaKZ1k5tlcJ3XqGmRjMm0OfYlj6mCeEIs7p3xNzAVsXkY5MW0Qf9a', '2003-05-21', 'F', '0123456789', '', 2),
(14, 'Durand', 'Alice', 'alice.durand@gmail.com', '$2y$10$3HsUJX9mCQ.b2A4Y3l6sGOv2wM2xXyt0loE0/.O0guFF4Kn1PZIKa', '1995-12-20', 'F', '0123456790', '', 2),
(15, 'Garnier', 'Nicolas', 'nicolas.garnier@gmail.com', '$2y$10$UYOgpxwF9lA5F7M1NUe3Ouy51MFpKQjkm4A4YqJc54oMQ0b6A1uW2', '1987-03-18', 'M', '0123456791', '', 2),
(16, 'Rousseau', 'Emma', 'emma.rousseau@gmail.com', '$2y$10$EJ79Mi8kL5TSk8uQllZB.O5lZJVDmF5gkdbpSyB8p0gL3PfnOpSda', '2000-07-04', 'F', '0123456792', '', 2),
(17, 'Faure', 'Marc', 'marc.faure@gmail.com', '$2y$10$0D7gyW63oSPQc5jTJe6YeemWvq9cCShO6h8nZ0H/NN3ZjQ1hRTmpS', '1990-11-11', 'M', '0123456793', '', 2),
(18, 'Joubert', 'Sophie', 'sophie.joubert@gmail.com', '$2y$10$P8wWbNRty13UVEa1nCSCh.e7EqXTLfMkA9qAos.rRZ2KbV7eA3xU', '1986-06-23', 'F', '0123456794', '', 2),
(19, 'Martin', 'Hugo', 'hugo.martin@gmail.com', '$2y$10$e5D4b87KrjEwA7RSmNFD9E7y4mMnh7GAtAmTAKQzCSjWn0sEzhfMy', '1994-09-12', 'M', '0123456795', '', 2),
(20, 'Lemoine', 'Juliette', 'juliette.lemoine@gmail.com', '$2y$10$CwsXUHeYvFq/KT1geklDZuFb3M8r8RxU8K2YPFD3g1wB0q9K1mjC', '1988-04-15', 'F', '0123456796', '', 2),
(21, 'Meyer', 'Louis', 'louis.meyer@gmail.com', '$2y$10$0dA2T3nFBHI9X5.LMTgAEuXybPSmWshOAtX2G7Jab0Of7uH3LVZK8', '1993-12-03', 'M', '0123456797', '', 2),
(22, 'Lemoine', 'Clara', 'clara.lemoine@gmail.com', '$2y$10$7f0TjZ4PvVbRkcPQ7Ln4pA8slpBB7Yrz0J1E9qJXHqc0CTFzD0RQm', '2001-06-10', 'F', '0123456798', '', 2),
(23, 'Pires', 'Gabriel', 'gabriel.pires@gmail.com', '$2y$10$H2d/8O5bZleDkD0abX5ZDe0FyPiP9E9rH2uOC16.l9szP5FZSmjq', '1989-12-29', 'M', '0123456799', '', 2),
(24, 'Renaud', 'Amélie', 'amelie.renaud@gmail.com', '$2y$10$8mY8QJ6.nKXaN9F6l95p.euR3R8TIce.lRQxmXefXZo/iRDNtkQtm', '2000-05-04', 'F', '0123456800', '', 2),
(25, 'Carpentier', 'Olivier', 'olivier.carpentier@gmail.com', '$2y$10$P5TboNVFdAV0VRREl1Fy5uZOUaZFEu9DYAEGiWXvVW2W5Urf3TYnm', '1984-05-07', 'M', '0123456801', '', 2),
(26, 'Gautier', 'Isabelle', 'isabelle.gautier@gmail.com', '$2y$10$Kh32/LuA8JFLVmq0XAiA7eZZqvD1zoD5NOY0Jl67/ItWJ6lPU4l9S', '1995-05-14', 'F', '0123456802', '', 2),
(27, 'Benoit', 'Julien', 'julien.benoit@gmail.com', '$2y$10$04Omi4QTCxT9Y8yKNk/2V.AXf4g8LVFSP5aZ7c7PvITQvn.4pX.mK', '1989-03-21', 'M', '0123456803', '', 2),
(28, 'Gibert', 'Camille', 'camille.gibert@gmail.com', '$2y$10$LfAhb6Z2A8e7H9D4rB0bPeByo5XkLf5gsBYc8WZzSp.R.f8JXU/d2', '1996-12-09', 'F', '0123456804', '', 2),
(29, 'Barbier', 'Pierre', 'pierre.barbier@gmail.com', '$2y$10$1Px5QIS./F8Fz4z.lP82zmeIGl68u3t6UStDNGfAfk5ZpWJMBIgZy', '1981-09-10', 'M', '0123456805', '', 2),
(30, 'Lafont', 'Marie', 'marie.lafont@gmail.com', '$2y$10$u9.BfFmyZVOI0Q2P91TWE8nMDeOVtbEYf1OceCpJ8x6IvIG9pMBTq', '1993-12-28', 'F', '0123456806', '', 2),
(31, 'Martin', 'Elise', 'elise.martin@gmail.com', '$2y$10$aeB1o/zBzxHUK5z5oI1zF6RvI2lo5/fqxXlcthmfOs2J6/fB5G.Vm', '1987-12-14', 'F', '0123456807', '', 2),
(32, 'Lemoine', 'Paul', 'paul.lemoine@gmail.com', '$2y$10$V7dGkP15ACbHwgyEMRceh.t2S5TeYcecoT4ccP4OV7K8gZAVVzHYq', '1991-12-30', 'M', '0123456808', '', 2),
(33, 'Fontaine', 'Alice', 'alice.fontaine@gmail.com', '$2y$10$KXZ/G2u1fh58b2DF9bxpi1tTZ/T.BYbcYFMe2YmWIX1sF5RyTaI0u', '2000-03-12', 'F', '0123456809', '', 2),
(34, 'Poulain', 'Marc', 'marc.poulain@gmail.com', '$2y$10$B/FZ2GFO0h1u0bBv/74rY.F9V2YujmjDWjHGLaFQyWz6n6jH2czRa', '1989-08-22', 'M', '0123456810', '', 2),
(35, 'Brun', 'Émilie', 'emilie.brun@gmail.com', '$2y$10$5P0BtpTzrtTZ2k2XoTpIbuJxHf6OaZV5FYBSS27BHeA7GfDz9aQIm', '1997-03-05', 'F', '0123456811', '', 2),
(36, 'Martinez', 'Luc', 'luc.martinez@gmail.com', '$2y$10$3U0a5w12Q8q02KP0l9QfbeKlJRT6JnUwnEYz5vZ7XbqZqOhdJ24uG', '1986-11-09', 'M', '0123456812', '', 2),
(37, 'Masson', 'Julien', 'julien.masson@gmail.com', '$2y$10$0zDlPp36JcBQfsyP1RdrzupxG7fZeD3B3H3l.NjI6bJtJY6iAzJOm', '1991-09-16', 'M', '0123456813', '', 2),
(38, 'Leclerc', 'Adèle', 'adele.leclerc@gmail.com', '$2y$10$ZRu68nU05.A68UrK6kSxqey6BG4mVgmNUEd1fkcIAYe2ImhoD.YkS', '1982-11-21', 'F', '0123456814', '', 2),
(39, 'Gosselin', 'Louis', 'louis.gosselin@gmail.com', '$2y$10$y3F9jG3tK3v4VVHGIRRtWepw4NptIV9/vvYo9D/3Pm4Qdzb0fknTu', '1998-05-23', 'M', '0123456815', '', 2),
(40, 'Jean', 'Manon', 'manon.jean@gmail.com', '$2y$10$eCxqepChz3UZZKj9slzCduFWvH6CwF8UtIc5Fq7X.KCj9/W51.0ae', '1994-10-30', 'F', '0123456816', '', 2),
(41, 'Deschamps', 'Alain', 'alain.deschamps@gmail.com', '$2y$10$D6m0tqa8w6eKjdb5OojJzUXkN8gVhE.W0S/bBCFQ0aYjDIX4oyfD6', '1977-12-12', 'M', '0123456817', '', 2),
(42, 'Gibson', 'Nathalie', 'nathalie.gibson@gmail.com', '$2y$10$M6sC/DHDS/K3tBFz1Xhz/WJQ0XU4LY4GeF7t4OrcP1TRr9wd2zP7g', '1989-05-11', 'F', '0123456818', '', 2),
(43, 'Roche', 'Simon', 'simon.roche@gmail.com', '$2y$10$zK6c7DPBdxFSXvPlHHRaQuy5q9zEITbBlaXUEM0M2w5RkVdM3D3Ne', '1992-12-17', 'M', '0123456819', '', 2),
(44, 'Leger', 'Anna', 'anna.leger@gmail.com', '$2y$10$Tpaf9k11DSy9s6g6IfqQl9SB6ttUmqzRj/q7ZVvS63a7DpiXTTHkm', '2001-06-01', 'F', '0123456820', '', 2),
(45, 'Bouchard', 'François', 'francois.bouchard@gmail.com', '$2y$10$dfI/bxgRwyP5Zx2fYkG3R.BB.JuVmR74sCs/xuXGVk6LVHxlaxN3e', '1975-12-30', 'M', '0123456821', '', 2),
(46, 'Lambert', 'Juliette', 'juliette.lambert@gmail.com', '$2y$10$RAE6iJ6a/z7jYF0YsHYoXk4XcHh5iUMh83K6Lbc7A1Fd7xMB9WwHa', '1999-04-23', 'F', '0123456822', '', 2),
(47, 'Bertin', 'Étienne', 'etienne.bertin@gmail.com', '$2y$10$Nsm8wQ9YOFeJXVGsbGF9Au1b4zNfAZmXYXctA78uHyZ2REu5kz0Oa', '1986-05-08', 'M', '0123456823', '', 2),
(48, 'Pujol', 'Claudia', 'claudia.pujol@gmail.com', '$2y$10$0ZkP0URsz74U8/fjYZF7Xe.E0URptAG18.QG.S6f8JoCQv71UXMKi', '1988-03-19', 'F', '0123456824', '', 2),
(49, 'Lopez', 'Rémi', 'remi.lopez@gmail.com', '$2y$10$TSDAElhpZyguLgm93bCEbuRgyQs/O7UtI6uQQKnMGzt7R5otYZme2', '1989-12-01', 'M', '0123456825', '', 2),
(50, 'Caron', 'Lucie', 'lucie.caron@gmail.com', '$2y$10$aiiPLX1sLL0B9Q6bxIG1Lez6rc1fWhSOZEOxn8LfUwUouBZiPHt6', '1993-08-29', 'F', '0123456826', '', 2),
(51, 'Martel', 'David', 'david.martel@gmail.com', '$2y$10$AE03c/VoXYGv3MBY0TuVWe/xTp9gkql5k4S2hZJ3gBxycAaWoDHL6', '1982-06-14', 'M', '0123456827', '', 2),
(52, 'Joly', 'Nina', 'nina.joly@gmail.com', '$2y$10$PITJlG6pD4MN7m.VabYf9utHe.XIK5szm4FE.zp6H4sI9Z1uB8/Yq', '1995-10-09', 'F', '0123456828', '', 2),
(54, 'Jacquet', 'Chloe', 'chloe.jacquet@gmail.com', '$2y$10$ZaGGFsxP.VYN/zyF3oyzeOge1kXHQzA1Ig9VuRUxH0pN6MNlbkjmi', '2001-11-11', 'F', '0123456830', '', 2),
(55, 'Martinez', 'Nicolas', 'nicolas.martinez@gmail.com', '$2y$10$7a6OLa/6bLr70.OQ9KHukefChP8jvgF8TWiBsgnC5G7jZwIRiFNhS', '1992-11-25', 'M', '0123456831', '', 2),
(56, 'Moulin', 'Elena', 'elena.moulin@gmail.com', '$2y$10$PbuEupKY0k8wNl8pOomB0uYvJ3NT71ETU0IcbGEMfdWQgLnHwd/qW', '1999-08-18', 'F', '0123456832', '', 2),
(57, 'Lemoine', 'Vincent', 'vincent.lemoine@gmail.com', '$2y$10$6NiIMyAHwKYHXLdUUR0c9eA6aG4F4ZRBZRAF9WeMXz8TfJWWNKT9m', '1980-07-17', 'M', '0123456833', '', 2),
(58, 'Brun', 'Claire', 'claire.brun@gmail.com', '$2y$10$PiI4a7i1l5LK0A7gZWY/.1mXkcyBWQtN08Qz5.TBf5zV7PV5AuQyW', '2002-12-08', 'F', '0123456834', '', 2),
(59, 'Faure', 'Matthieu', 'matthieu.faure@gmail.com', '$2y$10$9d4pPo/MP.2J4qlsm/lFgu3g8Fc./f.zOhxt.fDWX8SuPM12pxCu6', '1993-07-16', 'M', '0123456835', '', 2),
(60, 'Robert', 'Julie', 'julie.robert@gmail.com', '$2y$10$7Tnv1S7unbHVYFx2g0I/De.w83Cw.sV.QfhYFGPOqY5FVgsGTsWPS', '1997-06-08', 'F', '0123456836', '', 2),
(61, 'Vidal', 'Luc', 'luc.vidal@gmail.com', '$2y$10$UgEbWz9G7FLrzYvef3ZKNKoIf/8Q0eOajI8vsM4S1n.FdVj/Pm8sO', '1992-11-09', 'M', '0123456837', '', 2),
(62, 'Chauvet', 'Amélie', 'amelie.chauvet@gmail.com', '$2y$10$QF5uS5.z/mNWtLwz1oJ6k.KaaJUsL5eMBSgK8ReV.x4IcI2l5o1Km', '1995-05-01', 'F', '0123456838', '', 2),
(63, 'Vernier', 'Sébastien', 'sebastien.vernier@gmail.com', '$2y$10$y7H9./B5DDmz1Rt9VowNDe9P1GNGYY.vMZ2P4wEVh5QH39ACR3VGQ', '1982-12-19', 'M', '0123456839', '', 2),
(64, 'Dubois', 'Claudine', 'claudine.dubois@gmail.com', '$2y$10$Ku5X1EJKOu/Y6Z8O5T2DDu8BW8Z8koy8GbD9Ck8Wj5h7/E3fHnOly', '1988-10-03', 'F', '0123456840', '', 2);

-- --------------------------------------------------------

--
-- Structure de la table `user_roles`
--

DROP TABLE IF EXISTS `user_roles`;
CREATE TABLE IF NOT EXISTS `user_roles` (
  `id_role` int NOT NULL AUTO_INCREMENT,
  `role_description` varchar(100) NOT NULL,
  PRIMARY KEY (`id_role`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `user_roles`
--

INSERT INTO `user_roles` (`id_role`, `role_description`) VALUES
(1, 'Admin'),
(2, 'Non Admin');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `give`
--
ALTER TABLE `give`
  ADD CONSTRAINT `give_games_board_game0_FK` FOREIGN KEY (`id_games_bg`) REFERENCES `games_board_game` (`id_games_bg`),
  ADD CONSTRAINT `give_skills_FK` FOREIGN KEY (`id_skill`) REFERENCES `skills` (`id_skill`);

--
-- Contraintes pour la table `likes`
--
ALTER TABLE `likes`
  ADD CONSTRAINT `likes_games_board_game_FK` FOREIGN KEY (`id_games_bg`) REFERENCES `games_board_game` (`id_games_bg`),
  ADD CONSTRAINT `likes_users0_FK` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`);

--
-- Contraintes pour la table `played`
--
ALTER TABLE `played`
  ADD CONSTRAINT `played_games_board_game_FK` FOREIGN KEY (`id_games_bg`) REFERENCES `games_board_game` (`id_games_bg`),
  ADD CONSTRAINT `played_users0_FK` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`);

--
-- Contraintes pour la table `questionnaire`
--
ALTER TABLE `questionnaire`
  ADD CONSTRAINT `questionnaire_users_FK` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`);

--
-- Contraintes pour la table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_user_roles_FK` FOREIGN KEY (`id_role`) REFERENCES `user_roles` (`id_role`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
