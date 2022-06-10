<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<div class="banner" id="banner">
<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel" data-interval="4000">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="4"></li>
  </ol>
  <div class="carousel-inner">
  <div class="carousel-item banner-max-height active">
      <img class="d-block w-100 h-100" src="<?= asset()?>img/banner/banner-4.jpg" alt="banner">
      <div class="carousel-content container banner-info text-center">
      <img class="d-block w-100 h-100 text-center banner-logo" src="<?= asset()?>img/logo.png" alt="banner">
          <h2 class="text-uppercase text-white animation4" data-aos="fade-right">Welcome To Admire Reality</h2>
      </div>
  </div>
  <div class="carousel-item banner-max-height">
      <img class="d-block w-100 h-100" src="<?= asset()?>img/banner/banner-5.jpg" alt="banner">
      <div class="carousel-content container banner-info text-center">
          <h2 class="text-uppercase text-white animation1" data-aos="fade-down-right">Find Commercial Properties</h2>
          <a href="javascript:;" class="btn btn-white btn-read-more">Rent</a>
          <a href="javascript:;" class="btn btn-white btn-read-more">Sale</a>
      </div>
  </div>
  <div class="carousel-item banner-max-height">
      <img class="d-block w-100 h-100" src="<?= asset()?>img/banner/banner-6.jpg" alt="banner">
      <div class="carousel-content container banner-info text-center">
          <h2 class="text-uppercase text-white animation2" data-aos="fade-down-left">Find Industrial Properties</h2>
          <a href="javascript:;" class="btn btn-white btn-read-more">Rent</a>
          <a href="javascript:;" class="btn btn-white btn-read-more">Sale</a>
      </div>
  </div>

  <div class="carousel-item banner-max-height">
      <img class="d-block w-100 h-100" src="<?= asset()?>img/banner/banner-7.jpg" alt="banner">
      <div class="carousel-content container banner-info text-center">
          <h2 class="text-uppercase text-white animation3" data-aos="fade-left">Find Residential Properties</h2>
          <a href="javascript:;" class="btn btn-white btn-read-more">Rent</a>
          <a href="javascript:;" class="btn btn-white btn-read-more">Sale</a>
      </div>
  </div>
  
  </div>
  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
</div>



