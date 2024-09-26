<?php
/**
 * LOGIN SCRIPT
 */

// Config laden
require_once('config.php');

session_name(SESSIONCOOKIE_NAME); // Name des session cookies - muss VOR session_start() passieren
session_start(); // Sessionzugriff aktivieren

$isLoggedIn = false; 
$hasError = false; // noch keine Fehler
$errorMessages = array();

// Dummy credentials
$valid_username = 'Terry';
$hashed_password = '$2y$10$RjDsAXk8hSWx2Ed2o055vurEy5Cf7qHwTGU00GI./Mxck0MP1AeL.';

// Loginprüfung
if( isset($_POST['username']) && isset($_POST['password']) ){
    // Login Formular wurde abgeschickt

    $korrektesPW = password_verify($_POST['password'], $hashed_password); 
    echo 'korrektesPW: ';
    var_dump( $korrektesPW );

    if( $_POST['username'] == $valid_username && $korrektesPW == true ){
        // user hat sich korrekt angemeldet
        $_SESSION['username'] = $_POST['username']; // username in Session schreiben
        $_SESSION['logintime'] = time(); // Zeitstempel merken
        $_SESSION['userip'] = $_SERVER['REMOTE_ADDR'];
        $_SESSION['useragent'] = $_SERVER['HTTP_USER_AGENT'];
    }else{
        $hasError = true; 
        $errorMessages[] = 'Benutzername oder Passwort stimmt nicht';
    }
}

/** 
 * Usersession Check - dieser Teil könnte in eine Funktion ausgelagert werden
 */ 
$loginError = false;
if( !isset($_SESSION['username']) ){
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
    unset($_SESSION['logintime']);
    unset($_SESSION['userip']);
    unset($_SESSION['useragent']);
}

session_regenerate_id(); // defniert eine neue Sesion ID und kann nach jedem Scriptaufruf am Schluss gemacht werden

echo '<pre>Session: ';
print_r($_SESSION);
echo '</pre>';

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>

<?php if(!$isLoggedIn): ?>
    <h2>Login</h2>

    <?php if ($hasError && count($errorMessages)): ?>
        <p style="color: red;"><?php echo implode('<br>', $errorMessages); ?></p>
    <?php endif; ?>

    <form action="" method="POST">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required>
        <br>
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required>
        <br>
        <button type="submit">Login</button>
    </form>
    User: Terry / Passwort: test1234
<?php else : ?>
    <h2>Willkommen, <?=$username ?></h2>
    <p>Du bist jetzt eingeloggt.</p>
    <a href="logout.php">Abmelden</a>
<?php endif; ?>
    
</body>
</html>