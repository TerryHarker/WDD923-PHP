<?php
// Tutorial und Infos hier: https://learn.bytekultur.net/dynamisches-output/kalender-widget-mit-ueberstzung

$datum = new DateTime('now'); // Datum von jetzt als Objekt
$format = IntlDateFormatter::FULL;
$lang = 'de_DE';

// Formatter (ein kleiner Übersetzungshelfer) erstellen:
$wochentagFormat = new IntlDateFormatter($lang, $format, $format, null, null, 'EEEE'); // Objekt instanzieren

// Variablen erstellen mit Datumsformaten:
$wochentag = $wochentagFormat->format($datum);

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
<div style="border:1px solid black;border-top:5px solid #000000; width:200px; height:250px;text-align:center;">
	<h2><?php echo $wochentag ?></h2>

	<span style="font-size:100px;font-weight:bold;"><?php echo $tag ?></span>
	
	<h2><?php echo $monat ?> <?php echo $jahr ?></h2>
</div>

</body>
</html>