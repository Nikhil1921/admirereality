<div class="submit-address dashboard-list">
    <h4 class="bg-grea-3">View <?= $name ?></h4>
    <div class="p-4">
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-6">
                <div class="form-group-main">
                    <label for="role">Role</label>
                    <div class="form-group">
                        <input type="text" class="input-text form-control" name="name" placeholder="User Name" value="<?= $user['role']?>" id="name" disabled>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6">
                <div class="form-group-main">
                    <label for="name">User Name</label>
                    <div class="form-group">
                        <input type="text" class="input-text form-control" name="name" placeholder="User Name" value="<?= $user['name']?>" id="name" disabled>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6">
                <div class="form-group-main">
                    <label for="image">User Image</label>
                    <div class="form-group">
                        <img src="<?= asset().'/img/users/'.$user['image'] ?>" style="width: 100px; ">
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-6">
                <div class="form-group-main">
                    <label for="email">Email</label>
                    <div class="form-group">
                        <input type="email" class="input-text form-control" name="email" placeholder="User Email" value="<?= $user['email']?>" id="email" disabled>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6">
                <div class="form-group-main">
                    <label for="mobile">User Mobile</label>
                    <div class="form-group">
                        <input type="text" class="input-text form-control" name="mobile" placeholder="User Mobile" value="<?= $user['mobile']?>" id="mobile" pattern="[0-9]{10}" maxlength="10" disabled>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="row">
                    <div class="col-lg-4 col-md-4 col-sm-4">
                        <a href="<?= base_url('panel/user')?>" class="btn btn-md btn-success"><i class="fa fa-check"></i></a>
                    </div>
                    <div class="col-lg-2 col-md-2 col-sm-2 align-items-end">
                        <a href="<?= base_url('panel/user')?>" class="btn btn-md btn-danger"><i class="fa fa-close"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>