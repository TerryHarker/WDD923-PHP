<?php
echo '<pre>';
// print_r($_POST); // hier kommen nur die Textdaten rein, also input type="text" etc.
print_r($_FILES);
echo '</pre>';
$tempPfad = $_FILES['bild']['tmp_name'];
$zielPfad = dirname(__FILE__).'/dateien/'.$_FILES['bild']['name']; // Pfad der aktuellen Datei, unterordner und Dateiname

// Datei aus dem System-Temporarordner in den Zielordner verschieben:
move_uploaded_file($tempPfad, $zielPfad);
?>
<h3>Upload Demo</h3>
<form action="" method="post" enctype="multipart/form-data">
    <label for="img">Datei</label>
    <input type="file" id="img" name="bild" required>
    <button type="submit">hochladen</button>
</form>