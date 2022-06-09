<div class="submit-address dashboard-list">
    <h4 class="bg-grea-3"><?= ucwords($name) ?> List</h4>
    <div class="search-contents-sidebar">
        <div class="row pad-2">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="col-lg-12 col-md-12 col-sm-12 d-flex justify-content-end">
                    <a href="<?= base_url('panel/role/add')?>" class="btn btn-md btn-success"><i class="fa fa-plus"></i></a>
                </div>
                <table class="table table-borderless" id="datatable">
                    <thead>
                        <th class="target">Sr No.</th>
                        <th>Role</th>
                        <th>Role</th>
                        <th class="target">Action</th>
                    </thead>
                    <tbody></tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<input type="hidden" id="url" value="<?= base_url('panel/role/') ?>">