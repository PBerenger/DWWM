-- =======================================================================================
--                                  Gestion des tables
-- =======================================================================================


-- POUR VOIR LE CONTENU VIDE de notre nouveau tableau : SHOW COLUMNS FROM nom_table ;



-- Créer la table attaque
CREATE TABLE attaque 
(
    idAttaque INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    nom VARCHAR(50)
);

-- Modifier la table attaque pour ajouter les champs
ALTER TABLE attaque
ADD baseDegat INT,
ADD test TINYINT;

-- Modifier le champs test en passant en varchar (50)
ALTER TABLE attaque
MODIFY test VARCHAR(50);

-- Renommer le champs test en « toto » en changeant aussi le type en INT
ALTER TABLE attaque
CHANGE test toto INT;

-- Supprimer le champ toto
ALTER TABLE attaque
DROP toto;

-- Créer la table « utilise » contenant l’id d’un personnage et l’id d’une attaque, et le level d’une attaque ???????????????????????????
CREATE TABLE utilise
(
    idAttaque INT PRIMARY KEY NOT NUL AUTO_INCREMENT,
    idPersonnage INT PRIMARY KEY NOT NUL AUTO_INCREMENT,
    levelAttaque VARCHAR(50)
);