<?php
/*
Daten werden per GET oder POST an dieses Script geschickt und können hier ausgegeben werden.
Die Daten landen hier, weil das Formular in "umfrage.html" im Attribut "action" den Pfad zu dieser Datei enthält.

Dieses Script dient der Demonstration, es sind Fehlermeldungen zu sehen, dies ist gewollt. 
Sie geben dir wichtige Hinweise, wo und wie die Daten ankommen (oder nicht ankommen)
*/

// Monitor (="Konsole") für das GET Array 
echo '<pre> GET: ';
print_r($_GET);
echo '</pre>';

// Monitor (="Konsole") für das POST Array 
echo '<pre> POST: ';
print_r($_GET);
echo '</pre>';
?>
    <h4>GET</h4>
<p>
    <strong>Hallo <?php echo $_GET['name']; // Wert aus dem Formfield 'name' ?>, 
    du interessierst dich für <?php echo implode(', ', $_GET['interests']); // zum string geflattete Werte aus 'interests' ?></strong>
</p>

<h4>POST</h4>
<p>
    <strong>Hallo <?php echo $_POST['name']; ?>, 
    du interessierst dich für <?php echo $_POST['interests']; ?></strong>
</p>