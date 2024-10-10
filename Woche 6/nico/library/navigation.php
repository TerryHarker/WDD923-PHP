<?php
/**
 * Funktionen für die Navigation
 * 
 * Der Kommentar oberhalb der Funktion ist von Copilot geschrieben gemäss dem PHPDoc Format.
 * Solche Kommentarblöcke sollen dir helfen, dass du nicht den Code in der Funktion lesen musst, um zu wissen, 
 * wofür die funktion dient (1. Zeile), welche Parameter (@param) von welchem Datentyp (array) du mitgeben musst
 * und welchen Rückgabewert (@return) du nutzen kannst.
 * PHPDoc Blöcke können auch direkt für eine Dokumentation genutzt werden (s. https://phpdoc.org)
 * 
 * KOMMENTIERE DEINE FUNKTIONEN IMMER, DENN DU WILLST DEN CODE JA WIEDERVERWENDEN!
 */



/**
 * Renders the navigation menu.
 *
 * This function generates and outputs the HTML for the navigation menu.
 * It uses an array of navigation items, where each item is an associative array
 * containing 'title' and 'url' keys.
 *
 * @param array $navItems An array of associative arrays representing the navigation items.
 *                        Each item should have 'title' and 'url' keys.
 * @return void
 */
function renderNav( $nav, $activePage, $extraClass=''){
	$output = '<ul class="'.NAVCLASS.' '.$extraClass.'">'; // Konstante ist global, variable muss per parameter übergeben werden
	foreach($nav as $navItem) { 
		$activeClass = $activePage==$navItem['page'] ? 'active':''; // aktive Seite?
							
		$output .= '<li class="nav-item col-6 col-md-auto">';
		$output .= '<a class="nav-link p-2 '.$activeClass.'" href="?page='.$navItem['page'].'">';
		$output .= $navItem['name'];
		$output .= '</a>';
		$output .= '</li>';
    }
	$output .= '</ul>';
    return $output; // gibt das gesammelte output als String zurück
}
?>