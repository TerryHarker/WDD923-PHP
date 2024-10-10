<?php
$navArray = array(
	array(
		'name' => 'Home',
		'page' => 'home'
	),
	array(
		'name' => 'Work',
		'page' => 'work'
	),
	array(
		'name' => 'Contact me',
		'page' => 'contact'
	),
	array(
		'name' => 'Anmelden', // existiert noch nicht
		'page' => 'login'
	)
);
?>
	<nav class="navbar navbar-expand-md navbar-light bg-light">
			<div class="container-fluid">
				<a class="navbar-brand p-0 me-2" href="./">NICO's PORTFOLIO<a>
				<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>
				<div class="collapse navbar-collapse" id="navbarNav">
					
					<?php echo renderNav( $navArray, $page ); ?>

				</div>
			</div>
		</nav>