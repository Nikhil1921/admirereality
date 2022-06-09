<div class="contact-section">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<div class="form-content-box">
					<div class="details">
						<a href="<?= base_url() ?>">
							<img src="<?= asset() ?>img/logo.png" class="cm-logo" alt="logo">
						</a>
						<h3>Complete Signup</h3>
						<?php if (!empty($error)): ?>
						<div class="alert alert-danger alert-2" role="alert">
							<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">×</span>
							</button>
							<strong>Error</strong> <?= $error ?>
						</div>
						<?php endif ?>
						<div class="signup-content">
							<form method="POST" action="<?= base_url('complete-signup') ?>" id="signup_form">
								<div class="form-group">
									<input type="text" name="mobile" class="input-text" placeholder="Mobile Number" maxlength="10" pattern="[0-9]{10}"  value="<?= $this->session->userdata('mobile') ?>" id="mobile">
									<?= form_error('mobile') ?>
								</div>
								<div class="form-group">
									<input type="text" name="name" class="input-text" placeholder="Full Name" value="<?= set_value('name') ?>" id="name">
									<?= form_error('name') ?>
								</div>
								<div class="form-group">
									<input type="email" name="email" class="input-text" placeholder="Email Address" value="<?= set_value('email') ?>" id="email">
									<?= form_error('email') ?>
								</div>
								<div class="form-group">
									<input type="password" name="password" class="input-text" placeholder="Password" id="password">
									<?= form_error('password') ?>
								</div>
								<div class="form-group">
									<input type="password" name="c_password" class="input-text" placeholder="Confirm Password" id="c_password">
									<?= form_error('c_password') ?>
								</div>
								<div class="form-group">
									<select class="input-text" name="role" id="role">
										<?php foreach ($role as $k => $v): ?>
										<option value="<?= $v['id'] ?>"><?= ucfirst($v['role']) ?></option>
										<?php endforeach ?>
									</select>
									<?= form_error('role') ?>
								</div>
								<div class="form-group">
									<button type="submit" class="btn-md button-theme btn-block">Complete Signup</button>
								</div>
							</div>
						</form>
					</div>
				</div>
				<div class="footer">
					<span>Already a member? <a href="<?= base_url('login') ?>">Login here</a></span>
				</div>
			</div>
		</div>
	</div>
</div>
</div>