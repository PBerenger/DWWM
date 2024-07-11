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