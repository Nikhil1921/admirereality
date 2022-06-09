<div class="dashboard-list">
    <h3 class="heading">Profile Details</h3>
    <div class="dashboard-message contact-2 bdr clearfix">
        <div class="row">
            <div class="col-lg-3 col-md-3">
                <div class="edit-profile-photo">
                    <img src="<?= asset() ?>img/users/<?= ($user['image']) ? $user['image'] : 'avatar-6.jpg'?>" alt="profile-photo" class="img-fluid">
                    <form method="POST" action="<?= base_url('panel/change-image') ?>" enctype="multipart/form-data" id="change-image">
                        <div class="change-photo-btn">
                            <div class="photoUpload">
                                <span><i class="fa fa-upload"></i> Upload Photo</span>
                                <input type="file" class="upload" name="image" id="image-change">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-lg-9 col-md-9">
                <form action="<?= base_url('panel/my-profile') ?>" method="POST" class="update_form">
                    <div class="row">
                        <div class="col-lg-6 col-md-6">
                            <div class="form-group name">
                                <label for="name">Your Name</label>
                                <input type="text" id="name" name="name" class="form-control" placeholder="Your Name" value="<?= (!empty(set_value('name'))) ? set_value('name') : $user['name'] ?>">
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <div class="form-group subject">
                                <label for="mobile">Phone</label>
                                <input type="text" id="mobile" name="mobile" class="form-control" placeholder="Phone" value="<?= (!empty(set_value('mobile'))) ? set_value('mobile') : $user['mobile'] ?>" pattern="[0-9]{10}" maxlength="10" disabled>
                            </div> 
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <div class="form-group number">
                                <label for="email">Email</label>
                                <input type="email" name="email" class="form-control" placeholder="Email" value="<?= (!empty(set_value('email'))) ? set_value('email') : $user['email'] ?>" id="email">
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-12">
                            <div class="send-btn">
                                <button type="submit" class="btn btn-md button-theme">Change Details</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-6">
        <div class="dashboard-list">
            <h3 class="heading">Change Password</h3>
            <div class="dashboard-message contact-2">
                <form action="<?= base_url('panel/change-password') ?>" method="POST" class="update_form">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group email">
                                <label for="password">New Password</label>
                                <input type="password" name="password" class="form-control" placeholder="New Password" id="password">
                                <?= form_error('password') ?>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group subject">
                                <label for="c_password">Confirm New Password</label>
                                <input type="password" name="c_password" class="form-control" placeholder="Confirm New Password" id="c_password">
                                <?= form_error('c_password') ?>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="send-btn">
                                <button type="submit" class="btn btn-md button-theme">Change Password</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- <div class="col-md-6">
        <div class="dashboard-list">
            <h3 class="heading">Socials</h3>
            <div class="dashboard-message contact-2">
                <form action="#" method="GET" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group name">
                                <label>Facebook</label>
                                <input type="text" name="facebook" class="form-control" placeholder="https://www.facebook.com">
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group email">
                                <label>Twitter</label>
                                <input type="text" name="twitter" class="form-control" placeholder="https://twitter.com">
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group subject">
                                <label>Vkontakte</label>
                                <input type="text" name="vkontakte" class="form-control" placeholder="vk.com">
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group number">
                                <label>Whatsapp</label>
                                <input type="email" name="whatsapp" class="form-control" placeholder="https://www.whatsapp.com">
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="send-btn">
                                <button type="submit" class="btn btn-md button-theme">Send Changes</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div> -->
</div>