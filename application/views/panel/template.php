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
    <link rel="stylesheet" type="text/css"  href="<?= asset() ?>css/toastr.min.css">
    <link rel="stylesheet" type="text/css"  href="<?= asset() ?>css/slick.css">
    <link rel="stylesheet" type="text/css"  href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css">

    <!-- Custom stylesheet -->
    <link rel="stylesheet" type="text/css" href="<?= asset() ?>css/style.css">
    <link rel="stylesheet" type="text/css" id="style_sheet" href="<?= asset() ?>css/skins/default.css">

    <!-- Favicon icon -->
    <link rel="shortcut icon" href="<?= asset() ?>img/favicon.png" type="image/x-icon" >
    
    <!-- Google fonts -->
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Raleway:300,400,500,600,300,700">

    <link rel="stylesheet" type="text/css" href="<?= asset() ?>css/ie10-viewport-bug-workaround.css">

    <script  src="<?= asset() ?>js/ie-emulation-modes-warning.js"></script>
</head>
<body>
    <div class="page_loader"></div>
    <header class="main-header header-2 fixed-header">
    <div class="container-fluid">
        <nav class="navbar navbar-expand-lg navbar-light">
            <a class="navbar-brand logo pad-0" href="<?= base_url('panel') ?>">
                <img src="<?= asset() ?>img/logo.png" alt="logo">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto d-lg-none d-xl-none">
                    <li class="nav-item dropdown">
                        <a href="<?= base_url('panel/my-profile') ?>" class="nav-link">My Profile</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a href="<?= base_url('panel/logout') ?>" class="nav-link">Logout</a>
                    </li>
                </ul>
                <div class="navbar-buttons ml-auto d-none d-xl-block d-lg-block">
                    <ul>
                        <li>
                            <div class="dropdown btns">
                                <a class="dropdown-toggle" data-toggle="dropdown">
                                    <img src="<?= asset() ?>img/users/<?= ($this->session->userdata('image')) ? $this->session->userdata('image') : 'avatar-6.jpg'?>" alt="avatar">
                                    My Account
                                </a>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item"><?= ucwords($this->session->userdata('name')) ?></a>
                                    <a class="dropdown-item"><?= $this->session->userdata('mobile') ?></a>
                                    <a class="dropdown-item"><?= $this->session->userdata('email') ?></a>
                                    <a class="dropdown-item" href="<?= base_url('panel/my-profile') ?>">My profile</a>
                                    <a class="dropdown-item" href="<?= base_url('panel/logout') ?>">Logout</a>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
</header>
<div class="dashboard submit-property">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-3 col-md-12 col-sm-12 col-pad side-bar">
                <div class="dashboard-nav d-none d-xl-block d-lg-block">
                    <div class="dashboard-inner">
                        <?php foreach ($navigation as $k => $v): ?>
                        <h4><?= $k ?></h4>    
                        <ul>
                            <?php foreach ($v as $k => $va): ?>
                            <li><a href="<?= base_url('panel/').$va['url']?>"><i class="flaticon-<?= $va['icon'] ?>"></i><?= ucwords($va['sub_menu']) ?></a></li>    
                            <?php endforeach ?>
                        </ul>
                        <?php endforeach ?>
                    </div>
                </div>
            </div>
            <div class="col-lg-9 col-md-12 col-sm-12 col-pad">
                <div class="content-area5 dashboard-content">
                    <div class="dashboard-header clearfix">
                        <div class="row">
                            <div class="col-sm-12 col-md-6"><h4><?= ucwords(str_replace("-", " ", $name)) ?></h4></div>
                            <div class="col-sm-12 col-md-6">
                                <div class="breadcrumb-nav">
                                    <ul>
                                        <li>
                                            <a href="<?= base_url('panel') ?>">Home</a>
                                        </li>
                                        <li class="active"><?= ucwords(str_replace("-", " ", $name)) ?></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php if (!empty($this->session->flashdata('success'))): ?>
                        <input type="hidden" id="success-message" value="<?= $this->session->flashdata('success') ?>">
                    <?php endif ?>
                    <?php if (!empty($this->session->flashdata('error'))): ?>
                        <input type="hidden" id="error-message" value="<?= $this->session->flashdata('error') ?>">
                    <?php endif ?>
                    <?= $contents ?>
                    <!-- <p class="sub-banner-2 text-center">© 2019 Densetek. Trademarks and brands are the property of their respective owners.</p> -->
                </div>
            </div>
        </div>
    </div>
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
<script  src="<?= asset() ?>js/jquery.dataTables.min.js"></script>
<script  src="<?= asset() ?>js/validator.min.js"></script>
<script  src="<?= asset() ?>js/validation.js"></script>
<script  src="<?= asset() ?>js/toastr.min.js"></script>
<script  src="<?= asset() ?>js/app.js"></script>
<script  src="<?= asset() ?>js/b_app.js"></script>

<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
<script  src="<?= asset() ?>js/ie10-viewport-bug-workaround.js"></script>
<!-- Custom javascript -->
<script  src="<?= asset() ?>js/ie10-viewport-bug-workaround.js"></script>
</body>
</html>