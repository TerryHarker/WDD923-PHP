<?php
require_once('config.php'); // DB Verbindungsdaten
$db = new PDO('mysql:host=localhost;dbname='.DBNAME, DBUSER, DBPASSWORD);

// Leere Variablen bereitstellen für das Formular
$id = '';
$vorname = '';
$nachname = '';
$geburtsdatum = '';
$email = '';
$telefon = '';


// Falls bestehender Datensatz, sollte eine ID vorhanden sein
if( isset($_GET['id'])){
    // Zuerst READ der bestehenden Daten
    $id = (int) $_GET['id'];
    $query = "SELECT * FROM studenten WHERE id = :id"; // Datensatz anhand der ID auslesen

    $statement = $db->prepare($query); // Server auf seinen Job vorbereiten mit Platzhalter für Variable
    $statement->execute( array( 'id'=>$id ) );
    $student = $statement->fetch(PDO::FETCH_ASSOC);
    
    echo '<pre>Daten aus Tabelle (für READ) ';
    print_r($student);
    echo '</pre>';

    // Variablen mit Werten aus DB füllen für das Formular
    $vorname = $student['vorname'];
    $nachname = $student['nachname'];
    $geburtsdatum = $student['geburtsdatum'];
    $email = $student['email'];
    $telefon = $student['telefon'];
}


echo '<pre>POST Daten (für UPDATE oder INSERT) ';
print_r($_POST);
echo '</pre>';
// Prüfen, ob Post Daten geschickt wurden
if( isset($_POST['vorname']) && isset($_POST['nachname']) && isset($_POST['geburtsdatum']) ){
    
    // TODO: abfragen, ob eine ID vorhanden ist (nicht leer)
    
    // TODO: ID vorhanden - bestehender Datensatz, der aktualisiert werden soll (UPDATE)
    
    // ID nicht vorhanden - Daten in DB schreiben (INSERT)
    $insertQuery = "INSERT INTO studenten 
    (vorname, nachname, geburtsdatum, email, telefon) 
    VALUES (:vorname, :nachname, :geburtsdatum, :email, :telefon)";

    $statement = $db->prepare($insertQuery);

    // Werte übermitteln für die Platzhalter:
    $statement->bindValue('vorname', $_POST['vorname'], PDO::PARAM_STR); // Vorname mitgeben als String
    $statement->bindValue('nachname', $_POST['nachname'], PDO::PARAM_STR); // Nachname mitgeben als String
    $statement->bindValue('geburtsdatum', $_POST['geburtsdatum'], PDO::PARAM_STR); // Geburtsdatum mitgeben als String
    $statement->bindValue('email', $_POST['email'], PDO::PARAM_STR); // Email mitgeben als String
    $statement->bindValue('telefon', $_POST['telefon'], PDO::PARAM_STR); // Telefon mitgeben als String

    print_r($statement);
    $statement->execute(); // Befehl ausführen
    header('Location: student-list.php');
}

?>
<h2>Student erfassen</h2>
<form action="student-edit.php" method="POST">
    <div>
        <label for="vorname">Vorname:</label>
        <input type="text" id="vorname" name="vorname" value="<?php echo $vorname; ?>">
    </div>
    <div>
        <label for="nachname">Nachname:</label>
        <input type="text" id="nachname" name="nachname"  value="<?php echo $nachname; ?>">
    </div>
    <div>
        <label for="geburtsdatum">Geburtsdatum:</label>
        <input type="date" id="geburtsdatum" name="geburtsdatum"  value="<?php echo $geburtsdatum; ?>">
    </div>
    <div>
        <label for="email">E-Mail:</label>
        <input type="email" id="email" name="email" value="<?php echo $email; ?>">
    </div>
    <div>
        <label for="telefon">Telefon:</label>
        <input type="tel" id="telefon" name="telefon" value="<?php echo $telefon; ?>">
    </div>

    <!-- ID Feld für bestehenden Datensatz -->
    <input type="hidden" name="id" value="<?php echo $id; ?>"> 
    
    <button type="submit">Speichern</button>
    <a href="student-list.php"><button type="button">Abbrechen</button></a>
</form>