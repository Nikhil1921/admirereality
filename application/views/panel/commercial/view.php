<div class="submit-address dashboard-list">
    <form method="POST" action="<?= base_url('panel/residential/add') ?>" enctype="multipart/form-data">
        <h4 class="bg-grea-3">Basic Information</h4>
        <div class="search-contents-sidebar">
            <div class="row pad-2">
                <div class="col-lg-4 col-md-4 col-sm-12">
                    <div class="form-group">
                        <label for="title">Property Title</label>
                        <input type="text" class="input-text" name="title" placeholder="Property Title" id="title" value="<?= $property['title'] ?>" disabled>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-12">
                    <div class="form-group">
                        <label for="price">Property Price</label>
                        <input type="text" class="input-text" name="price" placeholder="Property Price per SqFt" id="price" value="<?= $property['price']?>" disabled>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-12">
                    <div class="form-group">
                        <label for="type">Property Type</label>
                        <select class="form-control search-fields" name="type" id="type" disabled>
                            <option value="office_space" <?= ($property['type'] == 'office_space' ) ? 'selected' : '' ?>>Office Space</option>
                            <option value="shop" <?= ($property['type'] == 'shop' ) ? 'selected' : '' ?>>Shop</option>
                            <option value="showroom" <?= ($property['type'] == 'showroom' ) ? 'selected' : '' ?>>Showroom</option>
                        </select>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-12">
                    <div class="form-group">
                        <label for="c_area">Area (Carpet Area)</label>
                        <input type="text" class="input-text" name="c_area" placeholder="SqFt" id="c_area" value="<?= $property['c_area']?>" disabled>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-12">
                    <div class="form-group">
                        <label for="b_area">Area (Buildup)</label>
                        <input type="text" class="input-text" name="b_area" placeholder="SqFt" id="b_area" value="<?= $property['b_area']?>" disabled>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-12">
                    <div class="form-group">
                        <label for="area">Area (Super Buildup)</label>
                        <input type="text" class="input-text" name="area" placeholder="SqFt" id="area" value="<?= $property['area']?>" disabled>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-12">
                    <div class="form-group">
                        <label for="parking">Parking</label>
                        <select class="form-control search-fields" name="parking" id="parking" disabled>
                            <option value="0" <?= ($property['parking'] == 0 ) ? 'selected' : '' ?>>No</option>
                            <option value="1" <?= ($property['parking'] == 1 ) ? 'selected' : '' ?>>Yes</option>
                        </select>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-12">
                    <div class="form-group">
                        <label for="plan_image">Plan Image</label>
                        <img src="<?= asset().'img/plan/'.$property['plan_image']?>" height="132">
                    </div>
                </div>
            </div>
        </div>
        <h4 class="bg-grea-3">Location</h4>
        <div class="row pad-2">
            <div class="col-lg-3 col-md-3 col-sm-12">
                <div class="form-group">
                    <label for="address">Address</label>
                    <input type="text" class="input-text " name="address"  placeholder="Enter Landmark,Location or Socity" id="address" value="<?= $property['address']?>" disabled>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-12">
                <div class="form-group">
                    <label for="state">State</label>
                    <select name="state" class="form-control search-fields state" id="state" data-dependent="city" data-value="<?= $property['city']?>" disabled>
                        <option value="">Select State</option>
                        <?php foreach($states as $s): ?>
                        <option <?= ($s['id'] == $property['state']) ? 'selected' : '' ?> value="<?= $s['id'] ?>" ><?= ucwords($s['name']) ?></option>
                        <?php endforeach ?>
                    </select>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-12">
                <div class="form-group">
                    <label for="city">City</label>
                    <select name="city" class="form-control search-fields city" id="city" disabled>
                        <option value="">Select City</option>
                    </select>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-12">
                <div class="form-group">
                    <label for="pincode">Pin Code</label>
                    <input type="text" class="input-text" name="pincode"  placeholder="Pin Code" id="pincode" value="<?= $property['pincode'] ?>" maxlength="6" disabled>
                </div>
            </div>
        </div>
       
        <h4 class="bg-grea-3">Detailed Information</h4>
        <div class="row pad-20">
            <div class="col-lg-12">
                <textarea class="input-text" name="details" placeholder="Detailed Information" disabled><?= $property['details']?></textarea>
            </div>
        </div>
        <h4 class="bg-grea-3">Features</h4>
        <div class="row pad-2">
            <?php foreach ($features as $k => $v): ?>
            <div class="col-lg-3 col-md-4 col-sm-6">
                <div class="checkbox checkbox-theme checkbox-circle">
                    <input id="<?= $v['id'] ?>" type="checkbox" name="features[]" value="<?= $v['id'] ?>" <?= (in_array($v['id'], explode(',', $property['features']))) ? 'checked' : '' ?> disabled>
                    <label for="<?= $v['id'] ?>">
                        <?= ucwords($v['feature']) ?>
                    </label>
                </div>
            </div>
            <?php endforeach ?>
        </div>
        <?php if ($this->session->userdata('role') !== 'builder'): ?>
        <h4 class="bg-grea-3">Contact Details</h4>
        <div class="row pad-20">
            <div class="col-lg-4 col-md-4 col-sm-12">
                <div class="form-group">
                    <label for="builder">Builder</label>
                    <select name="builder" class="form-control search-fields" id="builder" disabled>
                        <option value="">Select Builder</option>
                        <?php foreach($builders as $b): ?>
                        <option <?= ($b['id'] == $property['builder']) ? 'selected' : '' ?> value="<?= $b['id'] ?>" ><?= ucwords($b['name']) ?></option>
                        <?php endforeach ?>
                    </select>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-12"></div>
            <div class="col-lg-4 col-md-4 col-sm-12"></div>
            <?php else: ?>
            <div class="row pad-20">
                <?php endif ?>
                <div class="col-lg-4 col-md-12 col-sm-12">
                    <a href="<?= base_url('panel/commercial')?>" class="btn btn-md button-theme">Back to Properties</a>
                </div>
            </div>
        </form>
    </div>