<div class="submit-address dashboard-list">
    <form method="POST" action="<?= base_url('panel/role/update/').$role['id']?>" id="role_form">
        <h4 class="bg-grea-3">Update <?= $name ?></h4>
        <div class="p-4">
            <div class="row">
                <div class="col-lg-12 col-md-6 col-sm-6">
                    <div class="form-group-main">
                        <label for="role">Role Name</label>
                        <div class="form-group">
                            <input type="text" class="input-text form-control" name="role" placeholder="Role Name" value="<?= (!empty(set_value('role'))) ? set_value('role') : $role['role'] ?>" id="role">
                            <?= form_error('role')?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-4">
                    <div class="form-group-main">
                        <label for="role">Menu Name</label>
                        <div class="form-group">
                            <select class="input-text form-control" id="navigation">
                                <option value="">Select Menu</option>
                                <?php foreach ($navigation as $k => $v): ?>
                                <option value="<?= $this->main->check('menu', array('menu'=>$k), 'id') ?>"><?= ucwords($k) ?> </option>
                                <?php endforeach ?>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8 col-md-8 col-sm-8" id="add-sub-menu"></div>
            </div>
            <div class = "row remove-nav">
            </div>
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="row">
                        <div class="col-lg-4 col-md-4 col-sm-4">
                            <button type="submit" class="btn btn-md btn-success"><i class="fa fa-check"></i></button>
                        </div>
                        <div class="col-lg-2 col-md-2 col-sm-2 align-items-end">
                            <a href="<?= base_url('panel/role')?>" class="btn btn-md btn-danger"><i class="fa fa-close"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>

<input type="hidden" id="get-sub-menu" value="<?= base_url('panel/role/get-sub-menu') ?>">