<div class="featured-properties content-area-14">
  <div class="container">
    <!-- Main title -->
    <div class="main-title">
      <h1>Properties for Sale</h1>
    </div>
    <div class="row">
      <div class="col-lg-4 col-md-6">
        <div class="property-box">
          <div class="property-thumbnail">
            <a href="properties-details.html" class="property-img">
              <div class="tag">Featured</div>
              <div class="price-box">
                <span>$850.00</span> month
              </div>
              <img class="d-block w-100" src="assets/img/properties/properties-1.jpg" alt="properties">
            </a>
          </div>
          <div class="detail">
            <h1 class="title">
              <a href="properties-grid-rightside.html">Relaxing Apartment</a>
            </h1>
            <div class="location">
              <a href="properties-details.html">
                <i class="flaticon-pin"></i>123 Kathal St. Tampa City, </a>
            </div>
            <ul class="facilities-list clearfix">
              <li>
                <i class="flaticon-bed"></i> 3 Beds
              </li>
              <li>
                <i class="flaticon-bathroom"></i> 2 Baths
              </li>
              <li>
                <i class="flaticon-ui"></i> Sq Ft:3400
              </li>
              <li>
                <i class="flaticon-car"></i> 1 Garage
              </li>
            </ul>
          </div>
        </div>
      </div>
      <div class="col-lg-4 col-md-6">
        <div class="property-box">
          <div class="property-thumbnail">
            <a href="properties-details.html" class="property-img">
              <div class="tag">Featured</div>
              <div class="price-box">
                <span>$850.00</span> month
              </div>
              <img class="d-block w-100" src="assets/img/properties/properties-2.jpg" alt="properties">
            </a>
          </div>
          <div class="detail">
            <h1 class="title">
              <a href="properties-details.html">Beautiful Family House</a>
            </h1>
            <div class="location">
              <a href="properties-details.html">
                <i class="flaticon-pin"></i>123 Kathal St. Tampa City, </a>
            </div>
            <ul class="facilities-list clearfix">
              <li>
                <i class="flaticon-bed"></i> 3 Beds
              </li>
              <li>
                <i class="flaticon-bathroom"></i> 2 Baths
              </li>
              <li>
                <i class="flaticon-ui"></i> Sq Ft:3400
              </li>
              <li>
                <i class="flaticon-car"></i> 1 Garage
              </li>
            </ul>
          </div>
        </div>
      </div>
      <div class="col-lg-4 col-md-6">
        <div class="property-box">
          <div class="property-thumbnail">
            <a href="properties-details.html" class="property-img">
              <div class="tag">Featured</div>
              <div class="price-box">
                <span>$850.00</span> month
              </div>
              <img class="d-block w-100" src="assets/img/properties/properties-3.jpg" alt="properties">
            </a>
          </div>
          <div class="detail">
            <h1 class="title">
              <a href="properties-details.html">Real Luxury Villa</a>
            </h1>
            <div class="location">
              <a href="properties-details.html">
                <i class="flaticon-pin"></i>123 Kathal St. Tampa City, </a>
            </div>
            <ul class="facilities-list clearfix">
              <li>
                <i class="flaticon-bed"></i> 3 Beds
              </li>
              <li>
                <i class="flaticon-bathroom"></i> 2 Baths
              </li>
              <li>
                <i class="flaticon-ui"></i> Sq Ft:3400
              </li>
              <li>
                <i class="flaticon-car"></i> 1 Garage
              </li>
            </ul>
          </div>
        </div>
      </div>
      <div class="col-lg-4 col-md-6">
        <div class="property-box">
          <div class="property-thumbnail">
            <a href="properties-details.html" class="property-img">
              <div class="tag">Featured</div>
              <div class="price-box">
                <span>$850.00</span> month
              </div>
              <img class="d-block w-100" src="assets/img/properties/properties-4.jpg" alt="properties">
            </a>
          </div>
          <div class="detail">
            <h1 class="title">
              <a href="properties-details.html">Luxury Villa</a>
            </h1>
            <div class="location">
              <a href="properties-details.html">
                <i class="flaticon-pin"></i>123 Kathal St. Tampa City, </a>
            </div>
            <ul class="facilities-list clearfix">
              <li>
                <i class="flaticon-bed"></i> 3 Beds
              </li>
              <li>
                <i class="flaticon-bathroom"></i> 2 Baths
              </li>
              <li>
                <i class="flaticon-ui"></i> Sq Ft:3400
              </li>
              <li>
                <i class="flaticon-car"></i> 1 Garage
              </li>
            </ul>
          </div>
        </div>
      </div>
      <div class="col-lg-4 col-md-6">
        <div class="property-box">
          <div class="property-thumbnail">
            <a href="properties-details.html" class="property-img">
              <div class="tag">Featured</div>
              <div class="price-box">
                <span>$850.00</span> month
              </div>
              <img class="d-block w-100" src="assets/img/properties/properties-5.jpg" alt="properties">
            </a>
          </div>
          <div class="detail">
            <h1 class="title">
              <a href="properties-details.html">Masons Villas</a>
            </h1>
            <div class="location">
              <a href="properties-details.html">
                <i class="flaticon-pin"></i>123 Kathal St. Tampa City, </a>
            </div>
            <ul class="facilities-list clearfix">
              <li>
                <i class="flaticon-bed"></i> 3 Beds
              </li>
              <li>
                <i class="flaticon-bathroom"></i> 2 Baths
              </li>
              <li>
                <i class="flaticon-ui"></i> Sq Ft:3400
              </li>
              <li>
                <i class="flaticon-car"></i> 1 Garage
              </li>
            </ul>
          </div>
        </div>
      </div>
      <div class="col-lg-4 col-md-6">
        <div class="property-box">
          <div class="property-thumbnail">
            <a href="properties-details.html" class="property-img">
              <div class="tag">Featured</div>
              <div class="price-box">
                <span>$850.00</span> month
              </div>
              <img class="d-block w-100" src="assets/img/properties/properties-6.jpg" alt="properties">
            </a>
          </div>
          <div class="detail">
            <h1 class="title">
              <a href="properties-details.html">Office Apartment</a>
            </h1>
            <div class="location">
              <a href="properties-details.html">
                <i class="flaticon-pin"></i>123 Kathal St. Tampa City, </a>
            </div>
            <ul class="facilities-list clearfix">
              <li>
                <i class="flaticon-bed"></i> 3 Beds
              </li>
              <li>
                <i class="flaticon-bathroom"></i> 2 Baths
              </li>
              <li>
                <i class="flaticon-ui"></i> Sq Ft:3400
              </li>
              <li>
                <i class="flaticon-car"></i> 1 Garage
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
    <div class="col-lg-12 col-md-12 col-sm-12 text-center">
      <a href="javascript:;" class="btn btn-md button-theme color-btn">View More</a>
    </div>
  </div>
