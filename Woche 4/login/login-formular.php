<?php
$isLoggedIn = false; 
$hasError = false; // noch keine Fehler
$errorMessages = array();
$token_lifetime = 15; // Sekunden - so lange darf man fürs Login brauchen (Testwert, für den Produktiveinsatz eher 300, da sonst zu kurz)

session_start(); // Sessionzugriff aktivieren

// Form Token abfragen
if(!isset($_SESSION['token']) || !isset($_SESSION['token_time']) ){
    // Token und Timestamp in Session speichern
    $_SESSION['token'] = md5(uniqid()); 
    $_SESSION['token_time'] = time();
}
$token = $_SESSION['token']; // Tokenvariable für das Script

// Dummy credentials
$valid_username = 'Terry';
$valid_password = 'test1234';

if( isset($_POST['username']) && isset($_POST['password']) ){
    // Login Formular wurde abgeschickt

    // zuerst formtoken prüfen
    $tokentime = time() - $_SESSION['token_time'];
    if( !isset($_POST[$token]) || $tokentime>$token_lifetime ){
        // Postdaten wurden ohne oder mit veraltetem Token übermittelt - abblocken!
        $hasError = true; 
        $errorMessages[] = 'Token ist ungültig';
    }

    // nur wenn kein Tokenfehler entstanden ist, logindaten prüfen    
    if($hasError == false){
        if( $_POST['username'] == $valid_username && $_POST['password'] == $valid_password ){
            // user hat sich korrekt angemeldet
            $_SESSION['username'] = $_POST['username']; // username in Session schreiben
        }else{
            $hasError = true; 
            $errorMessages[] = 'Benutzername oder Passwort stimmt nicht';
        }
    }

}

// Prüfen, ob jemand angemeldet ist: 
if( isset($_SESSION['username']) ){
    $isLoggedIn = true; // loginstatus
    $username = $_SESSION['username'];
}

print_r($_SESSION);

// refresh token für den nächsten Loginversuch
$_SESSION['token'] = md5(uniqid()); // token überschreiben
$_SESSION['token_time'] = time(); // token time überschreiben
$token = $_SESSION['token']; // token variable überschreiben
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
        <input type="hidden" name="<?=$token ?>" value="1">
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