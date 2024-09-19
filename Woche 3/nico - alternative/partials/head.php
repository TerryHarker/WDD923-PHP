<?php
$seo_pagetitle_default = "Nico's Portfolio"; // standard page title
$seo_pagetitle = isset($seo_pagetitle) ? $seo_pagetitle : $seo_pagetitle_default; // wenn kein pagetitle definiert ist, dann standard nehmen
?>

	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		
		<title><?php echo $seo_pagetitle; ?></title>
		<meta name="title" content="<?php echo $seo_pagetitle; ?>">
		<meta name="description" content="Web- und anderes Design von Nico">
		
		<meta name="author" content="Nico">
		<link rel="apple-touch-icon" type="image/png" sizes="180x180" href="assets/favicons/favicon.png">
		<link rel="icon" type="image/png" sizes="180x180" href="assets/favicons/favicon.png">

		<link rel="preconnect" href="https://fonts.googleapis.com">
		<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
		<link href="https://fonts.googleapis.com/css2?family=EB+Garamond:ital,wght@0,400..800;1,400..800&display=swap" rel="stylesheet">
		<link rel="stylesheet" href="assets/css/bootstrap.min.css">
		<link rel="stylesheet" href="assets/css/theme.css">
		<style>
			.nav-horizontal {
				flex-direction:row !important;
			}
		</style>


		<script src="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/js/bootstrap.bundle.min.js"></script>
	</head>