</div>

<div class="advantages content-area">
    <div class="container">
        <div class="main-title-2 text-center">
            <h1>About Us</h1>
        </div>
        <div class="row">
            <div class="col-xl-5 col-lg-5 col-md-12 col-sm-12 col-xs-12">
        <div class="about-slider-box simple-slider">
          <img class="d-block w-100" src="assets/img/about.png" alt="about">
        </div>
      </div>
      <div class="col-xl-7 col-lg-7 col-md-12 col-sm-12 col-xs-12">
        <div class="about-text">
          <h3 class="text-white">Welcome to Admire Reality</h3>
          <p class="text-justify text-white">we offer outstanding priority offerings in first-class residential, commercial & industrial properties as well as in rentals and leasing. We operate in Ahmedabad, Gandhinagar and surrounding areas. We help offer the best investment opportunities and options with a targeted return on investment (ROI). Offer investment opportunities when there is an opportunity for some price increases. Activation and enabling zero queries and cleaning of tiles and properties. Our support in buying, selling and renting real estate. We are working on culture and modules for client work.</p>
          <a href="about.php"><button type="button" class="btn btn-primary btn-md color-btn">Read More</button></a>
        </div>
      </div>
        </div>
    </div>
</div>



<div class="featured-properties content-area-14">
  <div class="container">
    <!-- Main title -->
    <div class="main-title">
      <h1>Properties for Rent</h1>
    </div>
    <div class="row">
      <div class="col-lg-4 col-md-6">
        <div class="property-box">
          <div class="property-thumbnail">
            <a href="properties-details.html" class="property-img">
              <div class="tag">Featured</div>
              <div class="price-box">
                <span>$850.00</span> month
              </div>
              <img class="d-block w-100" src="assets/img/properties/properties-1.jpg" alt="properties">
            </a>
          </div>
          <div class="detail">
            <h1 class="title">
              <a href="properties-grid-rightside.html">Relaxing Apartment</a>
            </h1>
            <div class="location">
              <a href="properties-details.html">
                <i class="flaticon-pin"></i>123 Kathal St. Tampa City, </a>
            </div>
            <ul class="facilities-list clearfix">
              <li>
                <i class="flaticon-bed"></i> 3 Beds
              </li>
              <li>
                <i class="flaticon-bathroom"></i> 2 Baths
              </li>
              <li>
                <i class="flaticon-ui"></i> Sq Ft:3400
              </li>
              <li>
                <i class="flaticon-car"></i> 1 Garage
              </li>
            </ul>
          </div>
        </div>
      </div>
      <div class="col-lg-4 col-md-6">
        <div class="property-box">
          <div class="property-thumbnail">
            <a href="properties-details.html" class="property-img">
              <div class="tag">Featured</div>
              <div class="price-box">
                <span>$850.00</span> month
              </div>
              <img class="d-block w-100" src="assets/img/properties/properties-2.jpg" alt="properties">
            </a>
          </div>
          <div class="detail">
            <h1 class="title">
              <a href="properties-details.html">Beautiful Family House</a>
            </h1>
            <div class="location">
              <a href="properties-details.html">
                <i class="flaticon-pin"></i>123 Kathal St. Tampa City, </a>
            </div>
            <ul class="facilities-list clearfix">
              <li>
                <i class="flaticon-bed"></i> 3 Beds
              </li>
              <li>
                <i class="flaticon-bathroom"></i> 2 Baths
              </li>
              <li>
                <i class="flaticon-ui"></i> Sq Ft:3400
              </li>
              <li>
                <i class="flaticon-car"></i> 1 Garage
              </li>
            </ul>
          </div>
        </div>
      </div>
      <div class="col-lg-4 col-md-6">
        <div class="property-box">
          <div class="property-thumbnail">
            <a href="properties-details.html" class="property-img">
              <div class="tag">Featured</div>
              <div class="price-box">
                <span>$850.00</span> month
              </div>
              <img class="d-block w-100" src="assets/img/properties/properties-3.jpg" alt="properties">
            </a>
          </div>
          <div class="detail">
            <h1 class="title">
              <a href="properties-details.html">Real Luxury Villa</a>
            </h1>
            <div class="location">
              <a href="properties-details.html">
                <i class="flaticon-pin"></i>123 Kathal St. Tampa City, </a>
            </div>
            <ul class="facilities-list clearfix">
              <li>
                <i class="flaticon-bed"></i> 3 Beds
              </li>
              <li>
                <i class="flaticon-bathroom"></i> 2 Baths
              </li>
              <li>
                <i class="flaticon-ui"></i> Sq Ft:3400
              </li>
              <li>
                <i class="flaticon-car"></i> 1 Garage
              </li>
            </ul>
          </div>
        </div>
      </div>
      <div class="col-lg-4 col-md-6">
        <div class="property-box">
          <div class="property-thumbnail">
            <a href="properties-details.html" class="property-img">
              <div class="tag">Featured</div>
              <div class="price-box">
                <span>$850.00</span> month
              </div>
              <img class="d-block w-100" src="assets/img/properties/properties-4.jpg" alt="properties">
            </a>
          </div>
          <div class="detail">
            <h1 class="title">
              <a href="properties-details.html">Luxury Villa</a>
            </h1>
            <div class="location">
              <a href="properties-details.html">
                <i class="flaticon-pin"></i>123 Kathal St. Tampa City, </a>
            </div>
            <ul class="facilities-list clearfix">
              <li>
                <i class="flaticon-bed"></i> 3 Beds
              </li>
              <li>
                <i class="flaticon-bathroom"></i> 2 Baths
              </li>
              <li>
                <i class="flaticon-ui"></i> Sq Ft:3400
              </li>
              <li>
                <i class="flaticon-car"></i> 1 Garage
              </li>
            </ul>
          </div>
        </div>
      </div>
      <div class="col-lg-4 col-md-6">
        <div class="property-box">
          <div class="property-thumbnail">
            <a href="properties-details.html" class="property-img">
              <div class="tag">Featured</div>
              <div class="price-box">
                <span>$850.00</span> month
              </div>
              <img class="d-block w-100" src="assets/img/properties/properties-5.jpg" alt="properties">
            </a>
          </div>
          <div class="detail">
            <h1 class="title">
              <a href="properties-details.html">Masons Villas</a>
            </h1>
            <div class="location">
              <a href="properties-details.html">
                <i class="flaticon-pin"></i>123 Kathal St. Tampa City, </a>
            </div>
            <ul class="facilities-list clearfix">
              <li>
                <i class="flaticon-bed"></i> 3 Beds
              </li>
              <li>
                <i class="flaticon-bathroom"></i> 2 Baths
              </li>
              <li>
                <i class="flaticon-ui"></i> Sq Ft:3400
              </li>
              <li>
                <i class="flaticon-car"></i> 1 Garage
              </li>
            </ul>
          </div>
        </div>
      </div>
      <div class="col-lg-4 col-md-6">
        <div class="property-box">
          <div class="property-thumbnail">
            <a href="properties-details.html" class="property-img">
              <div class="tag">Featured</div>
              <div class="price-box">
                <span>$850.00</span> month
              </div>
              <img class="d-block w-100" src="assets/img/properties/properties-6.jpg" alt="properties">
            </a>
          </div>
          <div class="detail">
            <h1 class="title">
              <a href="properties-details.html">Office Apartment</a>
            </h1>
            <div class="location">
              <a href="properties-details.html">
                <i class="flaticon-pin"></i>123 Kathal St. Tampa City, </a>
            </div>
            <ul class="facilities-list clearfix">
              <li>
                <i class="flaticon-bed"></i> 3 Beds
              </li>
              <li>
                <i class="flaticon-bathroom"></i> 2 Baths
              </li>
              <li>
                <i class="flaticon-ui"></i> Sq Ft:3400
              </li>
              <li>
                <i class="flaticon-car"></i> 1 Garage
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
    <div class="col-lg-12 col-md-12 col-sm-12 text-center">
      <a href="javascript:;" class="btn btn-md button-theme color-btn">View More</a>
    </div>
  </div>
