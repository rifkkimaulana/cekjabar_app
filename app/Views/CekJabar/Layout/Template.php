<!DOCTYPE html>
<html lang="en">

<!-- Basic -->
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">

<!-- Mobile Metas -->
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<!-- Site Metas -->
<title><?= $title; ?></title>
<meta name="keywords" content="">
<meta name="description" content="">
<meta name="author" content="">

<!-- Site Icons -->
<link rel="shortcut icon" href="<?= base_url('assets/cekjabar/images/favicon.ico'); ?>" type="image/x-icon" />
<link rel="apple-touch-icon" href="<?= base_url('assets/cekjabar/images/apple-touch-icon.png'); ?>">

<!-- Design fonts -->
<link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">

<!-- Bootstrap core CSS -->
<link href="<?= base_url('assets/cekjabar/css/bootstrap.css'); ?>" rel="stylesheet">

<!-- FontAwesome Icons core CSS -->
<link href="<?= base_url('assets/cekjabar/css/font-awesome.min.css'); ?>" rel="stylesheet">

<!-- Custom styles for this template -->
<link href="<?= base_url('assets/cekjabar/style.css'); ?>" rel="stylesheet">

<!-- Responsive styles for this template -->
<link href="<?= base_url('assets/cekjabar/css/responsive.css'); ?>" rel="stylesheet">

<!-- Colors for this template -->
<link href="<?= base_url('assets/cekjabar/css/colors.css'); ?>" rel="stylesheet">

<!-- Version Tech CSS for this template -->
<link href="<?= base_url('assets/cekjabar/css/version/tech.css'); ?>" rel="stylesheet">

<!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <div id="wrapper">
        <header class="tech-header header">
            <div class="container-fluid">
                <?= $this->include('CekJabar/Layout/Header'); ?>
            </div>
        </header>

        <?= $this->renderSection('content'); ?>
        <?= $this->include('CekJabar/Layout/Footer'); ?>
    </div>
    <!-- end wrapper -->

    <!-- Core JavaScript
    ================================================== -->
    <script src="<?= base_url('assets/cekjabar/js/jquery.min.js'); ?>"></script>
    <script src="<?= base_url('assets/cekjabar/js/tether.min.js'); ?>"></script>
    <script src="<?= base_url('assets/cekjabar/js/bootstrap.min.js'); ?>"></script>
    <script src="<?= base_url('assets/cekjabar/js/custom.js'); ?>"></script>

</body>

</html>