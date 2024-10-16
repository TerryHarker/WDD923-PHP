<?php
/**
 * Bearbeiten der Projektetabelle
 */

// Dies ist eine reine Admin-Ansicht, nicht eingeloggte sollen hier nichts machen und sehen
if(!$isLoggedIn){
    // Umleitung zum Login
    header("Location: index.php?page=login");
    exit;
}


$id = 0; // Defaultwert der ID, wenn nicht vorhanden
 if( isset($_GET['id'])){
    // Zuerst READ der bestehenden Daten anhand der ID aus GET (URL)
    $id = (int) $_GET['id'];
    $query = "SELECT * FROM projekt WHERE id = :id"; // Datensatz anhand der ID auslesen

    $statement = $db->prepare($query); // Server auf seinen Job vorbereiten mit Platzhalter für Variable
    $statement->execute( array( 'id'=>$id ) );
    $projekt = $statement->fetch(PDO::FETCH_ASSOC);
    
    echo '<pre>Daten aus Tabelle (für READ) ';
    print_r($projekt);
    echo '</pre>';

    // Variablen mit Werten aus DB füllen für das Formular
    $projekturl = $projekt['projekturl'];
    $projektname = $projekt['projektname'];
    $projektbeschreibung = $projekt['projektbeschreibung'];
}

// Post Daten verarbeiten, wenn formular abgesendet
if( isset($_POST['id']) && isset($_POST['projektname']) && isset($_POST['projektbeschreibung']) ){
    
    $projektname = $_POST['projektname'];
    $projektbeschreibung = $_POST['projektbeschreibung'];

    echo '<pre>';
    print_r($_FILES);
    echo '</pre>';
    
    // wurde ein neues Bild hochgeladen?
    $hochgeladen = false;
    if( $_FILES['projekturl']['error'] == 0 ){
        // Validierung (Dateityp, Grösse etc.) wird hier weggelassen
        $tempPfad = $_FILES['projekturl']['tmp_name'];
        $zielPfad = MEDIAFOLDER.'/'.$_FILES['projekturl']['name'];

        $hochgeladen = move_uploaded_file($tempPfad, $zielPfad);
        $projekturl = $_FILES['projekturl']['name'];
    }

    // Datenbankeintrag
    if( $_POST['ID']>0 ) {
        // bestehender Beitrag - UPDATE
        $id = $_POST['ID'];
        $values = array(
            'pid' => $id,
            'pname' => $projektname,
            'pbeschreibung' => $projektbeschreibung
        );
        $query = "UPDATE projekt SET projektname=:pname, projektbeschreibung=:pbeschreibung";
        
        if($hochgeladen==true){
            $query .= ", projekturl=:purl";
            $values['purl'] = $projekturl; 
        }
        $query .= " WHERE id=:pid";
        echo 'insert query: '.$query;

        $statement = $db->prepare($query);
        $statement->execute($values);
    }else{
        // ID ist 0 - INSERT
        $projektname = $_POST['projektname'];
        $projektbeschreibung = $_POST['projektbeschreibung'];


        $query = "INSERT INTO projekt (projekturl, projektname, projektbeschreibung)";
        $query .= "VALUES (:purl, :pname, :pbeschreibung)";

        $values = array(
            'purl' => '',
            'pname' => $projektname,
            'pbeschreibung' => $projektbeschreibung
        );
        if($hochgeladen){
            // wenn bild vorhanden, url hinzufügen
            $values['purl'] = $projekturl; 
        }
        
        // prepared statement abschicken
        $statement = $db->prepare($query);
        $statement->execute($values);
    }
}
?>