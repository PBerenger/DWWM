-- réinitialiser l'increment ID

ALTER TABLE your_table AUTO_INCREMENT = 1;
ALTER TABLE users AUTO_INCREMENT = 1;


-- Ajout rôle
INSERT INTO user_roles(role_description) VALUES ("Admin"), ("Non Admin");
-- Ajout admin
-- PasswordAdm4321
-- PasswordDev81021990
-- NApassword12345
INSERT INTO users (u_lname, u_fname, u_email, u_password, u_date_birth, u_gender, u_phone, id_role) VALUES
    ('Demeulenaere', 'François', 'demeulenaerefrancois7@yahoo.fr', '$2y$10$48PnUkxXZV645D98noyCQOS5NLulzqaE25do5jGolp5NdbZ.tWptq', '20240718', 'M', '0123456789', 1),
    ('Pommelet', 'Bérenger', 'b.pommelet@gmail.com', '$2y$10$RVJ8oPFYg9oOyG1oxXYwi.tGYGVw96DuFEmkYQ038aJhrhMV7uqYW', '20240718', 'M', '0123456789', 1),
    ('nonAdmin', 'Lambda', 'nondmin@gmail.com', '$2y$10$tzJLvjSvZT5qvMMuV2da/.L0Ga2LTLiiWB7pLhpPdtFVoehVPY9yK', '20240718', 'F', '0123456789', 2);



