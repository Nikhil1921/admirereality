<div class="contact-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="form-content-box">
                    <div class="details">
                        <a href="<?= base_url() ?>">
                            <img src="<?= asset() ?>img/logo.png" class="cm-logo" alt="logo">
                        </a>
                        <h3>Create an account</h3>
                        <?php if (!empty($error)): ?>
                        <div class="alert alert-danger alert-2" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                            <strong>Error</strong> <?= $error ?>
                        </div>
                        <?php endif ?>
                        <div class="signup-content">
                            <form method="POST" id="signup_form">
                                <div class="form-group">
                                    <input type="text" name="mobile" class="input-text" placeholder="Mobile Number" maxlength="10" pattern="[0-9]{10}" value="<?= set_value('mobile')?>">
                                    <?= form_error('mobile') ?>
                                </div>
                                
                                <div class="form-group mb-0">
                                    <button type="submit" class="btn-md button-theme btn-block">Send OTP</button>
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