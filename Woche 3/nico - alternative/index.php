<?php
/**
 * CONTROLLER - diese Datei soll alles steuern
 */

 require_once('config.php'); // Projektweite Definitionen
 require_once('library/navigation.php'); // Funktionen für die Navigation
 // ...hier könnten weitere Funktions-Files geladen werden

$page_default = 'home'; // wenn kein page wert mitgegeben in GET
$page = isset($_GET['page']) ? $_GET['page'] : $page_default;
// echo $page; 


// Vorbereitendes Script laden, wenn es existiert
$script_pfad = 'scripts/'.$page.'.php';
if( is_file($script_pfad) ){
    include($script_pfad); // script für verarbeitung, keine Ausgabe
}

?>
<!DOCTYPE html>
<html lang="en-gb" dir="ltr" vocab="http://schema.org/">

<?php
// HTML Head
include( 'partials/head.php' );
?>

<body>

<?php
// Navigation
include( 'partials/nav.php' );


// Datei nur laden, wenn sie auch existiert
$view_pfad = 'views/'.$page.'.php';
if( is_file($view_pfad) ){
    include($view_pfad); // view, nur ausgabe
}else{
    // wenn eine Datei angefordert wird die nicht existiert
    header("Location: index.php"); // z.B. Umleitung zu home - header schreibt in den Response Header
}
// HTML Footer
include( 'partials/footer.php' );
?>
	</body>
</html>