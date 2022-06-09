<div class="contact-section">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<div class="form-content-box">
					<div class="details">
						<a href="<?= base_url() ?>">
							<img src="<?= asset() ?>img/logo.png" class="cm-logo" alt="logo">
						</a>
						<h3>Enter New Password</h3>
						<?php if (!empty($error)): ?>
						<div class="alert alert-danger alert-2" role="alert">
							<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">×</span>
							</button>
							<strong>Error</strong> <?= $error ?>
						</div>
						<?php endif ?>
						<div class="signup-content">
							<form method="POST" action="<?= base_url('new-password') ?>" id="signup_form">
								<div class="form-group">
									<input type="password" name="password" class="input-text" placeholder="Password" id="password">
									<?= form_error('password') ?>
								</div>
								<div class="form-group">
									<input type="password" name="c_password" class="input-text" placeholder="Confirm Password" id="c_password">
									<?= form_error('c_password') ?>
								</div>
								<div class="form-group">
									<button type="submit" class="btn-md button-theme btn-block">Change Password</button>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
</div>