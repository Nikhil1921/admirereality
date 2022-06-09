<div class="submit-address dashboard-list">
    <form method="POST" action="<?= base_url('panel/residential/add') ?>" enctype="multipart/form-data" id="property_form">
        <h4 class="bg-grea-3">Basic Information</h4>
        <div class="search-contents-sidebar">
            <div class="row pad-2">
                <div class="col-lg-4 col-md-4 col-sm-12">
                    <div class="form-group">
                        <label for="title">Property Title</label>
                        <input type="text" class="input-text" name="title" placeholder="Property Title" id="title" value="<?= set_value('title') ?>">
                        <?= form_error('title') ?>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-12">
                    <div class="form-group">
                        <label for="price">Property Price</label>
                        <input type="text" class="input-text" name="price" placeholder="Property Price per SqFt" id="price" value="<?= set_value('price') ?>">
                        <?= form_error('price') ?>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-12">
                    <div class="form-group">
                        <label for="type">Property Type</label>
                        <select class="form-control search-fields" name="type" id="type">
                            <option value="flat" <?= set_select('type', 'flat', False) ?>>Flat</option>
                            <option value="house" <?= set_select('type', 'house', False) ?>>House</option>
                            <option value="villa" <?= set_select('type', 'villa', False) ?>>Villa</option>
                        </select>
                        <?=  form_error('type') ?>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-12">
                    <div class="form-group">
                        <label for="c_area">Area (Carpet Area)</label>
                        <input type="text" class="input-text" name="c_area" placeholder="SqFt" id="c_area" value="<?= set_value('c_area')?>">
                        <?= form_error('c_area') ?>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-12">
                    <div class="form-group">
                        <label for="b_area">Area (Buildup)</label>
                        <input type="text" class="input-text" name="b_area" placeholder="SqFt" id="b_area" value="<?= set_value('b_area')?>">
                        <?= form_error('b_area') ?>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-12">
                    <div class="form-group">
                        <label for="area">Area (Super Buildup)</label>
                        <input type="text" class="input-text" name="area" placeholder="SqFt" id="area" value="<?= set_value('area')?>">
                        <?= form_error('area') ?>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-12">
                    <div class="form-group">
                        <label for="room">Rooms</label>
                        <select class="form-control search-fields" name="room" id="room">
                            <option value="1" <?= set_select('room', 1, False) ?>>1</option>
                            <option value="2" <?= set_select('room', 2, False) ?>>2</option>
                            <option value="3" <?= set_select('room', 3, False) ?>>3</option>
                            <option value="4" <?= set_select('room', 4, False) ?>>4</option>
                        </select>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-12">
                    <div class="form-group">
                        <label for="bathroom">Bathroom</label>
                        <select class="form-control search-fields" name="bathroom" id="bathroom">
                            <option value="1" <?= set_select('bathroom', 1, False) ?>>1</option>
                            <option value="2" <?= set_select('bathroom', 2, False) ?>>2</option>
                            <option value="3" <?= set_select('bathroom', 3, False) ?>>3</option>
                            <option value="4" <?= set_select('bathroom', 4, False) ?>>4</option>
                        </select>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-12">
                    <div class="form-group">
                        <label for="garage">Garage</label>
                        <select class="form-control search-fields" name="garage" id="garage">
                            <option value="0" <?= set_select('garage', 0, False) ?>>No Garage</option>
                            <option value="1" <?= set_select('garage', 1, False) ?>>1</option>
                            <option value="2" <?= set_select('garage', 2, False) ?>>2</option>
                        </select>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-12">
                    <div class="form-group">
                        <label for="plan_image">Plan Image</label>
                        <input type="file" class="input-text" name="plan_image"  id="plan_image" value="<?= set_value('plan_image') ?>">
                        <?= $this->upload->display_errors('<span class="text-danger">','</span>') ?>
                        <?= (!empty($error)) ? '<small class="help-block has-error">* '.$error.'</small>' : '' ?>
                    </div>
                </div>
            </div>
        </div>
        <h4 class="bg-grea-3">Location</h4>
        <div class="row pad-2">
            <div class="col-lg-3 col-md-3 col-sm-12">
                <div class="form-group">
                    <label for="address">Address</label>
                    <input type="text" class="input-text " name="address"  placeholder="Enter Landmark,Location or Socity" id="address" value="<?= set_value('address') ?>">
                    <?=  form_error('address') ?>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-12">
                <div class="form-group">
                    <label for="state">State</label>
                    <select name="state" class="form-control search-fields state" id="state" data-dependent="city" data-value="<?= set_value('city') ?>">
                        <option value="">Select State</option>
                        <?php foreach($states as $s): ?>
                        <option <?= set_select('state', $s['id'], False) ?> value="<?= $s['id'] ?>" ><?= ucwords($s['name']) ?></option>
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
                    <input type="text" class="input-text" name="pincode"  placeholder="Pin Code" id="pincode" value="<?= set_value('pincode') ?>" maxlength="6" >
                    <?=  form_error('pincode') ?>
                </div>
            </div>
        </div>
        <h4 class="bg-grea-3">Detailed Information</h4>
        <div class="row pad-20">
            <div class="col-lg-12">
                <textarea class="input-text" name="details" placeholder="Detailed Information"><?= set_value('details') ?></textarea>
                <?=  form_error('details') ?>
            </div>
        </div>
        <h4 class="bg-grea-3">Features</h4>
        <div class="row pad-2">
            <?php foreach ($features as $k => $v): ?>
            <div class="col-lg-3 col-md-4 col-sm-6">
                <div class="checkbox checkbox-theme checkbox-circle">
                    <input id="<?= $v['id'] ?>" type="checkbox" name="features[]" value="<?= $v['id'] ?>" <?= set_checkbox('features[]', $v['id']) ?>>
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
                        <option <?= set_select('builder', $b['id'], False) ?> value="<?= $b['id'] ?>" ><?= ucwords($b['name']) ?></option>
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
                    <a href="<?= base_url('panel/residential')?>" class="btn btn-md btn-danger">Cancel</a>
                </div>
            </div>
        </form>
    </div>