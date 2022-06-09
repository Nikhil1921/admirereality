<div class="dashboard-list">
    <div class="row">
        <div class="col-md-10">
            <h3>My Properties List</h3>
        </div>
        <div class="col-md-2">
            <a href="<?= base_url('panel/residential/add') ?>" class="btn btn-md btn-success">add</a>
        </div>
    </div>
    <table class="manage-table">
        <tbody>
            <?php foreach ($property as $k => $v): ?>
            <tr class="responsive-table">
                <td class="listing-photoo">
                    <img src="<?= asset()?>img/properties/residential/<?= (explode(',', $v['multi_image'])[0]) ? explode(',', $v['multi_image'])[0] : 'properties-1.jpg' ?>" alt="listing-photo" class="img-fluid">
                </td>
                <td class="title-container">
                    <h2>
                    <form action="<?= base_url('panel/residential/view') ?>" method="GET">
                        <input type="hidden" name="id" value="<?= $v['id'] ?>">
                        <button class="view-prop"><?= ucwords($v['title']) ?></button>
                    </form>
                    </h2>
                    <h5 class="d-none d-xl-block d-lg-block d-md-block"><i class="flaticon-pin"></i><?= ucwords($v['address']) ?></h5>
                    <h6 class="table-property-price">₹ <?= $v['price'] ?></h6>
                </td>
                <td class="expire-date"><?= date("d-m-Y", strtotime($v['uploaded'])) ?></td>
                <td class="action">
                    <form action="<?= base_url('panel/residential/update') ?>" method="GET">
                        <input type="hidden" name="id" value="<?= $v['id'] ?>">
                        <button class="view-prop"><i class="fa fa-pencil"></i> Edit</button>
                    </form>
                    <a href="<?= base_url('panel/residential/update/').$v['id'] ?>"></a>
                    <form action="<?= base_url('panel/residential/delete') ?>" method="POST">
                        <input type="hidden" name="id" value="<?= $v['id'] ?>">
                        <button class="view-prop"><i class="fa fa-remove"></i> Delete</button>
                    </form>
                </td>
            </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</div>
<input type="hidden" id="url" value="<?= base_url('panel/residential/') ?>">