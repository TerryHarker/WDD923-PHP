<!-- work layout, ohne header und nav und footer -->
	
		<section class="main-section">
			<div class="container">
				
				<div class="mt-5">
						<h2>Aktuelle Projekte</h2>
				</div>

				<?php if($isLoggedIn == true){ ?>
				<!-- button für neue Projekte - nur für admin -->
				<a href="" class="btn btn-primary">Neues Projekt einfügen</a>
				<?php } ?>

				<div class="row mt-4">
					<div class="col-12 col-sm-6 col-md-3">
						<img src="media/Business-20.png"><br>
						<strong>Business Web Template</strong><br>
						<small>Für Templatecreator.com</small>
					</div>
					<div class="col-12 col-sm-6 col-md-3">
						<img src="media/eaef_Blurr-402x.jpg"><br>
						<strong>Blurr Webseite</strong><br>
						<small>Für Blurr.App</small>
					</div>
					<div class="col-12 col-sm-6 col-md-3">
						<img src="media/Pompeo.jpg"><br>
						<strong>Pompeo Webseite</strong><br>
						<small>Für Pompeo Interior design</small>
					</div>
					<div class="col-12 col-sm-6 col-md-3">
						<img src="media/biznus.jpg"><br>
						<strong>Bisnuz Webshop</strong><br>
						<small>Shop für Bisnuz Outdoor GmbH</small>
					</div>
				</div>
				<div class="row mt-5">
					<em class="text-muted">image credit: webflow.io</em>
				</div>
			</div>
		</section>
<!-- work layout ende -->