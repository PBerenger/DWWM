-- =====================================================================
--                      Regroupement et GROUP BY
-- =====================================================================


-- Afficher le nombre d’arme par type d’arme
SELECT typearme.libelle AS "Type d'arme", COUNT(arme.idTypeArme) AS "Nb d'arme"
FROM arme
JOIN typearme ON typearme.idTypeArme = arme.idTypeArme
GROUP BY typearme.idTypeArme ;

-- Afficher le nombre de personnage par classe
SELECT classe.nom AS "Classe", classe.description AS "Description", COUNT(personnage.idClasse) AS "Nb Personnage"
FROM personnage
JOIN classe ON personnage.idCLasse = classe.idCLasse
GROUP BY personnage.idCLasse ;

-- Afficher le nombre d’armes dont dispose chaque personnage
SELECT personnage.nom AS "Nom", COUNT(personnage.idArmeUtilise) AS "Nb d'arme à disposition"
FROM dispose
JOIN arme ON arme.idArme = dispose.idArme
JOIN personnage ON personnage.idPersonnage = dispose.idPersonnage
GROUP BY personnage.nom ;
-- ou
SELECT p.nom AS "Nom du personnage", COUNT(d.idArme) AS "Nombre d'armes"
FROM personnage p
LEFT JOIN dispose d ON p.idPersonnage = d.idPersonnage
GROUP BY p.nom;

-- Afficher le nombre d’armes dont dispose chaque personnage mais seulement les guerriers
SELECT classe.nom, personnage.nom, COUNT(dispose.idPersonnage)
FROM classe
JOIN personnage ON personnage.idClasse = classe.idClasse
JOIN dispose ON dispose.idPersonnage = personnage.idPersonnage
WHERE classe.nom = "Guerrier" 
GROUP BY personnage.nom;

-- Afficher le nombre de personnage par arme
SELECT arme.nom, COUNT(dispose.idPersonnage)
FROM arme
JOIN dispose ON dispose.idArme = arme.idArme 
GROUP BY arme.nom ;

-- Afficher le niveau moyen de chaque classe
SELECT classe.nom AS "Classe", AVG(personnage.level) AS "Niveau moyen" 
FROM personnage
INNER JOIN classe ON personnage.idClasse = classe.idClasse  
GROUP BY classe.nom;


-- =====================================================================
--                      Regroupement et GROUP BY
-- =====================================================================


-- Afficher le niveau moyen de chaque classe et ne récupérer que les classes ayant un niveau minimum de 9
SELECT classe.nom AS "Classe", AVG(personnage.level) AS "Niveau moyen" 
FROM personnage
INNER JOIN classe ON personnage.idClasse = classe.idClasse  
GROUP BY `Classe`
HAVING `Niveau moyen` >= 9 ;

-- Afficher le nombre de personnage par arme et ne garder que les armes ayant entre 1 et 2 utilisateurs (table dispose)
SELECT arme.nom, COUNT(dispose.idPersonnage) AS "Compte"
FROM arme
JOIN dispose ON dispose.idArme = arme.idArme
GROUP BY arme.nom
HAVING `Compte` BETWEEN 1 AND 2
ORDER BY `Compte` DESC ;
-- ou (pour l'orde automatique à l'affichage)
SELECT
    arme.nom AS 'Nom',
    count(*) AS "Nombre d'utilisateurs"
FROM dispose
RIGHT JOIN arme ON dispose.idArme = arme.idArme
JOIN personnage ON dispose.idPersonnage = personnage.idPersonnage
GROUP BY `Nom`
HAVING `Nombre d'utilisateurs` BETWEEN 1 AND 2 ;

-- Afficher le nombre d’arme par type d’arme mais ne prendre que les armes de corps à corps présentes au maximum 1 fois
SELECT libelle AS "Type", COUNT(idArme) AS "Nb d'Arme"
FROM typearme
LEFT JOIN arme ON arme.idTypeArme = typearme.idTypeArme
WHERE estDistance = 0
GROUP BY `Type`
HAVING `Nb d'Arme` <= 1 ;