-- ===========================================================================
-- ===========================================================================
--                              JOINTURES - JOIN
-- =========================================================================== 
-- ===========================================================================



-- ===========================================================================
-- 1                             Jointures internes
-- =========================================================================== 


-- Récupérer tous les personnages et leur classe
SELECT *
FROM personnage
INNER JOIN classe ON personnage.idClasse = classe.idClasse ;

-- Récupérer toutes les armes et leur type, vous devez afficher seulement le nom de l’arme, le level minimum, les dégâts de l’arme, le libelle, et le champ est à distance
SELECT nom, levelMin, libelle, estDistance
FROM arme
INNER JOIN typearme ON arme.idTypeArme = typearme.idTypeArme ;


-- ===========================================================================
-- 2                        Jointures et surnom de tables
-- =========================================================================== 


-- Récupérer le nom des personnages et le nom de leur classe
SELECT personnage.nom, classe.nom
FROM personnage
INNER JOIN classe ON personnage.idClasse = classe.idClasse ;

-- Récupérer l’arme qui est utilisée par chaque personnage
SELECT personnage.nom, arme.nom, levelMin, degat
FROM personnage
INNER JOIN arme ON personnage.idArmeUtilise = arme.idArme ;

-- Récupérer l’arme qui est utilisée par chaque personnage et le type d’arme
SELECT personnage.nom, arme.nom, levelMin, degat, typearme.libelle AS "Type d'arme", estDistance
FROM arme
JOIN personnage ON arme.idArme = personnage.idArmeUtilise
JOIN typearme ON arme.idTypeArme = typearme.idTypeArme ;


-- ===========================================================================
-- 3                           Jointures et filtres
-- =========================================================================== 


-- Récupérer toutes les armes de tous les personnages
SELECT personnage.nom AS "Nom Personnage", level, arme.nom AS "Arme", levelMin
FROM dispose
JOIN personnage ON dispose.idpersonnage = personnage.idpersonnage
JOIN arme ON dispose.idArme = arme.idArme ;

-- Récupérer toutes les armes qui ne sont pas à distance
SELECT arme.nom, arme.levelMin AS "Level", degat, typearme.libelle AS "Type"
FROM typearme
JOIN arme ON arme.idTypeArme = typearme.idTypeArme
WHERE estDistance = 0 ;

-- Récupérer l’arme utilisée par chaque guerrier
SELECT personnage.nom AS "Personnage", arme.nom AS "Arme utilisée", typearme.libelle AS "Type d'Arme"
FROM arme
JOIN personnage ON personnage.idArmeUtilise = arme.idArme
JOIN typeArme ON arme.idTypeArme = typeArme.idTypeArme
WHERE idClasse = 1 ;

-- ===========================================================================
-- 4                       Jointures calcul et tris
-- =========================================================================== 


-- Récupérer toutes les armes dont disposent les joueurs ayant le level 10 ??????
SELECT personnage.idPersonnage, personnage.nom AS "Perso", arme.nom AS "Arme", typearme.libelle AS "Type"
FROM dispose
JOIN arme ON arme.idArme = dispose.idArme
JOIN typearme ON typearme.idTypeArme = arme.idTypeArme
JOIN personnage ON personnage.idPersonnage = dispose.idPersonnage
WHERE personnage.level = 10 ;

-- Récupérer toutes les armes dont disposent les joueurs ayant le level 10, triées par idPersonnage

SELECT personnage.idPersonnage, personnage.nom AS "Perso", arme.nom AS "Arme", typearme.libelle AS "Type"
FROM dispose
JOIN arme ON arme.idArme = dispose.idArme
JOIN typearme ON typearme.idTypeArme = arme.idTypeArme
JOIN personnage ON personnage.idPersonnage = dispose.idPersonnage
WHERE personnage.level = 10
ORDER BY personnage.idPersonnage ;

-- Récupérer la moyenne des dégats des armes à distance
SELECT AVG(degat) AS "Moyenne de dégats des armes à distance"
FROM arme
JOIN typearme ON typearme.idTypeArme = arme.idTypeArme
WHERE estDistance = 1 ;

-- Récupérer tous les personnages disposant d’une arme d’un type commençant par « a »
SELECT DISTINCT personnage.nom AS "Nom"
FROM dispose
JOIN arme ON arme.idArme = dispose.idArme
JOIN typearme ON typearme.idTypeArme = arme.idTypeArme
JOIN personnage ON personnage.idPersonnage = dispose.idPersonnage
Where typearme.libelle LIKE "a%" ;

-- ===========================================================================
-- 5                            Jointures Externes
-- =========================================================================== 


-- Récupérer tous les types d’armes même ceux qui n’ont pas d’arme associée
SELECT typearme.libelle, arme.nom
FROM typearme
LEFT JOIN arme ON arme.idTypeArme = typearme.idTypeArme;

-- Récupérer tous les types d’armes, et afficher les armes pour chaque type (même les types qui n’ont pas d’arme). Avec un RIGHT JOIN
SELECT typearme.libelle, arme.nom
FROM arme
RIGHT JOIN typearme ON arme.idTypeArme = typearme.idTypeArme;

-- Récupérer toutes les armes et afficher le personnage qui les utilise, ordonnées par le level minimum(l’objectif est de récupérer toutes armes et d’associer les personnages)
SELECT arme.idArme, arme.nom, levelMin, degat, idTypeArme, personnage.idPersonnage, surnom, level, idArmeUtilise, idClasse
FROM arme
LEFT JOIN personnage ON personnage.idArmeUtilise = arme.idArme
ORDER BY levelMin;

-- Récupérer toutes les armes et voir les personnages qui les ont en leur possession (table dispose), avec RIGHT JOIN (ordonné)
SELECT arme.idArme, arme.nom, personnage.nom AS "Personnage"
FROM dispose
JOIN personnage ON personnage.idPersonnage = dispose.idPersonnage
RIGHT JOIN arme ON arme.idArme = dispose.idArme;