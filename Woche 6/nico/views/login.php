
<!-- login layout, ohne header und nav und footer -->
		<section class="main-section">
			<div class="container">
								
				<div class="mt-5">
					<?php if(!$isLoggedIn): ?>
					<h1>Anmelden</h1>

                    <?php if ($hasError && count($errorMessages)): ?>
                        <p style="color: red;"><?php echo implode('<br>', $errorMessages); ?></p>
                    <?php endif; ?>

                    <form action="" method="POST" class="form-stacked">
                        <div class="mb-3">
                            <label for="username" class="form-label">Username:</label>
                            <input type="text" id="username" name="username" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password:</label>
                            <input type="password" id="password" name="password" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary">Login</button>
                        <div>
                        </form>
                <?php else : ?>
                    <h2>Willkommen, <?=$username ?></h2>
                    <p>Du bist jetzt eingeloggt.</p>
                    <a href="logout.php">Abmelden</a>
                <?php endif; ?>
				</div>
				
			</div>
		</section>
<!-- end login layout -->