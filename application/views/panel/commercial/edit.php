<div class="submit-address dashboard-list">
    <form method="POST" action="<?= base_url('panel/commercial/update?id=').my_crypt($property['id'],'e') ?>" enctype="multipart/form-data" id="property_form">
        <h4 class="bg-grea-3">Basic Information</h4>
        <div class="search-contents-sidebar">
            <div class="row pad-2">
                <div class="col-lg-4 col-md-4 col-sm-12">
                    <div class="form-group">
                        <label for="title">Property Title</label>
                        <input type="text" class="input-text" name="title" placeholder="Property Title" id="title" value="<?= (!empty(set_value('title'))) ? set_value('title') : $property['title'] ?>">
                        <?= form_error('title') ?>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-12">
                    <div class="form-group">
                        <label for="price">Property Price</label>
                        <input type="text" class="input-text" name="price" placeholder="Property Price per SqFt" id="price" value="<?= (!empty(set_value('price'))) ? set_value('price') : $property['price'] ?>">
                        <?= form_error('price') ?>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-12">
                    <div class="form-group">
                        <label for="type">Property Type</label>
                        <select class="form-control search-fields" name="type" id="type">
                            <option value="office_space" <?= (set_value('type') == 'office_space' || $property['type'] == 'office_space') ? 'selected' : '' ?>>Office Space</option>
                            <option value="shop" <?= (set_value('type') == 'shop' || $property['type'] == 'shop') ? 'selected' : '' ?>>Shop</option>
                            <option value="showroom" <?= (set_value('type') == 'showroom' || $property['type'] == 'showroom') ? 'selected' : '' ?>>Showroom</option>
                        </select>
                        <?=  form_error('type') ?>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-12">
                    <div class="form-group">
                        <label for="c_area">Area (Carpet Area)</label>
                        <input type="text" class="input-text" name="c_area" placeholder="SqFt" id="c_area" value="<?= (!empty(set_value('c_area'))) ? set_value('c_area') : $property['c_area'] ?>">
                        <?= form_error('c_area') ?>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-12">
                    <div class="form-group">
                        <label for="b_area">Area (Buildup)</label>
                        <input type="text" class="input-text" name="b_area" placeholder="SqFt" id="b_area" value="<?= (!empty(set_value('b_area'))) ? set_value('b_area') : $property['b_area'] ?>">
                        <?= form_error('b_area') ?>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-12">
                    <div class="form-group">
                        <label for="area">Area (Super Buildup)</label>
                        <input type="text" class="input-text" name="area" placeholder="SqFt" id="area" value="<?= (!empty(set_value('area'))) ? set_value('area') : $property['area'] ?>">
                        <?= form_error('area') ?>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-12">
                    <div class="form-group">
                        <label for="parking">Parking</label>
                        <select class="form-control search-fields" name="parking" id="parking">
                            <option value="0" <?= (set_value('parking') == 0 || $property['parking'] == 0) ? 'selected' : '' ?>>No</option>
                            <option value="1" <?= (set_value('parking') == 1 || $property['parking'] == 1) ? 'selected' : '' ?>>Yes</option>
                        </select>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-12">
                    <div class="form-group">
                        <label for="plan_image">Plan Image</label>
                        <input type="file" class="input-text" name="plan_image"  id="plan_image" value="<?= set_value('plan_image') ?>">
                        <?= $this->upload->display_errors('<span class="text-danger">','</span>') ?>
                        <input type="hidden" name="plan_image" value="<?= $property['plan_image'] ?>">
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
                    <input type="text" class="input-text " name="address"  placeholder="Enter Landmark,Location or Socity" id="address" value="<?= (!empty(set_value('address'))) ? set_value('address') : $property['address'] ?>">
                    <?=  form_error('address') ?>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-12">
                <div class="form-group">
                    <label for="state">State</label>
                    <select name="state" class="form-control search-fields state" id="state" data-dependent="city" data-value="<?= (!empty(set_value('city'))) ? set_value('city') : $property['city'] ?>">
                        <option value="">Select State</option>
                        <?php foreach($states as $s): ?>
                        <option <?= (set_value('state') == $s['id'] || $property['state'] == $s['id']) ? 'selected' : '' ?> value="<?= $s['id'] ?>" ><?= ucwords($s['name']) ?></option>
                        <?php endforeach ?>
                    </select>
                    <?=  form_error('state') ?>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-12">
                <div class="form-group">
                    <label for="city">City</label>
                    <select name="city" class="form-control search-fields city" id="city">
                        <option value="">Select City</option>
                    </select>
                    <?=  form_error('city') ?>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-12">
                <div class="form-group">
                    <label for="pincode">Pin Code</label>
                    <input type="text" class="input-text" name="pincode"  placeholder="Pin Code" id="pincode" value="<?= (!empty(set_value('pincode'))) ? set_value('pincode') : $property['pincode'] ?>" maxlength="6" >
                    <?=  form_error('pincode') ?>
                </div>
            </div>
        </div>
        <h4 class="bg-grea-3">Detailed Information</h4>
        <div class="row pad-20">
            <div class="col-lg-12">
                <textarea class="input-text" name="details" placeholder="Detailed Information"><?= (!empty(set_value('details'))) ? set_value('details') : $property['details'] ?></textarea>
                <?=  form_error('details') ?>
            </div>
        </div>
        <h4 class="bg-grea-3">Features</h4>
        <div class="row pad-2">
            <?php foreach ($features as $k => $v): ?>
            <div class="col-lg-3 col-md-4 col-sm-6">
                <div class="checkbox checkbox-theme checkbox-circle">
                    <input id="<?= $v['id'] ?>" type="checkbox" name="features[]" value="<?= $v['id'] ?>" <?= (!empty(set_checkbox('features[]', $v['id']))) ? set_checkbox('features[]', $v['id']) : (in_array($v['id'], explode(',', $property['features']))) ? 'checked' : '' ?>>
                    <label for="<?= $v['id'] ?>">
                        <?= ucwords($v['feature']) ?>
                    </label>
                </div>
            </div>
            <?php endforeach ?>
            <?=  form_error('features[]') ?>
        </div>
        <?php if ($this->session->userdata('role') !== 'builder'): ?>
        <h4 class="bg-grea-3">Contact Details</h4>
        <div class="row pad-20">
            <div class="col-lg-4 col-md-4 col-sm-12">
                <div class="form-group">
                    <label for="builder">Builder</label>
                    <select name="builder" class="form-control search-fields" id="builder">
                        <option value="">Select Builder</option>
                        <?php foreach($builders as $b): ?>
                        <option <?= (set_value('builder') == $b['id'] || $property['builder'] == $b['id']) ? 'selected' : '' ?> value="<?= $b['id'] ?>" ><?= ucwords($b['name']) ?></option>
                        <?php endforeach ?>
                    </select>
                    <?=  form_error('builder') ?>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-12"></div>
            <div class="col-lg-4 col-md-4 col-sm-12"></div>
            <?php else: ?>
            <div class="row pad-20">
                <?php endif ?>
                <div class="col-lg-4 col-md-12 col-sm-12">
                    <button type="submit" class="btn btn-md button-theme">update Property</button>
                </div>
                <div class="col-lg-4 col-md-12 col-sm-12"></div>
                <div class="col-lg-4 col-md-12 col-sm-12">
                    <a href="<?= base_url('panel/commercial')?>" class="btn btn-md btn-danger">Cancel</a>
                </div>
            </div>
        </form>
    </div>