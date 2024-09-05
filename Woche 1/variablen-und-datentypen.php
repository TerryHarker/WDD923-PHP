<?php
// Variable erstellen
$meinText = "Hallo Welt";

// Variable ausgeben
echo 'meinText: ';
echo $meinText;

// Verkettung mit .
echo 'meinText: '.$meinText;


echo "<br>Hier kommt die Variable: $meinText";
echo '<br>Hier kommt die Variable: $meinText';
echo '<br>';

// Wenn ich die HTML Tags als Text ausgeben will: 
echo 'HTML Tags ausgeben: ';
echo htmlentities('<br>');

// PHP versucht zu rechnen, auch wenn wir ihm einen String liefern:
$meineZahl = "8 Elefanten";
$resultat = 3+$meineZahl;
echo 'resultat: '.$resultat;
echo '<br>';

// wenn man Wert und Datentyp vergleichen will: 
echo false === 0;
?>