<?php
use PHPMailer\PHPMailer\PHPMailer; // PHPMailer Namespace
require_once '../../../PHPMailer/vendor/autoload.php'; // Lädt alles notwendige für uns

// Array Monitor:
/*
echo '<pre>';
print_r($_POST);
echo '</pre>';
*/
$hasErrors = false; // Statusvariable
$errorMessages = array(); // container für alle Fehlermeldungen

// Variablen definieren für die Formularfelder
$email = '';
$message = '';

// Abfrage, ob überhaupt POST-Daten vorhanden sind - wenn nicht, muss auch keine Verarbeitung gemacht werden 
if( isset($_POST['email']) && isset($_POST['message'])  ){
    // 1 - SANITIZING - keine HTML tags (strip_tags()) oder leerschläge am Anfang/Ende (trim()) zulassen
    // Werte aus dem POST-Array in die vorher erstellten Variablen holen 
    $email = strip_tags( trim($_POST['email']) ); 
    $message = strip_tags( trim($_POST['message']));

    // echo 'die Formularfelder sind vorhanden'; // Testausgabe - landen wir überhaupt in der Verarbeitung?

    // 2 - VALIDATION - alle Felder auf korrekte Werte prüfen 
    // Email darf nicht leer sein und muss ein korrektes Format enthalten
    if( empty($email) ){
        $errorMessages[] = 'Bitte eine Email eingeben';
        $hasErrors = true;
    } else if( filter_var($email, FILTER_VALIDATE_EMAIL) == false ){
        // email nicht korrekt - Fehlermeldung
        $errorMessages[] = 'Email ungültig';
        $hasErrors = true;
    }

    // Nachricht darf nicht leer sein
    if( empty($message) ){
        $errorMessages[] = 'Bitte eine Nachricht eingeben';
        $hasErrors = true;
    }

    // Prüfen, ob alles OK
    if( $hasErrors == false ){
        // Bereit für den Mailversand
       
        $mailer = new PHPMailer();

        // Mailer konfigurieren
        $mailer->isSMTP();
        $mailer->Host = 'smtp.gmail.com'; // Postausgangsserver
        $mailer->SMTPAuth = true; // Autentifizierung verlangen
        $mailer->Username = 'du@deinedomain.com'; // Username / E-Mail deines Postausgangsservers du@deinedomain.com
        $mailer->Password = 'bliblablu123'; // Passwort für deinen Postausgangsserver
        $mailer->SMTPSecure = 'ssl'; // oder: tls
        $mailer->Port = 465; // oder: 587 (oder ganz andere Ports bei gewissen Providers)

        // Zeichensatz und Encoding festlegen, damit der MailClient weiss, wier er darstellen muss
        $mailer->CharSet = 'UTF-8'; 
        $mailer->Encoding = 'base64';

        // Mail vorbereiten
        $mailer->setFrom('citystrolch@gmail.com'); // Absender Adresse
        $mailer->addAddress('test-nio7mronj@srv1.mail-tester.com'); // Empfänger - deine Mailadresse

        $mailer->isHTML(false); // Plain Text verschicken
        $mailer->Subject = 'Kontakt vom PHP-Script'; // Betreff
        $mailer->Body = $message; // Mailinhalt vom Formular

        // Mailer ist nun bereit - mail senden
        $mailSent = $mailer->send(); // return ist true (versendet) oder false (nicht versendet)
        
        // User Feedback
        if($mailSent){
            $successMessage = 'Danke, wir haben deine Nachricht erhalten und melden uns so schnell wie möglich';
        }else{
            $errorMessages[] = "Die Mail konnte aus technischen Gründen nciht verschickt werden"; 
        }
    }

}

?>

<!DOCTYPE html>
<html lang="en-gb" dir="ltr">
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta charset="utf-8">
    </head>
<body>
<h3>Kontaktformular</h3>

<?php
// Success Message - falls vorhanden - in grünen Alert DIV ausgeben
if( isset($successMessage) >0 ){
    echo '<div style="color:green;background:#f6f6f6;padding:10px 20px;display: inline-block;margin-bottom: 10px;">'; // alert div - rot
    echo $successMessage; 
    echo '</div>';
}
// gesammelte Fehlermeldungen - falls vorhanden - in rotem alert DIV ausgeben 
if( count($errorMessages) >0 ){
    echo '<div style="color:red; background:#f6f6f6;padding:10px 20px;display: inline-block;margin-bottom: 10px;">'; // alert div - rot
    echo implode('<br>', $errorMessages); 
    echo '</div>';
}
?>

<form action="" method="POST" accept-charset="utf-8">
    <div>
        <label for="email">E-Mail</label>
        <input type="email" id="email" name="email" value="<?php echo $email ?>">
    </div>
    <div>
        <label for="message">Nachricht</label>
        <textarea id="message" name="message" rows="5"><?php echo $message ?></textarea>
    </div>
    <button type="submit">Absenden</button>
</form>
</body>
</html>