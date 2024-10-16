<?php
/**
 * Config File - hier werden alle Projektweit gültigen Werte abgelegt zum abrufen
 */

 define('NAVCLASS', 'navbar-nav ms-auto'); // Klasse für Navigationen (UL)
 define('MEDIAFOLDER', 'media'); // Ordner, in dem alle Bilder / Dateien gespeichert werden

 // Session config:
 define('SESSIONCOOKIE_NAME', md5('eigenesCookie')); // secret fpr das Sessioncookie
 define('SESSION_LIFETIME', 15); // login zeit wenn inaktiv in Minuten

 // Datenbank Config:
 define('DB_SERVER', 'localhost');
 define('DB_USER', 'root');
 define('DB_PASSWORD', '');
 define('DB_NAME', 'nico_db');
?>