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
<body class="bg-grea-3">
<div class="page_loader"></div>

<?= $contents ?>


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
<script  src="<?= asset() ?>js/validation.js"></script>
<script  src="<?= asset() ?>js/app.js"></script>

<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
<script  src="<?= asset() ?>js/ie10-viewport-bug-workaround.js"></script>
</body>
</html>