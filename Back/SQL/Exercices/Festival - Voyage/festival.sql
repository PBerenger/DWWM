1 -
SELECT titre FROM representation ;

2 -
SELECT titre FROM representation WHERE lieu = 'mogador';

3 -
SELECT nomMusicien, titre
FROM musicien
JOIN representation ON musicien.idRepresentation = representation.idRepresentation;

4 -
SELECT representation.titre, representation.lieu, programmer.tarif
FROM representation
JOIN programmer ON representation.idRepresentation = programmer.idRepresentation 
WHERE date = '2022-07-25';

5 -
SELECT COUNT(*)
FROM musicien
JOIN programmer ON musicien.idRepresentation = programmer.idRepresentation
WHERE programmer.idRepresentation = '20';

6 -
SELECT representation.titre, programmer.date, tarif
FROM programmer
JOIN representation ON programmer.idRepresentation = representation.idRepresentation
WHere tarif <= 50 ;