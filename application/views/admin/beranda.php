<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>Beranda Administrator | Ihsao</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
        <meta content="Coderthemes" name="author" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="assets/images/favicon.ico">

        <!-- App css -->
        <link href="<?= base_url();?>assets/css/icons.min.css" rel="stylesheet" type="text/css" />
        <link href="<?= base_url();?>assets/css/app.min.css" rel="stylesheet" type="text/css" id="light-style" />
        <link href="<?= base_url();?>assets/css/app-dark.min.css" rel="stylesheet" type="text/css" id="dark-style" />

    </head>

    <body class="loading" data-layout-config='{"leftSideBarTheme":"dark","layoutBoxed":false, "leftSidebarCondensed":false, "leftSidebarScrollable":false,"darkMode":false, "showRightSidebarOnStart": true}'>
        <!-- Begin page -->
        <div class="wrapper">
          <?php require_once 'include/sidebar.php';?>

            <!-- ============================================================== -->
            <!-- Start Page Content here -->
            <!-- ============================================================== -->

            <div class="content-page">
                <div class="content">
                  <?php require_once 'include/topbar.php';?>

                    <!-- Start Content-->
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box">
                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Ihsao</a></li>
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Admin</a></li>
                                            <li class="breadcrumb-item active">Beranda</li>
                                        </ol>
                                    </div>
                                    <h4 class="page-title">Ihsao Administrator</h4>
                                </div>
                            </div>
                        </div>
                        <!-- end page title --> 
                        <div class="row">
                            <div class="col-xxl-3 col-lg-4">
                                <div class="card widget-flat bg-success text-white">
                                    <div class="card-body">
                                        <div class="float-end">
                                            <i class="mdi mdi-account-multiple widget-icon bg-white text-success"></i>
                                        </div>
                                        <h5 class="fw-normal mt-0" title="Jumlah Peserta">Jumlah Peserta</h5>
                                        <h3 class="mt-3 mb-3"><?= $total_peserta;?></h3>
                                    </div>
                                </div>
                            </div> <!-- end col-->

                            <div class="col-xxl-3 col-lg-4">
                                <div class="card widget-flat bg-primary text-white">
                                    <div class="card-body">
                                        <div class="float-end">
                                            <i class="mdi mdi-currency-usd widget-icon bg-light-lighten rounded-circle text-white"></i>
                                        </div>
                                        <h5 class="fw-normal mt-0" title="Jumlah Quiz">Jumlah Quiz</h5>
                                        <h3 class="mt-3 mb-3 text-white"><?= $total_quiz;?></h3>
                                      
                                    </div>
                                </div>
                            </div> <!-- end col-->

                            <div class="col-xxl-3 col-lg-4">
                                <div class="card widget-flat bg-info text-white">
                                    <div class="card-body">
                                        <div class="float-end">
                                            <i class="mdi mdi-currency-usd widget-icon bg-light-lighten rounded-circle text-white"></i>
                                        </div>
                                        <h5 class="fw-normal mt-0" title="Jumlah Soal">Jumlah Soal</h5>
                                        <h3 class="mt-3 mb-3 text-white"><?= $total_soal;?></h3>
                                      
                                    </div>
                                </div>
                            </div> <!-- end col-->
                        </div>

                    </div> <!-- container -->

                </div> <!-- content -->
            <?php require_once 'include/footer.php';?>

            </div>

            <!-- ============================================================== -->
            <!-- End Page content -->
            <!-- ============================================================== -->


        </div>
        <!-- END wrapper -->

        <div class="rightbar-overlay"></div>
        <!-- /End-bar -->

        <!-- bundle -->
        <script src="<?= base_url();?>assets/js/vendor.min.js"></script>
        <script src="<?= base_url();?>assets/js/app.min.js"></script>

        <!-- third party js -->
        <script src="<?= base_url();?>assets/js/vendor/Chart.bundle.min.js"></script>
        <!-- third party js ends -->

        <!-- demo app -->
        <script src="<?= base_url();?>assets/js/pages/demo.dashboard-projects.js"></script>
        <!-- end demo js-->

    </body>
</html>
