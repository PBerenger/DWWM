1 -
SELECT DISTINCT nom, prenom, email
FROM client
JOIN reservation ON client.idClient = reservation.idClient
WHERE reservation.idClient;

2 -
SELECT DISTINCT nom, prenom, email
FROM client
JOIN reservation ON client.idClient = reservation.idClient
WHERE reservation.idClient NOT IN (
    SELECT reservation.idClient
    FROM reservation
    WHERE reservation.idClient IS NULL
);

3 -
SELECT DISTINCT nom, destination, prix
FROM voyage
JOIN client ON voyage.idVoyage = client.idClient
WHERE prix <= 1000 AND duree > 10;

4 -
SELECT DISTINCT numCB
FROM client
JOIN reservation ON client.idClient = reservation.idClient;