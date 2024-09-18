<?php
// $letzterSlash = strrpos($_SERVER['SCRIPT_NAME'], '/'); 
// $page = substr($_SERVER['SCRIPT_NAME'], $letzterSlash+1);

$page = basename($_SERVER['SCRIPT_NAME']); // Dateiname eines URL's
echo 'aktuelle Seite: '.$page;

?>
	<nav class="navbar navbar-expand-md navbar-light bg-light">
			<div class="container-fluid">
				<a class="navbar-brand p-0 me-2" href="./">NICO's PORTFOLIO<a>
				<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>
				<div class="collapse navbar-collapse" id="navbarNav">
					<ul class="navbar-nav ms-auto">
						<li class="nav-item col-6 col-md-auto">
							<a class="nav-link p-2 <?php echo ($page == 'index.php') ? 'active' : ''; ?>" href="index.php">Home</a>
						</li>
						<li class="nav-item col-6 col-md-auto">
							<a class="nav-link p-2 <?php echo ($page == 'work.php') ? 'active' : ''; ?>" href="work.php">Work</a>
						</li>
						<li class="nav-item col-6 col-md-auto">
							<a class="nav-link p-2 <?php echo ($page == 'contact.php') ? 'active' : ''; ?>" href="contact.php">Contact me</a>
						</li>
					</ul>
				</div>
			</div>
		</nav>