<!DOCTYPE html>
<html lang="en">

<head>

    <link rel="icon" href="<?= base_url('favicon.png'); ?>" type="image/x-icon">
    <link rel="shortcut icon" href="<?= base_url('favicon.png'); ?>" type="image/x-icon">

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title><?= $title; ?></title>

    <link href="<?= base_url('assets/auth/vendor/fontawesome-free/css/all.min.css'); ?>" rel="stylesheet" type="text/css">

    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <link href="<?= base_url('assets/auth/css/sb-admin-2.min.css'); ?>" rel="stylesheet">
</head>

<body class="bg-gradient-primary">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-6 col-lg-6 col-md-9">
                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="p-5">

                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4"><?= $title; ?></h1>

                                        <?php
                                        if (session()->getFlashdata('error')) {
                                            echo '<div class="alert alert-danger">' . session()->getFlashdata('error') . '</div>';
                                        }
                                        if (session()->getFlashdata('warning')) {
                                            echo '<div class="alert alert-warning">' . session()->getFlashdata('warning') . '</div>';
                                        }
                                        if (session()->getFlashdata('success')) {
                                            echo '<div class="alert alert-success">' . session()->getFlashdata('success') . '</div>';
                                        }
                                        ?>
                                    </div>

                                    <?= $this->renderSection('content'); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="<?= base_url('assets/auth/vendor/jquery/jquery.min.js'); ?>"></script>
    <script src="<?= base_url('assets/auth/vendor/bootstrap/js/bootstrap.bundle.min.js'); ?>"></script>

    <script src="<?= base_url('assets/auth/vendor/jquery-easing/jquery.easing.min.js'); ?>"></script>

    <script src="<?= base_url('assets/auth/js/sb-admin-2.min.js'); ?>"></script>

</body>

</html>