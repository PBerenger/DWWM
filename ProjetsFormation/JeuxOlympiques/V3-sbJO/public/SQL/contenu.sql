-- 1 country

INSERT INTO country (countryName, countryShortName) VALUES 
('Great Britain', 'GRB'),
('France', 'FR'),
('Russie', 'ROC'),
('Japon', 'JPN'),
('Italy', 'ITA'),
('Brazil', 'BR'),
('United State of America', 'USA'),
('Australia', 'AUS'),
('Sweden', 'SWE'),
('Espagne', 'ESP'),
('Netherlands', 'NET'),
('Denmark', 'DEN');


-- 2 athlete
-- source : https://olympics.com/en/search/athletes/skateboard

INSERT INTO athlete (athleteLastName, athleteFirstName, athleteGender, AthleteDateBirth, id_country) VALUES
('BROWN', 'Sky', 'F', '2008', '1'),
('HYM', 'Charlotte', 'F', '1992', '2'),
('MARCHIEVA', 'Ksenia', 'F', '2001', '3'),
('NISHIMURA', 'Aori', 'F', '2001', '4'),
('BERTACCINI', 'Valeria', 'F', '1993', '5'),
('OKAMOTO', 'Misugu', 'F', '2006', '4'),
('NAKAYAMA', 'Funa', 'F', '2005', '4'),
('YOSOZUMI', 'Sakura', 'F', '2002', '4'),
('LARCHERON', 'Madeleine', 'F', '2006', '2'),
('LEAL', 'Rayssa', 'F', '2008', '6'),
('HUSTON', 'Nyjah', 'H', '1994', '7'),
('WOOLLEY', 'Kieran', 'H', '2003', '8'),
('ROZENBERG', 'Oskar', 'H', '1996', '9'),
('LEON', 'Danny', 'H', '1994', '10'),
('KALDIKOV', 'Egor', 'H', '1994', '3'),
('HOEFLER', 'Kelvin', 'H', '1993', '6'),
('MAZZARA', 'Alessandro', 'H', '2004', '5'),
('OLDENBEUVING', 'Keet', 'H', '2004', '11'),
('GUSEV', 'Alexander', 'H', '2009', '3'),
('GLIFBERG', 'Rune', 'H', '1974', '12');


-- 3 event

INSERT INTO `event` (eventName, eventGender, eventPhase, eventHour, eventDate) VALUES
('Place de la Concorde', 'hommes', 'préliminaires', '12:00', '27/08/2024'),
('Place de la Concorde', 'hommes', 'finale', '17:00', '27/08/2024'),
('Place de la Concorde', 'femmes', 'préliminaires', '12:00', '28/07/2024'),
('Place de la Concorde', 'femmes', 'finale', '17:00', '28/07/2024'),
('Place de la Concorde', 'femmes', 'préliminaires', '12:30', '06/08/2024'),
('Place de la Concorde', 'femmes', 'finale', '17:30', '06/08/2024'),
('Place de la Concorde', 'hommes', 'préliminaires', '12:30', '07/08/2024'),
('Place de la Concorde', 'hommes', 'finale', '17:30', '07/08/2024');


-- Administrateur
INSERT INTO userroles (roleDescription) VALUES
('admin'),
('non-admin');
INSERT INTO users (userLastName, userFirstName, userEmail, userPassword, userDateBirth, userGender, UserPhone, role_id) VALUES
('Principal', 'Admin', 'admin.principal@gmail.com', '$2y$10$hvpO.gqOMU.9B8HqsLPCJ.DVnpNfOqb0jBc40N0bPm.5rGDXiK4U.', '20240718', 'N', '0123456789', 1);


-- Création d'utilisateurs random
-- jean.dupont@gmail.com - Password123!
INSERT INTO users (userLastName, userFirstName, userEmail, userPassword, userDateBirth, userGender, UserPhone, role_id) VALUES
('Dupont', 'Jean', 'jean.dupont@gmail.com', '$2b$12$Nj28hWCJPirxzeEePpcsJeA7h/HcRl6HBrOq2HIrA5.HGXryt/S6.', '19900115', 'M', '0123456780', 2),
('Martin', 'Paul', 'paul.martin@gmail.com', '$2y$10$U8I.H7EckFmk0W4FzTXDKeAnvdsTlE5qVpOSvX/7bhZlo6nfiqgG2', '19850322', 'M', '0123456781', 2),
('Bernard', 'Marie', 'marie.bernard@gmail.com', '$2y$10$TxZ.jR5P6W/Jw4cD9Z6jUORvc2/xO5r6yGoSc4nB8mHSp1dZcRuQG', '19970711', 'F', '0123456782', 2),
('Dubois', 'Luc', 'luc.dubois@gmail.com', '$2y$10$Bn6Ae8.uUB0oWj5cI/HHBuIKXbgD1sCjDPT4npZLhmOW4rLqQuu7a', '19891230', 'M', '0123456783', 2),
('Petit', 'Chloe', 'chloe.petit@gmail.com', '$2y$10$uHO/7OIR.P1/vETvydY8XeVxZcG0eGe56W7u2E.lPpJHfScaBxV6.', '20011105', 'F', '0123456784', 2),
('Leroy', 'Julien', 'julien.leroy@gmail.com', '$2y$10$ihP4E8/L9/NYwRl.tjZB4Ow5Ndv/t4vYaYUPY2vEcLV7yR2g9tPkm', '19870617', 'M', '0123456785', 2),
('Moreau', 'Claire', 'claire.moreau@gmail.com', '$2y$10$Fl8nbZx5P1/NxWOYwb6mW.A1Me2GzG8Ns1WbHqD.VLVp9SEgRh0fi', '19931208', 'F', '0123456786', 2),
('Simon', 'Laura', 'laura.simon@gmail.com', '$2y$10$Uk/9tPH8/wdL.f1qlxIY/uzH5N7zEvgYvLaGHsZaFspuY4ZnV/A8S', '19990814', 'F', '0123456787', 2),
('Laurent', 'Mathieu', 'mathieu.laurent@gmail.com', '$2y$10$pL1IUehZhf3nyGNCEX6GFeAGJ6oK0k6QFm6tHqsYp0L5zTzC0La1K', '19811102', 'M', '0123456788', 2),
('Renard', 'Sophie', 'sophie.renard@gmail.com', '$2y$10$QaKZ1k5tlcJ3XqGmRjMm0OfYlj6mCeEIs7p3xNzAVsXkY5MW0Qf9a', '20030521', 'F', '0123456789', 2);

