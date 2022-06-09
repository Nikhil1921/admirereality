<div class="submit-address dashboard-list">
    <h4 class="bg-grea-3">Add <?= $name ?></h4>
    <div class="row pad-20">
        <div class="col-lg-6 col-md-6 col-sm-6">
            <div class="form-group-main">
                <label for="menu_id">Menu Name</label>
                <div class="form-group">
                    <input type="text" name="sub_menu" id="sub_menu" value="<?= $sub_menu['menu']?>" class="input-text form-control" placeholder="Sub Menu Name" disabled>
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-6">
            <div class="form-group-main">
                <label for="sub_menu">Sub Menu Name</label>
                <div class="form-group">
                    <input type="text" name="sub_menu" id="sub_menu" value="<?= $sub_menu['sub_menu']?>" class="input-text form-control" placeholder="Sub Menu Name" disabled>
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-6">
            <div class="form-group-main">
                <label for="icon">Sub Menu Icon</label>
                <div class="form-group">
                    <input type="text" name="icon" id="icon" value="<?= $sub_menu['icon']?>" class="input-text form-control" placeholder="Sub Menu Icon" disabled>
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-6">
            <div class="form-group-main">
                <label for="url">Sub Menu url</label>
                <div class="form-group">
                    <input type="text" name="url" id="url" value="<?= $sub_menu['url']?>" class="input-text form-control" placeholder="Sub Menu url" disabled>
                </div>
            </div>
        </div>
        <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="form-group-main">
                <label for="icon">Sub Menu Permissions</label>
                <div class="form-group">
                    <div class="row">
                        <?php foreach ($op as $k => $v): ?>
                        <div class="col-lg-2 col-md-2 col-sm-2">
                            <div class="checkbox checkbox-theme checkbox-circle">
                                <input id="<?= $v['id'] ?>" type="checkbox" name="permissions[]" <?= (in_array($v['id'], explode(',', $sub_menu['permissions']))) ? 'checked' : '' ?> value="<?= $v['id'] ?>" disabled>
                                <label for="<?= $v['id'] ?>"><?= ucwords($v['type']) ?></label>
                            </div>
                        </div>
                        <?php endforeach ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-4">
                    <a href="<?= base_url('panel/sub-menu')?>" class="btn btn-md btn-success"><i class="fa fa-check"></i></a>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <a href="<?= base_url('panel/sub-menu')?>" class="btn btn-md btn-danger"><i class="fa fa-close"></i></a>
                </div>
            </div>
        </div>
    </div>
</div>