</div>







<section class="inquiry">
    <div class="container">
        <div class="content-area5">
  <div class="dashboard-content">
    <div class="dashboard-header clearfix">
      <div class="main-title mb-1 mt-1">
        <h1>Inquiry</h1>
      </div>
    </div>
    <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-pad">
                <div class="content-area5 dashboard-content">
                    <div class="submit-address dashboard-list">
                        <form method="GET">
                            <h4 class="bg-grea-3">Basic Information</h4>
                            <div class="search-contents-sidebar">
                                <div class="row pad-2">
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label>Name</label>
                                        <input type="text" class="input-text" name="name" placeholder="Name">
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label>Area/Location</label>
                                            <input type="text" class="input-text" name="your name" placeholder="SqFt">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label>Property Type</label>
                                            <select class="selectpicker search-fields" name="for-sale">
                                                <option>For Sale</option>
                                                <option>For Rent</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label>Approx Budget</label>
                                            <input type="text" class="input-text" name="your name" placeholder="USD">
                                        </div>
                                    </div>
                                <div class="col-lg-4 col-md-12 col-sm-12">
                                    <a href="#" class="btn btn-md button-theme color-btn">Submit Property</a>
                                </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
  </div>
</div>
    </div>
</section>


<!-- Photo gallery start -->
<div class="photo-gallery content-area-13">
    <div class="container">
        <div class="main-title text-center">
            <h1 class="p-gallery">Property Gallery</h1>
            <ul class="list-inline-listing filters filteriz-navigation">
                <li class="active btn filtr-button filtr" data-filter="all"><a href="#">All</a></li>
                <li data-filter="1" class="btn-inline filtr-button images"><a href="#">Images</a></li>
                <li data-filter="2" class="btn-inline filtr-button video"><a href="#">Video</a></li>
            </ul>
        </div>
        <div class="row filter-portfolio">
            <div class="cars">
                <div class="col-lg-4 col-md-6 col-sm-12 filtr-item images col-pad" data-category="1">
                    <div class="portfolio-item">
                        <a href="assets/img/properties/properties-1.jpg" title="Relaxing Apartment">
                            <img src="assets/img/properties/properties-1.jpg" alt="gallery-photo" class="img-fluid">
                        </a>
                        <div class="portfolio-content">
                            <div class="portfolio-content-inner">
                                <p>Relaxing Apartment</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12 filtr-item images col-pad" data-category="1">
                    <div class="portfolio-item">
                        <a href="assets/img/properties/properties-2.jpg" title="Park Avenue">
                            <img src="assets/img/properties/properties-2.jpg" alt="gallery-photo" class="img-fluid">
                        </a>
                        <div class="portfolio-content">
                            <div class="portfolio-content-inner">
                                <p>Park Avenue</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12 filtr-item col-pad" data-category="1">
                    <div class="portfolio-item">
                        <a href="assets/img/properties/properties-3.jpg" title="Masons Villas">
                            <img src="assets/img/properties/properties-3.jpg" alt="gallery-photo" class="img-fluid">
                        </a>
                        <div class="portfolio-content">
                            <div class="portfolio-content-inner">
                                <p>Masons Villas</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12 filtr-item col-pad" data-category="1">
                    <div class="portfolio-item">
                        <a href="assets/img/properties/properties-4.jpg" title="Big Head House">
                            <img src="assets/img/properties/properties-4.jpg" alt="gallery-photo" class="img-fluid">
                        </a>
                        <div class="portfolio-content">
                            <div class="portfolio-content-inner">
                                <p>Big Head House</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12 filtr-item col-pad" data-category="1">
                    <div class="portfolio-item">
                        <a href="assets/img/properties/properties-5.jpg" title="Relaxing Apartment">
                            <img src="assets/img/properties/properties-5.jpg" alt="gallery-photo" class="img-fluid">
                        </a>
                        <div class="portfolio-content">
                            <div class="portfolio-content-inner">
                                <p>Relaxing Apartment</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12 filtr-item col-pad" data-category="1">
                    <div class="portfolio-item">
                        <a href="assets/img/properties/properties-1.jpg" title="Relaxing Apartment">
                            <img src="assets/img/properties/properties-1.jpg" alt="gallery-photo" class="img-fluid">
                        </a>
                        <div class="portfolio-content">
                            <div class="portfolio-content-inner">
                                <p>Relaxing Apartment</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12 filtr-item col-pad" data-category="1">
                    <div class="portfolio-item">
                        <a href="assets/img/properties/properties-1.jpg" title="Relaxing Apartment">
                            <img src="assets/img/properties/properties-1.jpg" alt="gallery-photo" class="img-fluid">
                        </a>
                        <div class="portfolio-content">
                            <div class="portfolio-content-inner">
                                <p>Relaxing Apartment</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12 filtr-item col-pad" data-category="1">
                    <div class="portfolio-item">
                        <a href="assets/img/properties/properties-2.jpg" title="Park Avenue">
                            <img src="assets/img/properties/properties-2.jpg" alt="gallery-photo" class="img-fluid">
                        </a>
                        <div class="portfolio-content">
                            <div class="portfolio-content-inner">
                                <p>Park Avenue</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12 filtr-item col-pad" data-category="1">
                    <div class="portfolio-item">
                        <a href="assets/img/properties/properties-3.jpg" title="Masons Villas">
                            <img src="assets/img/properties/properties-3.jpg" alt="gallery-photo" class="img-fluid">
                        </a>
                        <div class="portfolio-content">
                            <div class="portfolio-content-inner">
                                <p>Masons Villas</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Photo gallery end -->


