<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<head>
    <title>Build Pillar | <?= (!empty($name)) ? ucwords($name) : '' ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="<?= asset() ?>css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="<?= asset() ?>css/animate.min.css">
    <link rel="stylesheet" type="text/css" href="<?= asset() ?>css/bootstrap-submenu.css">
    <link rel="stylesheet" type="text/css" href="<?= asset() ?>css/bootstrap-select.min.css">
    <link rel="stylesheet" type="text/css" href="<?= asset() ?>css/magnific-popup.css">
    <link rel="stylesheet" href="<?= asset() ?>css/leaflet.css" type="text/css">
    <link rel="stylesheet" href="<?= asset() ?>css/map.css" type="text/css">
    <link rel="stylesheet" type="text/css" href="<?= asset() ?>fonts/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="<?= asset() ?>fonts/flaticon/font/flaticon.css">
    <link rel="stylesheet" type="text/css" href="<?= asset() ?>fonts/linearicons/style.css">
    <link rel="stylesheet" type="text/css"  href="<?= asset() ?>css/jquery.mCustomScrollbar.css">
    <link rel="stylesheet" type="text/css"  href="<?= asset() ?>css/dropzone.css">
    <link rel="stylesheet" type="text/css"  href="<?= asset() ?>css/slick.css">
    <link rel="stylesheet" type="text/css" href="<?= asset() ?>css/style.css">
    <link rel="stylesheet" type="text/css" id="style_sheet" href="<?= asset() ?>css/skins/default.css">
    <link rel="shortcut icon" href="<?= asset() ?>img/favicon.png" type="image/x-icon" >
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Raleway:300,400,500,600,300,700">
    <link rel="stylesheet" type="text/css" href="<?= asset() ?>css/ie10-viewport-bug-workaround.css">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script  src="<?= asset() ?>js/ie-emulation-modes-warning.js"></script>

    <script type='text/javascript' src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDiWWB6yJd6ilpII5N89O-vXAo2eXiVD9g&sensor=false&libraries=places"></script>
