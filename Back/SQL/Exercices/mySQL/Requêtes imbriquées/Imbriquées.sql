-- ========================================================================================
--                                  Requêtes imbriquées
-- ========================================================================================

-- Récupérer les armes ayant un nombre de dégâts supérieurs à la moyenne du nombre de dégâts de toutes les armes
SELECT nom, degat
FROM arme
WHERE degat > (
    SELECT AVG(degat)
    FROM arme
);


-- Récupérer les personnages ayant un « level » inférieur à la moyenne
SELECT *
FROM personnage
WHERE level < (
    SELECT AVG(level)
    FROM personnage
);


-- Récupérer les personnages ayant un « level » supérieur à la moyenne des archers
SELECT *
FROM personnage
WHERE level > (
    SELECT AVG(level)
    FROM personnage
    JOIN classe ON classe.idClasse = personnage.idClasse
    WHERE classe.nom = "archer"
);



-- ========================================================================================
--                               Requêtes imbriquées Complexes
-- ========================================================================================

-- Pour les armes à distances, récupérer le nombre maximum d’occurrence du type d’arme
SELECT
    MAX(valeur)
FROM (SELECT COUNT(*) AS 'valeur'
        FROM arme  
        JOIN typeArme ON arme.idTypeArme = typeArme.idTypeArme
        WHERE estDistance = 1
        GROUP BY typeArme.idTypeArme) t1;

        -- besoin d'un alias d'où le t1