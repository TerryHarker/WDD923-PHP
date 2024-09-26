<?php
/**
 * LOGOUT SCRIPT
 */

// Config laden
require_once('config.php');

// Logout Script
session_name(SESSIONCOOKIE_NAME); // Name des session cookies - muss VOR session_start() passieren
session_start();

// Logout bedeutet, alle diese Werte, mit denen geprüft wird, wieder zu entfernen / zurückzusetzen. Diese Zeilen könnten auch in einer funktion stehen
unset($_SESSION['username']);
unset($_SESSION['logintime']);
unset($_SESSION['userip']);
unset($_SESSION['useragent']);

session_regenerate_id(); // neue Session ID (neuer Wert im Session Cookie)

?>