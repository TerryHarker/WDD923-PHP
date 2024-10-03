<?php
require_once('config.php'); // DB Verbindungsdaten
$db = new PDO('mysql:host=localhost;dbname='.DBNAME, DBUSER, DBPASSWORD);

// Löschen, falls Löschaktion gefordert - manipulation zuerst, vor dem auslesen
if( isset($_GET['action']) &&  $_GET['action']=='delete'){
    $deleteID = isset($_GET['id']) ? (int) $_GET['id'] : 0;
    echo 'deleteID: '.$deleteID;
    
    // Löschbefehl mit ID Variable erstellen
    $deleteQuery = 'DELETE FROM studenten WHERE id = '.$deleteID;
    echo '<br>deleteQuery: '.$deleteQuery;
    
    // $deleted = $db->query($deleteQuery); // Löschbefehl abschicken - unsicher, SQL Injection gefahr
    $statement = $db->prepare('DELETE FROM studenten WHERE id= :id '); // Server auf seinen Job vorbereiten mit Platzhalter für Variable
    $statement->execute( array( 'id'=>$deleteID ) );

    header('Location: student-list.php'); // Liste noch mal ohne Parameter aufrufen
}

// Daten auslesen
$query = "SELECT * FROM studenten LIMIT 0, 10";
$resultat = $db->query($query); // Anfrage senden (bei select werden daten bereitgestellt)
$daten = $resultat->fetchAll(PDO::FETCH_ASSOC); // Daten in Assoziativen Arrays zurückgeben


echo '<pre>';
// print_r($daten);
echo '</pre>';
?>

<h3>Studenten Liste</h3>
<div style="margin:10px 0;">
    <a href="student-edit.php">[+ Student erfassen]</a>
</div>
<table border="1">
    <tr>
        <th>ID</th>
        <th>Vorname</th>
        <th>Nachname</th>
        <th>Geburtsdatum</th>
        <th>E-Mail</th>
        <th>Telefon</th>
        <th></th>
    </tr>
    <?php foreach( $daten as $student ){ ?>
    <tr>
        <td><?php echo $student['id']; ?></td>
        <td><?php echo $student['vorname']; ?></td>
        <td><?php echo $student['nachname']; ?></td>
        <td><?php echo $student['geburtsdatum']; ?></td>
        <td><?php echo $student['email']; ?></td>
        <td><?php echo $student['telefon']; ?></td>
        <td><a href="student-list.php?action=delete&id=<?php echo $student['id']; ?>" onclick="return confirmDelete();">[x]</a></td>
        <td><a href="student-edit.php?id=<?php echo $student['id']; ?>">[edit]</a></td>
    </tr>
    <?php } ?>
</table>

<script>
function confirmDelete() {
    return confirm('Wirklich löschen?');
}
</script>