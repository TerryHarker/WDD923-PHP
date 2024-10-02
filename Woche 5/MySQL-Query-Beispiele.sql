/**
* Datenmanipulation für MySQL, auch "CRUD" (create, read, update, delete) genannt
* Es sind eigentlich nur 4 Befehle, die man im Alltag in einer Webapplikation benötigt
* Die Befehle, die die Struktur betreffen (Tabellen erstellen etc.) kann man meistens in PHPMyAdmin machen 
*/

-- READ ist der vielfältigste der 4 CRUD Befehle: 

-- die ersten 10 Datensätze, deren Geburtstag Jahrgang 2000 oder jünger ist
SELECT *
FROM `studenten`
WHERE `geburtsdatum` > '2000-01-01'
LIMIT 0, 10

-- die ersten 10 Datensätze, deren Geburtstag Jahrgang 2000 oder jünger ist - nach Nachname Aufsteigend sortiert
SELECT *
FROM `studenten`
WHERE `geburtsdatum` > '2000-01-01'
ORDER BY `nachname` ASC
LIMIT 0, 10

-- Datensätze, bei denen der Vorname 'Evelin' ist
SELECT *
FROM `studenten`
WHERE `vorname` = "Evelin"

-- Datensätze durchsuchen nach einem Wort "ad" im Namen und ab Jahrgang 2000
SELECT *
FROM `studenten`
WHERE (`vorname` LIKE "%ad%" OR `nachname` LIKE "%ad%")
AND `geburtsdatum` >= '2000-01-01'




-- CREATE - einen neuen Datensatz hinzufügen
INSERT INTO `studenten` (`id`, `vorname`, `nachname`, `geburtsdatum`, `email`, `telefon`) VALUES
(1, 'Ginger', 'Jaimez', '2000-04-19', 'gjaimez0@yolasite.com', '+254 268 177 8149')


-- UPDATE - Einen bestehenden Datensatz anpassen
UPDATE studenten
SET `geburtsdatum` = '1980-02-26', `telefon` = '0000000'
WHERE `id` = 501


-- DELETE - Einen bestimten Datensatz löschen
DELETE FROM studenten
WHERE `id` = 502