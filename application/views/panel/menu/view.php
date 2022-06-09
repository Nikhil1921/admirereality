<div class="submit-address dashboard-list">
    <h4 class="bg-grea-3">View <?= $name ?></h4>
    <div class="row pad-20">
        <div class="col-lg-6 col-md-6 col-sm-6">
            <div class="form-group-main">
                <label>Menu Name</label>
                <div class="form-group">
                    <input class="input-text form-control" value="<?= $menu['menu']?>" disabled>
                </div>
            </div>
        </div>
        <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-4">
                    <a href="<?= base_url('panel/menu')?>" class="btn btn-md btn-success"><i class="fa fa-check"></i></a>
                </div>
                <div class="col-lg-2 col-md-2 col-sm-2 align-items-end">
                    <a href="<?= base_url('panel/menu')?>" class="btn btn-md btn-danger"><i class="fa fa-close"></i></a>
                </div>
            </div>
        </div>
    </div>
</div>