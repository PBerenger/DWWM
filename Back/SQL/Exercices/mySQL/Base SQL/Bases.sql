-- ============================================================================
-- 1                            SELECT | FROM |AS
-- ============================================================================

-- Afficher tous les personnages
SELECT * FROM personnage ;

-- Afficher la liste des armes
SELECT * FROM arme ;

-- Afficher seulement le nom et le level minimum de toutes les armes
SELECT nom, levelMin FROM arme ;

-- Afficher le nom, le surnom et le level de tous les personnages
SELECT nom, surnom, level FROM personnage ;

-- Afficher le nom et le niveau de tous les personnages en modifiant les titres des colonnes en "Pseudo" et "Niveau";
SELECT nom AS Pseudo, level AS Niveau FROM personnage ;

-- Afficher le type des armes en renommant le type en "Type d'armes du jeu";
SELECT libelle AS 'Types d''armes du jeu' FROM typeArme ;
﻿


-- ===========================================================================
-- 2                     COUNT - SUM - AVG - MIN - MAX
-- ===========================================================================

-- Récupérer le nombre d’armes existantes
SELECT COUNT(*) AS 'nombre d''armes' FROM arme ;

-- Afficher le nombre de personnage du jeu (attention au nom de colonne)
SELECT COUNT(*) AS 'nombre de personnage' FROM personnage ;

-- Récupérer la moyenne des niveaux des personnages du jeu
SELECT AVG(level) AS 'moyenne des niveaux' FROM personnage ;

-- Récupérer la somme des points de force, d’agilité et d’intelligence de toutes les classes
SELECT SUM(baseForce) AS 'Point de Force', SUM(baseAgi) AS "Point d'Agilités", SUM(baseIntel) AS "Point d'Intéligence" FROM classe ;

-- Récupérer le « level » minimum et maximum des armes du jeu
SELECT MIN(levelMin) AS Minimum, MAX(levelMin) AS Maximum FROM arme ;

-- Additionner le nombre de points de caractéristique de toutes les classes
SELECT nom, SUM(baseForce + baseAgi + baseIntel) AS "NB points de caractéristique" FROM classe GROUP BY nom ;
    -- ou
SELECT nom, baseForce + baseAgi + baseIntel AS "NB points de caractéristique" FROM classe ;


-- ===========================================================================
-- 3                         CONCAT - SUBSTRING - LEFT
-- ===========================================================================

-- Afficher le nom et le surnom des personnages dans une seule colonne (concaténation)
SELECT CONCAT(nom, " ", surnom) AS "Personnages" FROM personnage ;

-- Afficher le nom des classes avec les points de caractéristique dans une seule colonne
SELECT CONCAT(nom, " - F : ", baseForce, " - A : ", baseAgi, " - I : ", baseIntel) AS "Classes" FROM classe ;

-- Afficher les 6 premières lettres des noms des personnages
SELECT SUBSTR(nom, 1,6) AS Tronqué FROM personnage ;

-- Afficher 5 premières lettres du nom des classes concaténées au 20 premières lettres de la description
SELECT CONCAT(LEFT(nom, 5),  " - ", LEFT(description, 20)) AS Classes FROM classe ;

-- ===========================================================================
-- 4                                   WHERE
-- =========================================================================== 

-- Récupérer toutes les armes dont le « level » minimum est de 5
SELECT * FROM arme WHERE levelMin >= 5 ;

-- Récupérer toutes les armes ayant un nombre de dégâts inférieur à 25
SELECT * FROM arme WHERE degat < 25 ;

-- Récupérer tous les personnages ayant le « level » 10 et n’affiche que leur nom et leur surnom
SELECT nom, surnom FROM personnage WHERE level = 10 ;

-- Récupérer toutes les armes à distance
SELECT * FROM typearme WHERE estDistance = 1 ;


-- ===========================================================================
-- 5                             AND – OR – BETWEEN
-- =========================================================================== 


-- Récupérer toutes les armes ayant un « level » minimum compris entre 4 et 8(inclus)
SELECT * FROM arme WHERE levelMin BETWEEN 4 AND 8 ;

-- Récupérer tous les personnages ayant un identifiant inférieur à 3 et un « level » égal à 10
SELECT * FROM personnage WHERE idPersonnage < 3 AND level = 10 ;

-- Récupérer toutes les armes ayant un « level » minimum inférieur à 4 ou supérieur à 8 (inclus)
SELECT nom, levelMin FROM arme WHERE levelMin < 4 OR levelMin >= 8 ;

-- Récupérer les armes 1,2 et toutes les armes ayant un nombre de dégâts supérieur ou egal à 30
SELECT * FROM arme WHERE idArme <= 2 OR degat >= 30 ;

-- Récupérer l’arme 1 et l’arme 2 et les armes ayant un nombre de dégâts compris entre 25 et 40
SELECT * FROM arme WHERE idArme = 1 OR idArme = 2 OR degat BETWEEN 25 AND 40 ;

-- Récupérer les personnages ayant un « level » différent de 8 et un « level » supérieur à 7 ou ayant un « level » inférieur à 6
SELECT * FROM personnage WHERE level != 8 AND (level > 7 OR level < 6) ;

-- Récupérer le nombre de personnage qui n’ont pas le « level » 10
SELECT COUNT(*) FROM personnage WHERE level !=10 ;

-- Récupérer la moyenne des dégâts des armes ayant un « level » compris entre 3 et 7
select avg(degat) as "Moyenne dégat" from arme where levelMin between 3 and 7 ;


-- ===========================================================================
-- 6                   LIKE – IN LIMIT – OFFSET – IS NULL
-- =========================================================================== 

-- Récupérer les personnages qui ont un nom commençant par la lettre « l »
SELECT * FROM personnage WHERE nom LIKE "L%" ;

-- Récupérer les personnages qui ont un nom commençant par la lettre « l » et se termine par « er »
SELECT * FROM personnage WHERE nom LIKE "L%" AND nom LIKE "%ER" ;
SELECT * FROM personnage WHERE nom LIKE "l%er" ;

-- Récupérer les armes contenant le mot « bois »
SELECT * FROM arme WHERE nom LIKE "%bois%" ;

-- Récupérer les armes commençant par A et ayant en troisième lettre B
SELECT * FROM arme WHERE nom LIKE "a_b%" ;

-- Récupérer les armes ayant comme identifiant 1,2,4,5,7
SELECT * FROM arme WHERE idArme in (1,2,4,5,7) ;

-- Récupérer les personnages ayant l’identifiant 2,3,4 et 6 et qui ont un « level » 10
SELECT * FROM personnage WHERE idPersonnage IN (2, 3, 4, 6) AND level = 10 ;

-- Récupérer les personnages ayant un surnom
SELECT * FROM personnage WHERE surnom IS  NULL ;

-- Récupérer le personnage n’ayant pas de surnom
SELECT * FROM personnage WHERE surnom IS NULL ;

-- Récupérer les 3 premières lignes de personnages
SELECT * FROM personnage LIMIT 3 ;

-- Récupérer les lignes 4 et 5 de la table « personnage »
SELECT * FROM personnage LIMIT 2 OFFSET 3 ;