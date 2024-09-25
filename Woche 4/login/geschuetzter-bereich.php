<?php
/**
 * Diese Seite / dieses Script darf ohne autentifizierung 
 * NICHT aufgerufen werden
 */
session_start();

// Prüfen, ob jemand angemeldet ist: 
if( !isset($_SESSION['username']) ){
    // stop, umleiten, abbrechen
    header("Location: login-formular.php");
    exit(); // Abbruch
}

?>
<h3>Geschützter Bereich (Adminbereich)</h3>