-- Utilisateurs random
INSERT INTO users (u_lname, u_fname, u_email, u_password, u_date_birth, u_gender, u_phone, id_role) VALUES
('Martin', 'Paul', 'paul.martin@gmail.com', '$2y$10$U8I.H7EckFmk0W4FzTXDKeAnvdsTlE5qVpOSvX/7bhZlo6nfiqgG2', '19850322', 'M', '0123456781', 2),
('Bernard', 'Marie', 'marie.bernard@gmail.com', '$2y$10$TxZ.jR5P6W/Jw4cD9Z6jUORvc2/xO5r6yGoSc4nB8mHSp1dZcRuQG', '19970711', 'F', '0123456782', 2),
('Dubois', 'Luc', 'luc.dubois@gmail.com', '$2y$10$Bn6Ae8.uUB0oWj5cI/HHBuIKXbgD1sCjDPT4npZLhmOW4rLqQuu7a', '19891230', 'M', '0123456783', 2),
('Petit', 'Chloe', 'chloe.petit@gmail.com', '$2y$10$uHO/7OIR.P1/vETvydY8XeVxZcG0eGe56W7u2E.lPpJHfScaBxV6.', '20011105', 'F', '0123456784', 2),
('Leroy', 'Julien', 'julien.leroy@gmail.com', '$2y$10$ihP4E8/L9/NYwRl.tjZB4Ow5Ndv/t4vYaYUPY2vEcLV7yR2g9tPkm', '19870617', 'M', '0123456785', 2),
('Moreau', 'Claire', 'claire.moreau@gmail.com', '$2y$10$Fl8nbZx5P1/NxWOYwb6mW.A1Me2GzG8Ns1WbHqD.VLVp9SEgRh0fi', '19931208', 'F', '0123456786', 2),
('Simon', 'Laura', 'laura.simon@gmail.com', '$2y$10$Uk/9tPH8/wdL.f1qlxIY/uzH5N7zEvgYvLaGHsZaFspuY4ZnV/A8S', '19990814', 'F', '0123456787', 2),
('Laurent', 'Mathieu', 'mathieu.laurent@gmail.com', '$2y$10$pL1IUehZhf3nyGNCEX6GFeAGJ6oK0k6QFm6tHqsYp0L5zTzC0La1K', '19811102', 'M', '0123456788', 2),
('Renard', 'Sophie', 'sophie.renard@gmail.com', '$2y$10$QaKZ1k5tlcJ3XqGmRjMm0OfYlj6mCeEIs7p3xNzAVsXkY5MW0Qf9a', '20030521', 'F', '0123456789', 2),
('Durand', 'Alice', 'alice.durand@gmail.com', '$2y$10$3HsUJX9mCQ.b2A4Y3l6sGOv2wM2xXyt0loE0/.O0guFF4Kn1PZIKa', '19951220', 'F', '0123456790', 2),
('Garnier', 'Nicolas', 'nicolas.garnier@gmail.com', '$2y$10$UYOgpxwF9lA5F7M1NUe3Ouy51MFpKQjkm4A4YqJc54oMQ0b6A1uW2', '19870318', 'M', '0123456791', 2),
('Rousseau', 'Emma', 'emma.rousseau@gmail.com', '$2y$10$EJ79Mi8kL5TSk8uQllZB.O5lZJVDmF5gkdbpSyB8p0gL3PfnOpSda', '20000704', 'F', '0123456792', 2),
('Faure', 'Marc', 'marc.faure@gmail.com', '$2y$10$0D7gyW63oSPQc5jTJe6YeemWvq9cCShO6h8nZ0H/NN3ZjQ1hRTmpS', '19901111', 'M', '0123456793', 2),
('Joubert', 'Sophie', 'sophie.joubert@gmail.com', '$2y$10$P8wWbNRty13UVEa1nCSCh.e7EqXTLfMkA9qAos.rRZ2KbV7eA3xU', '19860623', 'F', '0123456794', 2),
('Martin', 'Hugo', 'hugo.martin@gmail.com', '$2y$10$e5D4b87KrjEwA7RSmNFD9E7y4mMnh7GAtAmTAKQzCSjWn0sEzhfMy', '19940912', 'M', '0123456795', 2),
('Lemoine', 'Juliette', 'juliette.lemoine@gmail.com', '$2y$10$CwsXUHeYvFq/KT1geklDZuFb3M8r8RxU8K2YPFD3g1wB0q9K1mjC', '19880415', 'F', '0123456796', 2),
('Meyer', 'Louis', 'louis.meyer@gmail.com', '$2y$10$0dA2T3nFBHI9X5.LMTgAEuXybPSmWshOAtX2G7Jab0Of7uH3LVZK8', '19931203', 'M', '0123456797', 2),
('Lemoine', 'Clara', 'clara.lemoine@gmail.com', '$2y$10$7f0TjZ4PvVbRkcPQ7Ln4pA8slpBB7Yrz0J1E9qJXHqc0CTFzD0RQm', '20010610', 'F', '0123456798', 2),
('Pires', 'Gabriel', 'gabriel.pires@gmail.com', '$2y$10$H2d/8O5bZleDkD0abX5ZDe0FyPiP9E9rH2uOC16.l9szP5FZSmjq', '19891229', 'M', '0123456799', 2),
('Renaud', 'Amélie', 'amelie.renaud@gmail.com', '$2y$10$8mY8QJ6.nKXaN9F6l95p.euR3R8TIce.lRQxmXefXZo/iRDNtkQtm', '20000504', 'F', '0123456800', 2),
('Carpentier', 'Olivier', 'olivier.carpentier@gmail.com', '$2y$10$P5TboNVFdAV0VRREl1Fy5uZOUaZFEu9DYAEGiWXvVW2W5Urf3TYnm', '19840507', 'M', '0123456801', 2),
('Gautier', 'Isabelle', 'isabelle.gautier@gmail.com', '$2y$10$Kh32/LuA8JFLVmq0XAiA7eZZqvD1zoD5NOY0Jl67/ItWJ6lPU4l9S', '19950514', 'F', '0123456802', 2),
('Benoit', 'Julien', 'julien.benoit@gmail.com', '$2y$10$04Omi4QTCxT9Y8yKNk/2V.AXf4g8LVFSP5aZ7c7PvITQvn.4pX.mK', '19890321', 'M', '0123456803', 2),
('Gibert', 'Camille', 'camille.gibert@gmail.com', '$2y$10$LfAhb6Z2A8e7H9D4rB0bPeByo5XkLf5gsBYc8WZzSp.R.f8JXU/d2', '19961209', 'F', '0123456804', 2),
('Barbier', 'Pierre', 'pierre.barbier@gmail.com', '$2y$10$1Px5QIS./F8Fz4z.lP82zmeIGl68u3t6UStDNGfAfk5ZpWJMBIgZy', '19810910', 'M', '0123456805', 2),
('Lafont', 'Marie', 'marie.lafont@gmail.com', '$2y$10$u9.BfFmyZVOI0Q2P91TWE8nMDeOVtbEYf1OceCpJ8x6IvIG9pMBTq', '19931228', 'F', '0123456806', 2),
('Martin', 'Elise', 'elise.martin@gmail.com', '$2y$10$aeB1o/zBzxHUK5z5oI1zF6RvI2lo5/fqxXlcthmfOs2J6/fB5G.Vm', '19871214', 'F', '0123456807', 2),
('Lemoine', 'Paul', 'paul.lemoine@gmail.com', '$2y$10$V7dGkP15ACbHwgyEMRceh.t2S5TeYcecoT4ccP4OV7K8gZAVVzHYq', '19911230', 'M', '0123456808', 2),
('Fontaine', 'Alice', 'alice.fontaine@gmail.com', '$2y$10$KXZ/G2u1fh58b2DF9bxpi1tTZ/T.BYbcYFMe2YmWIX1sF5RyTaI0u', '20000312', 'F', '0123456809', 2),
('Poulain', 'Marc', 'marc.poulain@gmail.com', '$2y$10$B/FZ2GFO0h1u0bBv/74rY.F9V2YujmjDWjHGLaFQyWz6n6jH2czRa', '19890822', 'M', '0123456810', 2),
('Brun', 'Émilie', 'emilie.brun@gmail.com', '$2y$10$5P0BtpTzrtTZ2k2XoTpIbuJxHf6OaZV5FYBSS27BHeA7GfDz9aQIm', '19970305', 'F', '0123456811', 2),
('Martinez', 'Luc', 'luc.martinez@gmail.com', '$2y$10$3U0a5w12Q8q02KP0l9QfbeKlJRT6JnUwnEYz5vZ7XbqZqOhdJ24uG', '19861109', 'M', '0123456812', 2),
('Masson', 'Julien', 'julien.masson@gmail.com', '$2y$10$0zDlPp36JcBQfsyP1RdrzupxG7fZeD3B3H3l.NjI6bJtJY6iAzJOm', '19910916', 'M', '0123456813', 2),
('Leclerc', 'Adèle', 'adele.leclerc@gmail.com', '$2y$10$ZRu68nU05.A68UrK6kSxqey6BG4mVgmNUEd1fkcIAYe2ImhoD.YkS', '19821121', 'F', '0123456814', 2),
('Gosselin', 'Louis', 'louis.gosselin@gmail.com', '$2y$10$y3F9jG3tK3v4VVHGIRRtWepw4NptIV9/vvYo9D/3Pm4Qdzb0fknTu', '19980523', 'M', '0123456815', 2),
('Jean', 'Manon', 'manon.jean@gmail.com', '$2y$10$eCxqepChz3UZZKj9slzCduFWvH6CwF8UtIc5Fq7X.KCj9/W51.0ae', '19941030', 'F', '0123456816', 2),
('Deschamps', 'Alain', 'alain.deschamps@gmail.com', '$2y$10$D6m0tqa8w6eKjdb5OojJzUXkN8gVhE.W0S/bBCFQ0aYjDIX4oyfD6', '19771212', 'M', '0123456817', 2),
('Gibson', 'Nathalie', 'nathalie.gibson@gmail.com', '$2y$10$M6sC/DHDS/K3tBFz1Xhz/WJQ0XU4LY4GeF7t4OrcP1TRr9wd2zP7g', '19890511', 'F', '0123456818', 2),
('Roche', 'Simon', 'simon.roche@gmail.com', '$2y$10$zK6c7DPBdxFSXvPlHHRaQuy5q9zEITbBlaXUEM0M2w5RkVdM3D3Ne', '19921217', 'M', '0123456819', 2),
('Leger', 'Anna', 'anna.leger@gmail.com', '$2y$10$Tpaf9k11DSy9s6g6IfqQl9SB6ttUmqzRj/q7ZVvS63a7DpiXTTHkm', '20010601', 'F', '0123456820', 2),
('Bouchard', 'François', 'francois.bouchard@gmail.com', '$2y$10$dfI/bxgRwyP5Zx2fYkG3R.BB.JuVmR74sCs/xuXGVk6LVHxlaxN3e', '19751230', 'M', '0123456821', 2),
('Lambert', 'Juliette', 'juliette.lambert@gmail.com', '$2y$10$RAE6iJ6a/z7jYF0YsHYoXk4XcHh5iUMh83K6Lbc7A1Fd7xMB9WwHa', '19990423', 'F', '0123456822', 2),
('Bertin', 'Étienne', 'etienne.bertin@gmail.com', '$2y$10$Nsm8wQ9YOFeJXVGsbGF9Au1b4zNfAZmXYXctA78uHyZ2REu5kz0Oa', '19860508', 'M', '0123456823', 2),
('Pujol', 'Claudia', 'claudia.pujol@gmail.com', '$2y$10$0ZkP0URsz74U8/fjYZF7Xe.E0URptAG18.QG.S6f8JoCQv71UXMKi', '19880319', 'F', '0123456824', 2),
('Lopez', 'Rémi', 'remi.lopez@gmail.com', '$2y$10$TSDAElhpZyguLgm93bCEbuRgyQs/O7UtI6uQQKnMGzt7R5otYZme2', '19891201', 'M', '0123456825', 2),
('Caron', 'Lucie', 'lucie.caron@gmail.com', '$2y$10$aiiPLX1sLL0B9Q6bxIG1Lez6rc1fWhSOZEOxn8LfUwUouBZiPHt6', '19930829', 'F', '0123456826', 2),
('Martel', 'David', 'david.martel@gmail.com', '$2y$10$AE03c/VoXYGv3MBY0TuVWe/xTp9gkql5k4S2hZJ3gBxycAaWoDHL6', '19820614', 'M', '0123456827', 2),
('Joly', 'Nina', 'nina.joly@gmail.com', '$2y$10$PITJlG6pD4MN7m.VabYf9utHe.XIK5szm4FE.zp6H4sI9Z1uB8/Yq', '19951009', 'F', '0123456828', 2),
('Allard', 'Arnaud', 'arnaud.allard@gmail.com', '$2y$10$CD8E/X7Dqg8ld3ZkD.Pt/q.T1vl.VFxEjUAnRM7/8J8FqHvmyaxWq', '19850422', 'M', '0123456829', 2),
('Jacquet', 'Chloe', 'chloe.jacquet@gmail.com', '$2y$10$ZaGGFsxP.VYN/zyF3oyzeOge1kXHQzA1Ig9VuRUxH0pN6MNlbkjmi', '20011111', 'F', '0123456830', 2),
('Martinez', 'Nicolas', 'nicolas.martinez@gmail.com', '$2y$10$7a6OLa/6bLr70.OQ9KHukefChP8jvgF8TWiBsgnC5G7jZwIRiFNhS', '19921125', 'M', '0123456831', 2),
('Moulin', 'Elena', 'elena.moulin@gmail.com', '$2y$10$PbuEupKY0k8wNl8pOomB0uYvJ3NT71ETU0IcbGEMfdWQgLnHwd/qW', '19990818', 'F', '0123456832', 2),
('Lemoine', 'Vincent', 'vincent.lemoine@gmail.com', '$2y$10$6NiIMyAHwKYHXLdUUR0c9eA6aG4F4ZRBZRAF9WeMXz8TfJWWNKT9m', '19800717', 'M', '0123456833', 2),
('Brun', 'Claire', 'claire.brun@gmail.com', '$2y$10$PiI4a7i1l5LK0A7gZWY/.1mXkcyBWQtN08Qz5.TBf5zV7PV5AuQyW', '20021208', 'F', '0123456834', 2),
('Faure', 'Matthieu', 'matthieu.faure@gmail.com', '$2y$10$9d4pPo/MP.2J4qlsm/lFgu3g8Fc./f.zOhxt.fDWX8SuPM12pxCu6', '19930716', 'M', '0123456835', 2),
('Robert', 'Julie', 'julie.robert@gmail.com', '$2y$10$7Tnv1S7unbHVYFx2g0I/De.w83Cw.sV.QfhYFGPOqY5FVgsGTsWPS', '19970608', 'F', '0123456836', 2),
('Vidal', 'Luc', 'luc.vidal@gmail.com', '$2y$10$UgEbWz9G7FLrzYvef3ZKNKoIf/8Q0eOajI8vsM4S1n.FdVj/Pm8sO', '19921109', 'M', '0123456837', 2),
('Chauvet', 'Amélie', 'amelie.chauvet@gmail.com', '$2y$10$QF5uS5.z/mNWtLwz1oJ6k.KaaJUsL5eMBSgK8ReV.x4IcI2l5o1Km', '19950501', 'F', '0123456838', 2),
('Vernier', 'Sébastien', 'sebastien.vernier@gmail.com', '$2y$10$y7H9./B5DDmz1Rt9VowNDe9P1GNGYY.vMZ2P4wEVh5QH39ACR3VGQ', '19821219', 'M', '0123456839', 2),
('Dubois', 'Claudine', 'claudine.dubois@gmail.com', '$2y$10$Ku5X1EJKOu/Y6Z8O5T2DDu8BW8Z8koy8GbD9Ck8Wj5h7/E3fHnOly', '19881003', 'F', '0123456840', 2);


-- ======================================================
-- AJOUT QUESTIONNAIRE

-- NULL :               Value = 0
-- Interpersonnelle :   value = 1
-- Intrapersonnlle :    value = 2
-- Saptiale :           value = 3
-- Musicale :           value = 4
-- Ecologique :         value = 5
-- Kinesthésique :      value = 6
-- Verbale :            value = 7
-- Logique :            value = 8

INSERT INTO questionnaire (responses_questionnaire) VALUES
    ('Aucune donnée'),
    ('Interpersonnelle'),
    ('Intrapersonnlle'),
    ('Saptiale'),
    ('Musicale'),
    ('Ecologique'),
    ('Kinesthésique'),
    ('Verbale'),
    ('Logique');