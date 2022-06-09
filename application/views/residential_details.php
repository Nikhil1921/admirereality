<div class="properties-details-page content-area-6">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-12 col-xs-12">
                <?php if ($property): ?>
                <div class="properties-details-section">
                    <div id="propertiesDetailsSlider" class="carousel properties-details-sliders slide mb-40">
                        <div class="carousel-inner">
                            <?php foreach (explode(',', $property['multi_image']) as $k => $v): ?>
                            <div class="<?= ($k == 0) ? 'active': ''?> item carousel-item" data-slide-number="0">
                                <img src="<?= asset() ?>img/properties/residential/<?= $v ?>" class="img-fluid" alt="slider-properties">
                            </div>
                            <?php endforeach ?>
                        </div>
                        <ul class="carousel-indicators smail-properties list-inline nav nav-justified">
                            <?php foreach (explode(',', $property['multi_image']) as $k => $v): ?>
                            <li class="list-inline-item <?= ($k == 0) ? 'active': ''?>">
                                <a id="carousel-selector-<?= $k ?>" class="<?= ($k == 0) ? 'selected': ''?>" data-slide-to="<?= $k ?>" data-target="#propertiesDetailsSlider">
                                    <img src="<?= asset() ?>img/properties/residential/<?= $v ?>" class="img-fluid" alt="properties-small">
                                </a>
                            </li>
                            <?php endforeach ?>
                        </ul>
                        <div class="heading-properties-2">
                            <h3><?= $property['title'] ?></h3>
                            <div class="price-location"><span class="property-price">₹ <?= $property['price'] ?></span> <span class="rent">For Sale</span> <span class="location"><i class="flaticon-pin"></i><?= $property['address'] ?></span></div>
                        </div>
                    </div>
                    
                    <div class="tabbing tabbing-box mb-40">
                        <ul class="nav nav-tabs" id="carTab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active show" id="one-tab" data-toggle="tab" href="#one" role="tab" aria-controls="one" aria-selected="false">Description</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="6-tab" data-toggle="tab" href="#6" role="tab" aria-controls="6" aria-selected="true">Features</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="two-tab" data-toggle="tab" href="#two" role="tab" aria-controls="two" aria-selected="false">Floor Plans</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="three-tab" data-toggle="tab" href="#three" role="tab" aria-controls="three" aria-selected="true">Details</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="5-tab" data-toggle="tab" href="#5" role="tab" aria-controls="5" aria-selected="true">Location</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="four-tab" data-toggle="tab" href="#four" role="tab" aria-controls="four" aria-selected="true">Builder</a>
                            </li>
                        </ul>
                        <div class="tab-content" id="carTabContent">
                            <div class="tab-pane fade active show" id="one" role="tabpanel" aria-labelledby="one-tab">
                                <div class="properties-description mb-50">
                                    <h3 class="heading-2">
                                    Description
                                    </h3>
                                    <p><?= $property['details'] ?></p>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="two" role="tabpanel" aria-labelledby="two-tab">
                                <div class="floor-plans mb-50">
                                    <h3 class="heading-2">Floor Plans</h3>
                                    <table>
                                        <tbody><tr>
                                            <td><strong>Size</strong></td>
                                            <td><strong>Rooms</strong></td>
                                            <td><strong>Bathrooms</strong></td>
                                            <td><strong>Garage</strong></td>
                                        </tr>
                                        <tr>
                                            <td><?= $property['area'] ?></td>
                                            <td><?= $property['room'] ?></td>
                                            <td><?= $property['bathroom'] ?></td>
                                            <td><?= $property['garage'] ?></td>
                                        </tr>
                                    </tbody>
                                </table>
                                <img src="<?= asset().'img/plan/'.$property['plan_image'] ?>" alt="floor-plans" class="img-fluid">
                            </div>
                        </div>
                        <div class="tab-pane fade " id="three" role="tabpanel" aria-labelledby="three-tab">
                            <div class="property-details mb-40">
                                <h3 class="heading-2">Property Details</h3>
                                <div class="row">
                                    <div class="col-md-4 col-sm-6">
                                        <ul>
                                            <li>
                                                <strong>Property Id:</strong><?= '12'.$property['id'].'5' ?>
                                            </li>
                                            <li>
                                                <strong>Price:</strong>₹ <?= $property['price'] ?>/ sqft
                                            </li>
                                            <li>
                                                <strong>Property Type:</strong><?= ucwords($property['type']) ?>
                                            </li>
                                            <li>
                                                <strong>Bedrooms:</strong><?= $property['room'] ?>
                                            </li>
                                            <li>
                                                <strong>Bathrooms:</strong><?= $property['bathroom'] ?>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="col-md-4 col-sm-6">
                                        <ul>
                                            <li>
                                                <strong>Garages:</strong><?= $property['garage'] ?>
                                            </li>
                                            <li>
                                                <strong>Carpet Area:</strong><?= $property['c_area'] ?> ft2
                                            </li>
                                            <li>
                                                <strong>Built Area:</strong><?= $property['b_area'] ?> ft2
                                            </li>
                                            <li>
                                                <strong>Super Built Area:</strong><?= $property['area'] ?> ft2
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="col-md-4 col-sm-6">
                                        <ul>
                                            <li>
                                                <strong>City:</strong><?= $property['city'] ?>
                                            </li>
                                            <li>
                                                <strong>State:</strong><?= $property['state'] ?>
                                            </li>
                                            <li>
                                                <strong>Pin Code: </strong><?= $property['pincode'] ?>
                                            </li>
                                            <li>
                                                <strong>Builder:</strong><?= ($this->session->userdata('id')) ? ucwords($property['builder']) : '<a href="'.base_url('login').'">Login To See.</a>' ?>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade " id="6" role="tabpanel" aria-labelledby="6-tab">
                            <div class="properties-amenities mb-30">
                                <h3 class="heading-2">Features</h3>
                                <div class="row">
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <ul class="amenities row">
                                            <?php foreach (explode(',', $property['features']) as $key => $v): ?>
                                            <li class="col-4">
                                                <i class="fa fa-check"></i><?= ucwords($this->fmain->check('features',['id'=>$v],'feature')) ?>
                                            </li>
                                            <?php endforeach ?>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade " id="5" role="tabpanel" aria-labelledby="5-tab">
                            <div class="location mb-50">
                                <div class="map">
                                    <h3 class="heading-2">Property Location</h3>
                                    <div id="map" class="contact-map">
                                        <?= ucwords($property['address']) ?><br>
                                        <?= ucwords($property['city']) ?><br>
                                        <?= ucwords($property['state']) ?> - <?= ucwords($property['pincode']) ?>
                                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2595.7533672316167!2d72.5706756911188!3d23.062308659496264!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x395e847f7d645aad%3A0x3115d4acca1c54cd!2sDensetek%20Infotech!5e0!3m2!1sen!2sin!4v1574847026699!5m2!1sen!2sin" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade " id="four" role="tabpanel" aria-labelledby="four-tab">
                            <div class="property-details mb-40">
                                <h3 class="heading-2">Builder Details</h3>
                                <div class="row">
                                    <div class="col-md-4 col-sm-6">
                                        <ul>
                                            <li>
                                                <strong>Builder Name:</strong><?= ($this->session->userdata('id')) ? ucwords($property['builder']) : '<a href="'.base_url('login').'">Login To See.</a>' ?>
                                            </li>
                                            <li>
                                                <strong>Email:</strong><?= ($this->session->userdata('id')) ? ucwords($property['email']) : '<a href="'.base_url('login').'">Login To See.</a>' ?>
                                            </li>
                                            <li>
                                                <strong>Mobile Number:</strong><?= ($this->session->userdata('id')) ? ucwords($property['mobile']) : '<a href="'.base_url('login').'">Login To See.</a>' ?>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php else: ?>
            <img src="<?= asset()?>img/Not_Available.png" width="80%">
            <?php endif ?>
        </div>
        <div class="col-lg-4 col-md-12">
            <div class="sidebar-right">
                <div class="widget recent-properties">
                    <h3 class="sidebar-title">Recent Properties</h3>
                    <?php foreach ($recent as $k => $v): ?>
                    <div class="media mb-4">
                        <a class="pr-3" href="<?= base_url('residential-property/'.urlencode($v['title']).'/'.my_crypt($v['id'],'e')) ?>">
                            <img class="media-object" src="<?= asset()?>img/properties/residential/<?= explode(',', $v['multi_image'])[0] ?>" alt="small-properties">
                        </a>
                        <div class="media-body align-self-center">
                            <h5>
                            <a href="<?= base_url('residential-property/'.urlencode($v['title']).'/'.my_crypt($v['id'],'e')) ?>"><?= ucwords($v['title']) ?></a>
                            </h5>
                            <div class="listing-post-meta">
                                <a href="<?= base_url('residential-property/'.urlencode($v['title']).'/'.my_crypt($v['id'],'e')) ?>"><i class="fa fa-calendar"></i> <?= date("d-m-Y", strtotime($v['uploaded'])) ?> </a> | ₹ <?= $v['price'] ?>
                            </div>
                        </div>
                    </div>
                    <?php endforeach ?>
                </div>
            </div>
        </div>
    </div>
</div>
</div>