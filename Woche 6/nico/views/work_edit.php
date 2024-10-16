<!-- work layout, ohne header und nav und footer -->
	
		<section class="main-section">
			<div class="container">
				
				<div class="mt-5">
                    <h2>Projekt erfassen</h2>
				</div>
				
				
				<div class="mt-5">
					<form action="index.php?page=work_edit&id=<?php echo $id; ?>" method="post" enctype="multipart/form-data">
						<div class="form-group">
							<img src="media/<?php echo $projekturl ?>" width="100"><br>
							
							<label for="projectImage">Projektbild</label>
							<input type="file" class="form-control" id="projectImage" name="projekturl">
						    <br>
                        </div>
						<div class="form-group">
							<label for="projectTitle">Titel</label>
							<input type="text" class="form-control" id="projectTitle" name="projektname" value="<?php echo $projektname ?>" required>
						</div>
						<div class="form-group">
							<label for="projectDescription">Beschreibung</label>
							<input type="text" class="form-control" id="projectDescription" name="projektbeschreibung" value="<?php echo $projektbeschreibung ?>" required>
						</div>
						
						<button type="submit" class="btn btn-primary">Projekt hinzufügen</button>
						<input type="hidden" name="ID" value="<?php echo $id ?>" />
					</form>
				</div>
			</div>
		</section>
<!-- work layout ende -->