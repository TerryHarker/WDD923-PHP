<!-- work layout, ohne header und nav und footer -->
	
		<section class="main-section">
			<div class="container">
				
				<div class="mt-5">
						<h2>Aktuelle Projekte</h2>
				</div>

				<?php if($isLoggedIn == true){ ?>
				<!-- button für neue Projekte - nur für admin -->
				<a href="?page=work_edit" class="btn btn-primary">Neues Projekt einfügen</a>
				<?php } ?>

				<div class="row mt-4">
					
					<?php foreach($list as $projekt ) { // durch das Haupt-Array aus der db loopen ?>
				
					<div class="col-12 col-sm-6 col-md-3">
						<img src="media/<?php echo $projekt['projekturl'] ?>"><br>
						<strong><?php echo $projekt['projektname'] ?></strong><br>
						<small><?php echo $projekt['projektbeschreibung'] ?></small>

						<?php if($isLoggedIn == true){ // nur für Admins ?>
						<a href="?page=work_edit&id=<?php echo $projekt['ID'] ?>" class="btn btn-primary btn-small">bearbeiten</a>
						<?php } ?>
					</div>

					<?php } ?>
					
					
				</div>
				<div class="row mt-5">
					<em class="text-muted">image credit: webflow.io</em>
				</div>
			</div>
		</section>
<!-- work layout ende -->