</head>
<body>
    <!-- <div class="page_loader"></div> -->
    <!-- <header class="top-header" id="top-header-2">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-9 col-sm-7">
                    <div class="list-inline">
                        <a href="tel:+91 90 95 95 94 93"><i class="fa fa-phone"></i>+91 90 95 95 94 93</a>
                        <a href="tel:info@buildpillar.com"><i class="fa fa-envelope"></i>info@buildpillar.com</a>
                        <a href="tel:info@buildpillar.com"><i class="flaticon-pin"></i>Mon - Sun: 9:30am - 6:30pm</a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-3 col-sm-5">
                    <ul class="top-social-media pull-right">
                        <li>
                            <a href="#" class="facebook"><i class="fa fa-facebook"></i></a>
                        </li>
                        <li>
                            <a href="#" class="twitter"><i class="fa fa-twitter"></i></a>
                        </li>
                        <li>
                            <a href="#" class="google"><i class="fa fa-google-plus"></i></a>
                        </li>
                        <li>
                            <a href="#" class="linkedin"><i class="fa fa-linkedin"></i> </a>
                        </li>
                        <li>
                            <a href="#" class="rss"><i class="fa fa-instagram"></i></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </header> -->
    
    <header class="main-header fixed-header fixed-header-2">
        <div class="container">
            <nav class="navbar navbar-expand-lg navbar-light">
                <a class="navbar-brand company-logo" href="<?= base_url()?>">
                    <img src="<?= asset()?>img/logo.png" alt="logo">
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav header-ml ml-auto">
                        <li class="nav-item"><a class="nav-link" href="<?= base_url() ?>">Home</a></li>
                        <li class="nav-item"><a class="nav-link" href="<?= base_url('about') ?>">About Us</a></li>
                        <li class="nav-item"><a class="nav-link" href="<?= base_url('gallery') ?>">Gallery</a></li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Properties
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                <li class="dropdown">
                                    <a class="dropdown-item" href="<?= base_url('commercial-properties') ?>">Rent</a>
                                </li>
                                <li class="dropdown">
                                    <a class="dropdown-item" href="<?= base_url('commercial-properties') ?>">Sale</a>
                                </li>
                            </ul>
                         </li>
                        <li class="nav-item"><a class="nav-link" href="<?= base_url('contact') ?>">Contact Us</a></li>
                    </ul>
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item ">
                            
                            <a class="nav-link property-btn" href="<?= base_url('') ?>">
                                <i class="lnr lnr-download"></i> Download Brochure
                            </a>
                            
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
    </header>
    <div class="top-head">
    <?php if (!empty($sub_banner)): ?>

    <div class="sub-banner">
        <div class="container breadcrumb-area">
            <div class="breadcrumb-areas">
                <h1><?= ucwords($sub_banner) ?></h1>
                <ul class="breadcrumbs">
                    <li><a href="<?= base_url() ?>">Home</a></li>
                    <li class="active"><?= ucwords($sub_banner) ?></li>
                </ul>
            </div>
        </div>
    </div>
    <?php endif ?>
    <?= $contents ?>
    <footer class="footer">
        <div class="container footer-inner">
            <div class="row">
                <div class="col-xl-5 col-lg-5 col-md-6 col-sm-6">
                    <div class="footer-item clearfix">
                        <img src="<?= asset()?>img/logo.png" alt="logo" class="f-logo">
                        <p class="text-justify">we offer outstanding priority offerings in first-class residential, commercial &amp; industrial properties as well as in rentals and leasing. We operate in Ahmedabad, Gandhinagar and surrounding areas.
                        <div class="clearfix"></div>
                        <div class="social-list-2">
                            <ul>
                                <li><a href="#" class="facebook-bg"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="#" class="twitter-bg"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="#" class="google-bg"><i class="fa fa-youtube-play"></i></a></li>
                                <li><a href="#" class="linkedin-bg"><i class="fa fa-linkedin"></i></a></li>
                                <li><a href="#" class="instagram-bg"><i class="fa fa-instagram"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
                    <div class="footer-item">
                        <h4>
                        Useful Links
                        </h4>
                        <ul class="links">
                            <li>
                                <a href="<?= base_url() ?>">Home</a>
                            </li>
                            <li>
                                <a href="<?= base_url('contact') ?>">Contact Us</a>
                            </li>
                            <li>
                                <a href="<?= base_url('about') ?>">About Us</a>
                            </li>
                            <li>
                                <a href="<?= base_url('residential-properties') ?>">Residential Properties</a>
                            </li>
                            <li>
                                <a href="<?= base_url('commercial-properties') ?>">Commercial Properties</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <!-- <div class="col-xl-4 col-lg-3 col-md-6 col-sm-6">
                    <div class="recent-properties footer-item">
                        <?php $recent = $this->fmain->getall('residential', 'id,price,title, multi_image,uploaded', '','id','',3); ?>
                        <h4>Recent Properties</h4>
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
                </div> -->
                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6">
                    <div class="footer-item clearfix">
                        <h4>Subscribe</h4>
                        <ul class="contact-info">
                            <li>
                                <i class="flaticon-pin"></i>A-1009,Mondeal Hights,Nr. Panchratna Party Plot ,S.G highway Ahmedabad, Gujarat 380013
                            </li>
                            <li>
                                <i class="flaticon-mail"></i><a href="mailto:demo@gmail.com">info@admirereality.com</a><br><a href="mailto:demo@gmail.com">admirereality2022@gmail.com</a>
                            </li>
                            <li>
                                <i class="flaticon-phone"></i><a class="font-family" href="tel: +91 9998518458"> +91 99 98 51 84 58</a> <br> <a class="font-family" href="tel: +91 7990126852"> +91 79 90 12 68 52</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-xl-12 col-lg-12">
                    <p class="copy sub-footer">© 2022 <a href="https://amazewebsolutions.com/" target="_blank">Amaze web solution.</a> Trademarks and brands are the property of their respective owners.</p>
                </div>
            </div>
        </div>
    </footer>
    <!-- call -->
    <div class="phone quick-alo-phone">
        <a href="tel:+917940062405">
            <div class="quick-alo-ph-circle"></div>
            <div class="quick-alo-ph-circle-fill"></div>
            <div class="quick-alo-ph-img-circle"></div>
        </a>
    </div>
    <!-- Whatsapp -->
    <a href="https://api.whatsapp.com/send?phone=+91 9428505555&amp;text=Hello" class="float" target="_blank">
        <i class="fa fa-whatsapp my-float"></i>
    </a>

    <!-- INSTAGRAM -->
    <a href="https://www.instagram.com/" class="float1" target="_blank">
        <i class="fa fa-instagram my-float1"></i>
    </a>
    </div>
    <script src="<?= asset() ?>js/jquery-2.2.0.min.js"></script>
    <script src="<?= asset() ?>js/popper.min.js"></script>
    <script src="<?= asset() ?>js/bootstrap.min.js"></script>
    <script  src="<?= asset() ?>js/bootstrap-submenu.js"></script>
    <script  src="<?= asset() ?>js/rangeslider.js"></script>
    <script  src="<?= asset() ?>js/jquery.mb.YTPlayer.js"></script>
    <script  src="<?= asset() ?>js/bootstrap-select.min.js"></script>
    <script  src="<?= asset() ?>js/jquery.easing.1.3.js"></script>
    <script  src="<?= asset() ?>js/jquery.scrollUp.js"></script>
    <script  src="<?= asset() ?>js/jquery.mCustomScrollbar.concat.min.js"></script>
    <script  src="<?= asset() ?>js/leaflet.js"></script>
    <script  src="<?= asset() ?>js/leaflet-providers.js"></script>
    <script  src="<?= asset() ?>js/leaflet.markercluster.js"></script>
    <script  src="<?= asset() ?>js/dropzone.js"></script>
    <script  src="<?= asset() ?>js/slick.min.js"></script>
    <script  src="<?= asset() ?>js/jquery.filterizr.js"></script>
    <script  src="<?= asset() ?>js/jquery.magnific-popup.min.js"></script>
    <script  src="<?= asset() ?>js/jquery.countdown.js"></script>
    <script  src="<?= asset() ?>js/maps.js"></script>
    <script  src="<?= asset() ?>js/validator.min.js"></script>
    <script  src="<?= asset() ?>js/f_validation.js"></script>
    <script  src="<?= asset() ?>js/jquery.geocomplete.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script  src="<?= asset() ?>js/app.js"></script>
    <script  src="<?= asset() ?>js/f_app.js"></script>
    <script  src="<?= asset() ?>js/ie10-viewport-bug-workaround.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
</body>
</html>