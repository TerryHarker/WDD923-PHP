<?php
// Array Monitor:
/*
echo '<pre>';
print_r($_POST);
echo '</pre>';
*/

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
    } else if( filter_var($email, FILTER_VALIDATE_EMAIL) == false ){
        // email nicht korrekt - Fehlermeldung
        $errorMessages[] = 'Email ungültig';
    }

    // Nachricht darf nicht leer sein
    if( empty($message) ){
        $errorMessages[] = 'Bitte eine Nachricht eingeben';
    }

}

?>
<h3>Kontaktformular</h3>

<?php
// gesammelte Fehlermeldungen in einem alert DIV ausgeben 
if( count($errorMessages) >0 ){
    echo '<div style="color:red">'; // alert div - rot
    echo implode('<br>', $errorMessages); 
    echo '</div>';
}
?>

<form action="" method="POST">
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