<?php
/**
 * Datenbank abfragen etc.
*/

// Befehl zum Auslesen aller Projekte
$query = "SELECT * FROM projekt";
$abfrageObj = $db->query($query);
$list = $abfrageObj->fetchAll(PDO::FETCH_ASSOC);

?>