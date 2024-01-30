<!DOCTYPE html>
<html lang="en">

<head>
    <title><?= $title; ?></title>
    <!-- META -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!--::::: FABICON ICON :::::::-->
    <link rel="icon" href="<?= base_url('assets/cekjabar/img/icon/fabicon2.png'); ?>">
    <!--::::: ALL CSS FILES :::::::-->
    <link rel="stylesheet" href="<?= base_url('assets/cekjabar/css/plugins/bootstrap.min.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('assets/cekjabar/css/plugins/animate.min.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('assets/cekjabar/css/plugins/fontawesome.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('assets/cekjabar/css/plugins/modal-video.min.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('assets/cekjabar/css/plugins/owl.carousel.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('assets/cekjabar/css/plugins/slick.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('assets/cekjabar/css/plugins/stellarnav.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('assets/cekjabar/css/theme.css'); ?>">
</head>

<body class="theme-4">
    <!--::::: PRELOADER START :::::::-->
    <div class="preloader v4">
        <div>
            <div class="nb-spinner"></div>
        </div>
    </div>
    <!--::::: PRELOADER END :::::::-->
    <?= $this->include('CekJabar/Layout/Header'); ?>
    <?= $this->include('CekJabar/Layout/Menu'); ?>
    <?= $this->renderSection('content'); ?>
    <?= $this->include('CekJabar/Layout/Footer'); ?>

    <!--::::: ALL JS FILES :::::::-->
    <script src="<?= base_url('assets/cekjabar/js/plugins/jquery.2.1.0.min.js'); ?>"></script>
    <script src="<?= base_url('assets/cekjabar/js/plugins/bootstrap.min.js'); ?>"></script>
    <script src="<?= base_url('assets/cekjabar/js/plugins/jquery.nav.js'); ?>"></script>
    <script src="<?= base_url('assets/cekjabar/js/plugins/jquery.waypoints.min.js'); ?>"></script>
    <script src="<?= base_url('assets/cekjabar/js/plugins/jquery-modal-video.min.js'); ?>"></script>
    <script src="<?= base_url('assets/cekjabar/js/plugins/owl.carousel.js'); ?>"></script>
    <script src="<?= base_url('assets/cekjabar/js/plugins/popper.min.js'); ?>"></script>
    <script src="<?= base_url('assets/cekjabar/js/plugins/circle-progress.js'); ?>"></script>
    <script src="<?= base_url('assets/cekjabar/js/plugins/wow.min.js'); ?>"></script>
    <script src="<?= base_url('assets/cekjabar/js/plugins/stellarnav.js'); ?>"></script>
    <script src="<?= base_url('assets/cekjabar/js/plugins/slick.min.js'); ?>"></script>
    <script src="<?= base_url('assets/cekjabar/js/main.js'); ?>"></script>
</body>

</html>