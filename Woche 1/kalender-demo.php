<?php
// Variablen erstellen mit Datumsformaten:
$wochentag = date('l');
$tag = date('d'); // Tag des monats
$monat = date('F'); // Monat
$jahr = date('Y'); // Jahr
?>
<html>
<head>
	<title>MINI KALENDER</title>
</head>
<body>

<h3 style="color:#999999;">MINI KALENDER</h3>
Dieser Kalender zeigt das aktuelle Datum an. Es wird date() verwendet, und kann nur auf englisch angezeigt werden

<div style="border:1px solid black;border-top:5px solid #000000; width:200px; height:250px;text-align:center;">
	<h2><?php echo $wochentag ?></h2>

	<span style="font-size:100px;font-weight:bold;"><?php echo $tag ?></span>
	
	<h2><?php echo $monat ?> <?php echo $jahr ?></h2>
</div>

</body>
</html>