<?php
// Verarbeitendes Script für die seite Login

$hasError = false;
$errorMessages = array();

// Loginprüfung
if( isset($_POST['username']) && isset($_POST['password']) ){
    // Gibt es einen User in der DB mit dem $_POST['username'] in der spalte email?

    $query = 'SELECT * FROM `user` WHERE useremail = :email';
    $statement = $db->prepare($query);
    $values = array('email' => $_POST['username']);
    $statement->execute( $values );

    $user = $statement->fetch( PDO::FETCH_ASSOC );
    if($user === false){
        // Kein User mit der angegebenen Email gefunden
        $hasError = true;
    }else{
        $passwortCheck = password_verify($_POST['password'], $user['userpassword']);
        if($passwortCheck === false){
            // Passwort stimmt nicht überein
            $hasError = true;
        }
    }

    if($hasError == true){
        $errorMessages[] = 'Benutzername oder passwort stimmt nicht';
    }else{
        // Benutzer einloggen (in Session)
        $_SESSION['username'] = $user['username']; // username in Session schreiben
        $_SESSION['userid'] = $user['ID']; // user ID in Session schreiben

        $_SESSION['logintime'] = time(); // Zeitstempel merken
        $_SESSION['userip'] = $_SERVER['REMOTE_ADDR'];
        $_SESSION['useragent'] = $_SERVER['HTTP_USER_AGENT'];
        $isLoggedIn = true; // Loginstatus überschreiben, damit Formular verschwindet im HTML
        $username = $_SESSION['username'];
    }

    var_dump($user);
    echo '<pre>';
    print_r($user);
    echo '</pre>';
}

?>