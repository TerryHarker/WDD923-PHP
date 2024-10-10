/*
JOIN Query über Tabelle "projekt" und Tabelle "user" 

Achtung: es gibt nun zwei Spalten "ID", daher muss der Tabellenname ebenfalls genannt werden 
(Bezeichnungen müssen IMMER eindeutig sein)

"LEFT" vor JOIN ist wichtig, um die linke (erste im Befehl) Tabelle zu priorisieren
es sollen hier alle Projekte erscheinen, auch wenn es keinen User gibt, der mit ihnen verknüpft ist
*/
SELECT *
FROM projekt 
LEFT JOIN user 
ON projekt.user_ID = user.ID

/* 
JOIN Query über die gleichen Tabellen, aber unter Verwendung von Alias (AS)
mit "AS" können alle Bezeichnungen (wie Spalten oder Tabellennamen), einen neuen Namen erhalten
z.B: 
 - die beiden ID Spalten erhalten einzigartige Namen, damit sie beide im Array ankommen (notwendig)
 - die Tabellen erhalten die Abkürzungen u und p, damit man weniger schreiben muss (optional)
 - username wird in "autor" umbenannt, weil dies in diesem Kontext mehr Sinn macht (optional)
*/
SELECT p.ID AS projektID, p.`projektname`, u.ID AS userID, u.`username` AS autor
FROM projekt AS p
LEFT JOIN user AS u
ON p.user_ID = u.ID


/*
BSP Studenten und Hobbies: 
JOIN Query über Tabelle "student" und Tabelle "hobby" mit Hilfstabelle (3 Schritte)
Du solltest so alle Studenten sehen, und diejenigen, die ein oder mehrere Hobbies haben, werden diesen zugewiesen
Unter Umständen sind Studenten mehrfach aufgelistet (wenn sie mehrere Hobbies haben)
*/
SELECT *
FROM student AS s
LEFT JOIN student_has_hobby AS sh ON s.ID = sh.studentID
LEFT JOIN hobby AS h ON sh.hobbyID = h.ID