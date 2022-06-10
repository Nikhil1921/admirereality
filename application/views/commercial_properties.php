<div class="properties-section-body content-area">
  <div class="container">
    <div class="row">
      <div class="col-lg-12 col-md-12">
        <?php if ($props): ?>
        <!-- <div class="option-bar clearfix">
          <div class="sorting-options2">
            <?php $url = current_url(); $i = 0;
            foreach ($_GET as $k => $v):
            if ($k != 'sort'):
            if ($i !== 0):
            $url .= "&".$k."=" . strtolower(urlencode($v));
            else:
            $url .= "?".$k."=" . strtolower(urlencode($v));
            endif;
            endif;
            $i++;
            endforeach;
            $sort = $this->input->get('sort');
            switch ($sort) {
            case "latest_desc":
            $s = 'latest_desc';
            break;
            case "price_asc":
            $s = 'price_asc';
            break;
            case "price_desc":
            $s = 'price_desc';
            break;
            case "name_asc":
            $s = 'name_asc';
            break;
            case "name_desc":
            $s = 'name_desc';
            break;
            default:
            $s = 'Default';
            }
            $sort = array('Default Order'=>'latest_desc','Price: Low to High'=>'price_asc','Price High to Low'=>'price_desc','Product Name:A to Z'=>'name_asc','Product Name:Z to A'=>'name_desc')?>
            <form class="form-inline form-search" method="GET" action="<?= $url ?>">
              <span class="sort">Sort by:</span>
              <?php $i = 0;
              foreach ($_GET as $k => $v):
              if ($k != 'sort'): ?>
              <input type="hidden" name="<?= $k ?>" value="<?= $v?>">
              <?php endif;
              $i++;
              endforeach;
              ?>
              <select class="selectpicker search-fields" name="sort" id="sort-property">
                <option value="latest_desc" <?= ($s == 'latest_desc') ? 'selected' : '' ?> >Default Order</option>
                <option value="price_desc" <?= ($s == 'price_desc') ? 'selected' : '' ?>>Price High to Low</option>
                <option value="price_asc" <?= ($s == 'price_asc') ? 'selected' : '' ?>>Price: Low to High</option>
                <option value="name_asc" <?= ($s == 'name_asc') ? 'selected' : '' ?>>Property Name:A to Z</option>
                <option value="name_desc" <?= ($s == 'name_desc') ? 'selected' : '' ?>>Property Name:Z to A</option>
              </select>
              
            </form>
          </div>
        </div> -->

        <div class="inline-search-area">
   <ul class="nav nav-tabs" role="tablist">
      <li class="nav-item">
         <a class="nav-link active show" data-toggle="tab" href="#commercial">Commercial</a>
      </li>
      <li class="nav-item bv-tab-error">
         <a class="nav-link" data-toggle="tab" href="#industrial">Industrial</a>
      </li>
      <li class="nav-item">
         <a class="nav-link" data-toggle="tab" href="#residential">Residential</a>
      </li>
   </ul>
   <div class="tab-content">
   <div id="commercial" class="container tab-pane fade active show">
         <br>
         <div class="submit-address dashboard-list">
                        <form method="GET">
                            <div class="search-contents-sidebar">
                                <div class="row pad-2">
                                    <div class="col-lg-3 col-md-3 col-sm-12">
                                    <div class="form-group">
                                      <label for="inputState">Select State</label>
                                      <select id="inputState" class="form-control dacorate">
                                      <option value="">Select State</option>
                                          <option value="ANDHRA PRADESH">ANDHRA PRADESH</option>
                                          <option value="ASSAM">ASSAM</option>
                                          <option value="ARUNACHAL PRADESH">ARUNACHAL PRADESH</option>
                                          <option value="BIHAR">BIHAR</option>
                                          <option value="GUJRAT">GUJRAT</option>
                                          <option value="HARYANA">HARYANA</option>
                                          <option value="HIMACHAL PRADESH">HIMACHAL PRADESH</option>
                                          <option value="JAMMU &amp; KASHMIR">JAMMU &amp; KASHMIR</option>
                                          <option value="KARNATAKA">KARNATAKA</option>
                                          <option value="KERALA">KERALA</option>
                                          <option value="MADHYA PRADESH">MADHYA PRADESH</option>
                                          <option value="MAHARASHTRA">MAHARASHTRA</option>
                                          <option value="MANIPUR">MANIPUR</option>
                                          <option value="MEGHALAYA">MEGHALAYA</option>
                                          <option value="MIZORAM">MIZORAM</option>
                                          <option value="NAGALAND">NAGALAND</option>
                                          <option value="ORISSA">ORISSA</option>
                                          <option value="PUNJAB">PUNJAB</option>
                                          <option value="RAJASTHAN">RAJASTHAN</option>
                                          <option value="SIKKIM">SIKKIM</option>
                                          <option value="TAMIL NADU">TAMIL NADU</option>
                                          <option value="TRIPURA">TRIPURA</option>
                                          <option value="UTTAR PRADESH">UTTAR PRADESH</option>
                                          <option value="WEST BENGAL">WEST BENGAL</option>
                                          <option value="DELHI">DELHI</option>
                                          <option value="GOA">GOA</option>
                                          <option value="PONDICHERY">PONDICHERY</option>
                                          <option value="LAKSHDWEEP">LAKSHDWEEP</option>
                                          <option value="DAMAN &amp; DIU">DAMAN &amp; DIU</option>
                                          <option value="DADRA &amp; NAGAR">DADRA &amp; NAGAR</option>
                                          <option value="CHANDIGARH">CHANDIGARH</option>
                                          <option value="ANDAMAN &amp; NICOBAR">ANDAMAN &amp; NICOBAR</option>
                                          <option value="UTTARANCHAL">UTTARANCHAL</option>
                                          <option value="JHARKHAND">JHARKHAND</option>
                                          <option value="CHATTISGARH">CHATTISGARH</option>
                                      </select>
                                    </div>
                                    </div>
                                    <div class="col-lg-3 col-md-3 col-sm-12">
                                    <div class="form-group">
                                      <label for="inputState">Select City</label>
                                      <select id="inputState1" class="form-control dacorate">
                                      <option value="">Select City</option>
                                      </select>
                                    </div>
                                    </div>
                                    <div class="col-lg-3 col-md-3 col-sm-12">
                                    <div class="form-group">
                                      <label for="inputState">House</label>
                                      <select id="inputState2" class="form-control dacorate">
                                      <option value="">Type</option>
                                      <option value="">House</option>
                                      <option value="">Villa</option>
                                      </select>
                                    </div>
                                    </div>
                                    <div class="col-lg-3 col-md-3 col-sm-12">
                                        <div class="form-group">
                                          <label for="inputState">Bedrooms</label>
                                          <select id="inputState3" class="form-control dacorate">
                                          <option value="">1</option>
                                          <option value="">2</option>
                                          <option value="">3</option>
                                          <option value="">4</option>
                                          <option value="">5</option>
                                          </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-3 col-sm-12">
                                      <a href="javascript:;" class="btn btn-white btn-read-more">Find</a>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

      <div id="industrial" class="container tab-pane">
         <br>
         <div class="submit-address dashboard-list">
         <form method="GET">
                            <div class="search-contents-sidebar">
                                <div class="row pad-2">
                                    <div class="col-lg-3 col-md-3 col-sm-12">
                                    <div class="form-group">
                                      <label for="inputState">Select State</label>
                                      <select id="inputState" class="form-control dacorate">
                                      <option value="">Select State</option>
                                          <option value="ANDHRA PRADESH">ANDHRA PRADESH</option>
                                          <option value="ASSAM">ASSAM</option>
                                          <option value="ARUNACHAL PRADESH">ARUNACHAL PRADESH</option>
                                          <option value="BIHAR">BIHAR</option>
                                          <option value="GUJRAT">GUJRAT</option>
                                          <option value="HARYANA">HARYANA</option>
                                          <option value="HIMACHAL PRADESH">HIMACHAL PRADESH</option>
                                          <option value="JAMMU &amp; KASHMIR">JAMMU &amp; KASHMIR</option>
                                          <option value="KARNATAKA">KARNATAKA</option>
                                          <option value="KERALA">KERALA</option>
                                          <option value="MADHYA PRADESH">MADHYA PRADESH</option>
                                          <option value="MAHARASHTRA">MAHARASHTRA</option>
                                          <option value="MANIPUR">MANIPUR</option>
                                          <option value="MEGHALAYA">MEGHALAYA</option>
                                          <option value="MIZORAM">MIZORAM</option>
                                          <option value="NAGALAND">NAGALAND</option>
                                          <option value="ORISSA">ORISSA</option>
                                          <option value="PUNJAB">PUNJAB</option>
                                          <option value="RAJASTHAN">RAJASTHAN</option>
                                          <option value="SIKKIM">SIKKIM</option>
                                          <option value="TAMIL NADU">TAMIL NADU</option>
                                          <option value="TRIPURA">TRIPURA</option>
                                          <option value="UTTAR PRADESH">UTTAR PRADESH</option>
                                          <option value="WEST BENGAL">WEST BENGAL</option>
                                          <option value="DELHI">DELHI</option>
                                          <option value="GOA">GOA</option>
                                          <option value="PONDICHERY">PONDICHERY</option>
                                          <option value="LAKSHDWEEP">LAKSHDWEEP</option>
                                          <option value="DAMAN &amp; DIU">DAMAN &amp; DIU</option>
                                          <option value="DADRA &amp; NAGAR">DADRA &amp; NAGAR</option>
                                          <option value="CHANDIGARH">CHANDIGARH</option>
                                          <option value="ANDAMAN &amp; NICOBAR">ANDAMAN &amp; NICOBAR</option>
                                          <option value="UTTARANCHAL">UTTARANCHAL</option>
                                          <option value="JHARKHAND">JHARKHAND</option>
                                          <option value="CHATTISGARH">CHATTISGARH</option>
                                      </select>
                                    </div>
                                    </div>
                                    <div class="col-lg-3 col-md-3 col-sm-12">
                                    <div class="form-group">
                                      <label for="inputState">Select City</label>
                                      <select id="inputState1" class="form-control dacorate">
                                      <option value="">Select City</option>
                                      </select>
                                    </div>
                                    </div>
                                    <div class="col-lg-3 col-md-3 col-sm-12">
                                    <div class="form-group">
                                      <label for="inputState">Property Type</label>
                                      <select id="inputState2" class="form-control dacorate">
                                      <option value="">Type</option>
                                      <option value="">House</option>
                                      <option value="">Villa</option>
                                      </select>
                                    </div>
                                    </div>
                                    <div class="col-lg-3 col-md-3 col-sm-12">
                                        <div class="form-group">
                                          <label for="inputState">Bedrooms</label>
                                          <select id="inputState3" class="form-control dacorate">
                                          <option value="">1</option>
                                          <option value="">2</option>
                                          <option value="">3</option>
                                          <option value="">4</option>
                                          <option value="">5</option>
                                          </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-3 col-sm-12">
                                      <a href="javascript:;" class="btn btn-white btn-read-more">Find</a>
                                    </div>
                                </div>
                            </div>
                        </form>
            </div>
                      </div>

                      <div id="residential" class="container tab-pane">
         <br>
         <div class="submit-address dashboard-list">
         <form method="GET">
                            <div class="search-contents-sidebar">
                                <div class="row pad-2">
                                    <div class="col-lg-3 col-md-3 col-sm-12">
                                    <div class="form-group">
                                      <label for="inputState">Select State</label>
                                      <select id="inputState" class="form-control dacorate">
                                      <option value="">Select State</option>
                                          <option value="ANDHRA PRADESH">ANDHRA PRADESH</option>
                                          <option value="ASSAM">ASSAM</option>
                                          <option value="ARUNACHAL PRADESH">ARUNACHAL PRADESH</option>
                                          <option value="BIHAR">BIHAR</option>
                                          <option value="GUJRAT">GUJRAT</option>
                                          <option value="HARYANA">HARYANA</option>
                                          <option value="HIMACHAL PRADESH">HIMACHAL PRADESH</option>
                                          <option value="JAMMU &amp; KASHMIR">JAMMU &amp; KASHMIR</option>
                                          <option value="KARNATAKA">KARNATAKA</option>
                                          <option value="KERALA">KERALA</option>
                                          <option value="MADHYA PRADESH">MADHYA PRADESH</option>
                                          <option value="MAHARASHTRA">MAHARASHTRA</option>
                                          <option value="MANIPUR">MANIPUR</option>
                                          <option value="MEGHALAYA">MEGHALAYA</option>
                                          <option value="MIZORAM">MIZORAM</option>
                                          <option value="NAGALAND">NAGALAND</option>
                                          <option value="ORISSA">ORISSA</option>
                                          <option value="PUNJAB">PUNJAB</option>
                                          <option value="RAJASTHAN">RAJASTHAN</option>
                                          <option value="SIKKIM">SIKKIM</option>
                                          <option value="TAMIL NADU">TAMIL NADU</option>
                                          <option value="TRIPURA">TRIPURA</option>
                                          <option value="UTTAR PRADESH">UTTAR PRADESH</option>
                                          <option value="WEST BENGAL">WEST BENGAL</option>
                                          <option value="DELHI">DELHI</option>
                                          <option value="GOA">GOA</option>
                                          <option value="PONDICHERY">PONDICHERY</option>
                                          <option value="LAKSHDWEEP">LAKSHDWEEP</option>
                                          <option value="DAMAN &amp; DIU">DAMAN &amp; DIU</option>
                                          <option value="DADRA &amp; NAGAR">DADRA &amp; NAGAR</option>
                                          <option value="CHANDIGARH">CHANDIGARH</option>
                                          <option value="ANDAMAN &amp; NICOBAR">ANDAMAN &amp; NICOBAR</option>
                                          <option value="UTTARANCHAL">UTTARANCHAL</option>
                                          <option value="JHARKHAND">JHARKHAND</option>
                                          <option value="CHATTISGARH">CHATTISGARH</option>
                                      </select>
                                    </div>
                                    </div>
                                    <div class="col-lg-3 col-md-3 col-sm-12">
                                    <div class="form-group">
                                      <label for="inputState">Select City</label>
                                      <select id="inputState1" class="form-control dacorate">
                                      <option value="">Select City</option>
                                      </select>
                                    </div>
                                    </div>
                                    <div class="col-lg-3 col-md-3 col-sm-12">
                                    <div class="form-group">
                                      <label for="inputState">House</label>
                                      <select id="inputState2" class="form-control dacorate">
                                      <option value="">Type</option>
                                      <option value="">House</option>
                                      <option value="">Villa</option>
                                      </select>
                                    </div>
                                    </div>
                                    <div class="col-lg-3 col-md-3 col-sm-12">
                                        <div class="form-group">
                                          <label for="inputState">Bedrooms</label>
                                          <select id="inputState3" class="form-control dacorate">
                                          <option value="">1</option>
                                          <option value="">2</option>
                                          <option value="">3</option>
                                          <option value="">4</option>
                                          <option value="">5</option>
                                          </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-3 col-sm-12">
                                      <a href="javascript:;" class="btn btn-white btn-read-more">Find</a>
                                    </div>
                                </div>
                            </div>
                        </form>
            </div>
                      </div>

      
   </div>
