<?php
/**
 * COOKIE DEMO SCRIPT
 */

// Auftrag für den Browser, ein Cookie zu erstellen
setcookie('test', 'Hallo Welt'); // Cookie ohne Ablauf - "Session cookie"

setcookie('kurzertest', 'Diese Info bleibt nicht lang', time()+60);

print_r($_COOKIE);

// Auftrag zum Cookie löschen an den Browser
setcookie('test', '', 0);

?>