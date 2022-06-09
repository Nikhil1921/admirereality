<div class="contact-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="form-content-box">
                    <div class="details">
                        <a href="<?= base_url() ?>">
                            <img src="<?= asset() ?>img/logo.png" class="cm-logo" alt="logo">
                        </a>
                        <h3>Sign into your account</h3>
                        <?php if (!empty($error)): ?>
                        <div class="alert alert-danger alert-2" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                            <strong>Error</strong> <?= $error ?>
                        </div>
                        <?php endif ?>
                        <form action="<?= base_url('login') ?>" method="POST" id="loginForm">
                            <div class="form-group">
                                <input type="text" name="mobile" class="input-text" placeholder="Mobile" value="<?= set_value('mobile')?>">
                                <?= form_error('mobile')?>
                            </div>
                            <div class="form-group">
                                <input type="password" name="password" class="input-text" placeholder="Password">
                                <?= form_error('password')?>
                            </div>
                            <div class="checkbox">
                                <!-- <div class="ez-checkbox pull-left">
                                    <label>
                                        <input type="checkbox" class="ez-hide">
                                        Remember me
                                    </label>
                                </div> -->
                                <a href="<?= base_url('forgot-password') ?>" class="link-not-important pull-right">Forgot Password</a>
                                <div class="clearfix"></div>
                            </div>
                            <div class="form-group mb-0">
                                <button type="submit" class="btn-md button-theme btn-block">login</button>
                            </div>
                        </form>
                    </div>
                    <div class="footer">
                        <span>Don't have an account? <a href="<?= base_url('signup')?>">Register here</a></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>