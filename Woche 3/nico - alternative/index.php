<?php
/**
 * CONTROLLER - diese Date soll alles steuern
 */
$page_default = 'home'; // wenn kein page wert mitgegeben in GET
$page = isset($_GET['page']) ? $_GET['page'] : $page_default;
// echo $page; 

// Datei nur laden, wenn sie auch existiert
$view_pfad = 'views/'.$page.'.php';
if( is_file($view_pfad) ){
    include($view_pfad);
}else{
    // wenn eine Datei angefordert wird die nicht existiert
    header("Location: index.php"); // z.B. Umleitung zu home - header schreibt in den Response Header
        
}
?>