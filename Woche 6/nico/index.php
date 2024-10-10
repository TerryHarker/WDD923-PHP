<?php
/**
 * CONTROLLER - diese Datei wird immer geladen
 * Sie ist somit zuständig für alles "globale", was im gesamten Projekt gebraucht wird
 * - globale Werte (config, variablen initialisieren)
 * - globale Funktionen (funktionsdefinitionen aus der Library) 
 * - globale Aktionen (code, der für alle Seiten gilt, wie z.B. Session Start, Login Check, DB connection etc.)
 */

require_once('config.php'); // Projektweite Definitionen
require_once('library/navigation.php'); // Funktionen für die Navigation
// ...hier könnten weitere Funktions-Files geladen werden

// session initialisieren
session_name(SESSIONCOOKIE_NAME); // Name des session cookies - muss VOR session_start() passieren
session_start(); // Sessionzugriff aktivieren

/** 
 * Usersession Check - dieser Teil könnte in eine Funktion ausgelagert werden
 */ 
$isLoggedIn = false; // Login Status

$loginError = false; // Login error für den Login Check
if( !isset($_SESSION['userid']) || !isset($_SESSION['username']) ){
    $loginError = true;
}

// Prüfen, wie lange das Login her ist, zu lange inaktiv = ungültig
$session_lifetime = SESSION_LIFETIME*60; // Lifetime in Sekunden umrechnen
if( !isset($_SESSION['logintime']) || time()-$_SESSION['logintime'] > $session_lifetime ){
    $loginError = true;
}

// Prüfen, ob UserIP und UserAgent noch gleich sind, wie beim Login
if( !isset($_SESSION['userip']) || $_SESSION['userip'] != $_SERVER['REMOTE_ADDR'] ){
    $loginError = true;
}
if( !isset($_SESSION['useragent']) || $_SESSION['useragent'] != $_SERVER['HTTP_USER_AGENT'] ){
    $loginError = true;
}


// Entscheidung, ob gültige Usersession oder nicht
if( $loginError == false ){
    // Usersession ist gültig, user als eingeloggt behandeln
    $isLoggedIn = true; // loginstatus
    $username = $_SESSION['username']; // Username für die Begrüssung
    $_SESSION['logintime'] = time(); // Session time erneuern, damit man eingeloggt bleibt wenn man aktiv ist (=Script regelmässig neu lädt)
}else{
    // Session ist nicht gültig - zurücksetzen (= logout funktion)
    unset($_SESSION['username']);
    unset($_SESSION['userid']);
    unset($_SESSION['logintime']);
    unset($_SESSION['userip']);
    unset($_SESSION['useragent']);
}
// echo '<br>test isLoggedIn: '.$isLoggedIn;


// DB connection initialisieren
$db = new PDO('mysql:host='.DB_SERVER.';dbname='.DB_NAME, DB_USER, DB_PASSWORD);

// Page Variable initialisieren (für Nav und Includes)
$page_default = 'home'; // wenn kein page wert mitgegeben in GET
$page = isset($_GET['page']) ? $_GET['page'] : $page_default;
// echo <br>test page variable: '.$page; 


// Vorbereitendes Script laden, wenn es existiert
$script_pfad = 'scripts/'.$page.'.php';
if( is_file($script_pfad) ){
    include($script_pfad); // script für verarbeitung, keine Ausgabe
}


session_regenerate_id(); // Session ID erneuern gegen Session Hijacking, wird am Schluss des verarbeitenden Codes gemacht
?>
<!DOCTYPE html>
<html lang="en-gb" dir="ltr" vocab="http://schema.org/">

<?php
// HTML Head
include( 'partials/head.php' );
?>

<body>

<?php
// Navigation
include( 'partials/nav.php' );


// Datei nur laden, wenn sie auch existiert
$view_pfad = 'views/'.$page.'.php';
if( is_file($view_pfad) ){
    include($view_pfad); // view, nur ausgabe
}else{
    // wenn eine Datei angefordert wird die nicht existiert
    header("Location: index.php"); // z.B. Umleitung zu home - header schreibt in den Response Header
}
// HTML Footer
include( 'partials/footer.php' );
?>
	</body>
</html>