<div class="testimonial bg-grea-3 content-area-5">
    <div class="container">
        <div class="main-title">
            <h1>Welcome to Admire Reality</h1>
        </div>
        <div class="slick-slider-area">
            <div class="row slick-carousel" data-slick='{"slidesToShow": 2, "responsive":[{"breakpoint": 1024,"settings":{"slidesToShow": 2}}, {"breakpoint": 768,"settings":{"slidesToShow": 1}}]}'>
                <div class="slick-slide-item">
                    <div class="testimonial-inner">
                        <div class="text-box">
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard</p>
                            <div class="rating">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star-o"></i>
                                <span>( 4 Reviews )</span>
                            </div>
                        </div>
                        <div class="user">
                            <div class="photo">
                                <img class="media-object" src="<?= asset()?>img/avatar/avatar-1.jpg" alt="user">
                            </div>
                            <div class="detail">
                                <h5>Maikel Alisa</h5>
                                <p>Web Designer, New York</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="slick-slide-item">
                    <div class="testimonial-inner">
                        <div class="text-box">
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard</p>
                            <div class="rating">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star-o"></i>
                                <span>( 4 Reviews )</span>
                            </div>
                        </div>
                        <div class="user">
                            <div class="photo">
                                <img class="media-object" src="<?= asset()?>img/avatar/avatar-1.jpg" alt="user">
                            </div>
                            <div class="detail">
                                <h5>Maikel Alisa</h5>
                                <p>Creative Director, New York</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="slick-slide-item">
                    <div class="testimonial-inner">
                        <div class="text-box">
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard</p>
                            <div class="rating">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star-o"></i>
                                <span>( 4 Reviews )</span>
                            </div>
                        </div>
                        <div class="user">
                            <div class="photo">
                                <img class="media-object" src="<?= asset()?>img/avatar/avatar-2.jpg" alt="user">
                            </div>
                            <div class="detail">
                                <h5>Auro Navanth</h5>
                                <p>Office Manager, New York</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="slick-prev slick-arrow-buton">
                <i class="fa fa-angle-left"></i>
            </div>
            <div class="slick-next slick-arrow-buton">
                <i class="fa fa-angle-right"></i>
            </div>
        </div>





        <div class="dashboard-content mt-5">
          <div class="dashboard-list">
            <h3 class="heading bg-grea-3">Customer Review</h3>
            <div class="dashboard-message contact-2 bdr bg-white clearfix">
              <div class="row">
                <div class="col-lg-12 col-md-12">
                  <form action="#" method="GET" enctype="multipart/form-data">
                    <div class="row">
                      <div class="col-lg-6 col-md-6">
                        <div class="form-group name">
                          <label>Your Name</label>
                          <input type="text" name="name" class="form-control" placeholder="Enter Your Name">
                        </div>
                      </div>
                      <div class="col-lg-6 col-md-6">
                        <div class="form-group number">
                          <label>Email</label>
                          <input type="email" name="email" class="form-control" placeholder="Enter Your Email">
                        </div>
                      </div>
                      <div class="col-lg-12 col-md-12 col-sm-12">
                        <div class="form-group message mb-0">
                          <label>Personal info</label>
                          <textarea class="form-control" name="message" placeholder="Personal info"></textarea>
                        </div>
                        <button type="button" class="btn btn-primary btn-md mt-3 color-btn">Review Submit</button>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>

          </div>
        </div>


    </div>
</div>