</div>
        
        <div class="row">
          <?php foreach ($props as $k => $v): ?>
          <div class="col-lg-6 col-md-6 col-sm-12">
            <div class="property-box">
              <div class="property-thumbnail">
                <a href="<?= base_url('commercial-property/'.urlencode($v['title']).'/'.my_crypt($v['id'],'e')) ?>" class="property-img">
                  <?= ($v['featured']) ? '<div class="tag">Featured</div>' : ''?>
                  
                  <div class="price-box"><span>₹ <?= $v['price'] ?></span> </div>
                  <img class="d-block w-100" src="<?= asset()?>img/properties/commercial/<?= explode(',', $v['multi_image'])[0] ?>" alt="properties">
                </a>
              </div>
              <div class="detail">
                <h1 class="title">
                <a href="<?= base_url('commercial-property/'.urlencode($v['title']).'/'.my_crypt($v['id'],'e')) ?>"><?= $v['title'] ?></a>
                </h1>
                <div class="location">
                  <a href="<?= base_url('commercial-property/'.urlencode($v['title']).'/'.my_crypt($v['id'],'e')) ?>">
                    <i class="flaticon-pin"></i><?= ucwords($v['address'].', '.$v['city'].', '.$v['state'].' - '.$v['pincode']) ?>
                  </a>
                </div>
                <ul class="facilities-list clearfix">
                  <li>
                    <i class="flaticon-ui"></i> Sq Ft:<?= $v['area'] ?>
                  </li>
                  <li>
                    <i class="flaticon-car"></i> <?= ($v['parking']) ? $v['parking'] : 'No' ?> Parking
                  </li>
                </ul>
              </div>
            </div>
          </div>
          <?php endforeach ?>
        </div>
        <div class="pagination-box p-box-2 text-center">
          <nav aria-label="Page navigation example">
            <?= $this->pagination->create_links(); ?>
          </nav>
        </div>
        <?php else: $join = array('state' => 'states as s','city' => 'cities as c');
        $prop_feat = $this->fmain->getall('commercial as u', 'u.id,price, u.title, u.multi_image,u.address,u.parking,u.area,c.city,u.pincode,s.name as state', 'u.featured = 1','',$join,6); ?>
        <input type="hidden" id="no-propety" value="true">
        <div class="container">
          <div class="main-title">
            <h1>Featured Properties</h1>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod</p>
          </div>
          <div class="row featured-prop">
            <?php foreach ($prop_feat as $k => $v): ?>
            <div class="col-lg-4 col-md-6">
              <div class="property-box">
                <div class="property-thumbnail">
                  <a href="<?= base_url('commercial-property/'.urlencode($v['title']).'/'.my_crypt($v['id'],'e')) ?>" class="property-img">
                    <div class="tag">Featured</div>
                    <div class="price-box"><span><?= $v['price'] ?></span> per sqft</div>
                    <img class="d-block w-100" src="<?= asset()?>img/properties/commercial/<?= explode(',', $v['multi_image'])[0] ?>" alt="properties">
                  </a>
                </div>
                <div class="detail">
                  <h1 class="title">
                  <a href="<?= base_url('commercial-property/'.urlencode($v['title']).'/'.my_crypt($v['id'],'e')) ?>"><?= ucwords($v['title']) ?></a>
                  </h1>
                  <div class="location">
                    <a href="<?= base_url('commercial-property/'.urlencode($v['title']).'/'.my_crypt($v['id'],'e')) ?>">
                      <i class="flaticon-pin"></i><?= ucwords($v['address'].', '.$v['city'].', '.$v['state'].' - '.$v['pincode']) ?>
                    </a>
                  </div>
                  <ul class="facilities-list clearfix">
                    <li>
                      <i class="flaticon-ui"></i> Sq Ft:<?= $v['area'] ?>
                    </li>
                    <li>
                      <i class="flaticon-car"></i> <?= ($v['parking']) ? 'Yes' : 'No' ?> Parking
                    </li>
                  </ul>
                </div>
              </div>
            </div>
            <?php endforeach ?>
          </div>
        </div>
        <?php endif ?>
      </div>
    </div>
  </div>
</div>