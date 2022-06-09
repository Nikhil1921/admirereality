<div class="submit-address dashboard-list">
    <form method="POST" action="<?= base_url('panel/sub-menu/add')?>" id="sub_menu_form">
        <h4 class="bg-grea-3">Add <?= $name ?></h4>
        <div class="row pad-20">
            <div class="col-lg-6 col-md-6 col-sm-6">
                <div class="form-group-main">
                    <label for="menu_id">Menu Name</label>
                    <div class="form-group">
                        <select class="input-text form-control" name="menu_id" id="menu_id">
                            <option value="">Select Menu</option>
                            <?php foreach ($menu as $k => $v): ?>
                            <option value="<?= $v['id'] ?>" <?= set_select('menu_id', $v['id'], False) ?>><?= ucwords($v['menu']) ?></option>
                            <?php endforeach ?>
                        </select>
                        <?= form_error('menu_id')?>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6">
                <div class="form-group-main">
                    <label for="sub_menu">Sub Menu Name</label>
                    <div class="form-group">
                        <input type="text" name="sub_menu" id="sub_menu" value="<?= set_value('sub_menu')?>" class="input-text form-control" placeholder="Sub Menu Name">
                        <?= form_error('sub_menu')?>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6">
                <div class="form-group-main">
                    <label for="icon">Sub Menu Icon</label>
                    <div class="form-group">
                        <input type="text" name="icon" id="icon" value="<?= set_value('icon')?>" class="input-text form-control" placeholder="Sub Menu Icon">
                        <?= form_error('icon')?>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6">
                <div class="form-group-main">
                    <label for="url">Sub Menu url</label>
                    <div class="form-group">
                        <input type="text" name="url" id="url" value="<?= set_value('url')?>" class="input-text form-control" placeholder="Sub Menu url">
                        <?= form_error('url')?>
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
                                    <input id="<?= $v['id'] ?>" type="checkbox" name="permissions[]" <?= set_checkbox('permissions[]', $v['id']) ?> value="<?= $v['id'] ?>">
                                    <label for="<?= $v['id'] ?>"><?= ucwords($v['type']) ?></label>
                                </div>
                            </div>
                            <?php endforeach ?>
                        </div>
                        <?= form_error('permissions[]')?>
                    </div>
                </div>
            </div>
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="row">
                    <div class="col-lg-4 col-md-4 col-sm-4">
                        <button type="submit" class="btn btn-md btn-success"><i class="fa fa-check"></i></button>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6">
                        <a href="<?= base_url('panel/sub-menu')?>" class="btn btn-md btn-danger"><i class="fa fa-close"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>