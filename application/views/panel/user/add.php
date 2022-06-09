<div class="submit-address dashboard-list">
    <form method="POST" action="<?= base_url('panel/user/add')?>" id="signup_form" enctype="multipart/form-data">
        <h4 class="bg-grea-3">Add <?= $name ?></h4>
        <div class="p-4">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="form-group-main">
                        <label for="role">Role</label>
                        <div class="form-group">
                            <select class="input-text form-control" id="role" name="role">
                                <option value="">Select Role</option>
                                <?php foreach ($role as $k => $v): ?>
                                <option value="<?= $v['id'] ?>" <?= set_select('role', $v['id'], False); ?>><?= ucwords($v['role']) ?> </option>
                                <?php endforeach ?>
                            </select>
                            <?= form_error('role')?>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="form-group-main">
                        <label for="name">User Name</label>
                        <div class="form-group">
                            <input type="text" class="input-text form-control" name="name" placeholder="User Name" value="<?= set_value('name')?>" id="name">
                            <?= form_error('name')?>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="form-group-main">
                        <label for="image">User Image</label>
                        <div class="form-group">
                            <input type="file" class="input-text form-control" name="image" id="image">
                            <?= $this->upload->display_errors('<small class="help-block has-error">* ','</small>') ?>
                            <?= (!empty($error) ? $error : '') ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="form-group-main">
                        <label for="email">Email</label>
                        <div class="form-group">
                            <input type="email" class="input-text form-control" name="email" placeholder="User Email" value="<?= set_value('email')?>" id="email">
                            <?= form_error('email')?>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="form-group-main">
                        <label for="mobile">User Mobile</label>
                        <div class="form-group">
                            <input type="text" class="input-text form-control" name="mobile" placeholder="User Mobile" value="<?= set_value('mobile')?>" id="mobile" pattern="[0-9]{10}" maxlength="10">
                            <?= form_error('mobile')?>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="form-group-main">
                        <label for="password">Password</label>
                        <div class="form-group">
                            <input type="password" class="input-text form-control" name="password" placeholder="User Password"  id="password">
                            <?= form_error('password')?>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="form-group-main">
                        <label for="c_password">Confirm Password</label>
                        <div class="form-group">
                            <input type="password" class="input-text form-control" name="c_password" placeholder="Confirm Password" id="c_password">
                            <?= form_error('c_password')?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="row">
                        <div class="col-lg-4 col-md-4 col-sm-4">
                            <button type="submit" class="btn btn-md btn-success"><i class="fa fa-check"></i></button>
                        </div>
                        <div class="col-lg-2 col-md-2 col-sm-2 align-items-end">
                            <a href="<?= base_url('panel/user')?>" class="btn btn-md btn-danger"><i class="fa fa-close"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>