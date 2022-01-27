<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>Peserta | Administrator Ihsao</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
        <meta content="Coderthemes" name="author" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="assets/images/favicon.ico">

        <!-- third party css -->
        <link href="<?= base_url();?>assets/css/vendor/dataTables.bootstrap5.css" rel="stylesheet" type="text/css" />
        <link href="<?= base_url();?>assets/css/vendor/responsive.bootstrap5.css" rel="stylesheet" type="text/css" />
        <link href="<?= base_url();?>assets/css/vendor/buttons.bootstrap5.css" rel="stylesheet" type="text/css" />
        <link href="<?= base_url();?>assets/css/vendor/select.bootstrap5.css" rel="stylesheet" type="text/css" />

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
                                            <li class="breadcrumb-item active">Peserta</li>
                                        </ol>
                                    </div>
                                    <h4 class="page-title">Daftar Peserta</h4>
                                </div>
                            </div>
                        </div>
                        <!-- end page title --> 
                          <?php if(isset($_COOKIE['errmesg'])){ ?>
                        <div class="alert alert-danger alert-dismissible bg-danger text-white border-0 fade show" role="alert">
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            <strong>Error - </strong> <?= $_COOKIE['errmesg'];?>
                        </div>
                         <?php }elseif(isset($_COOKIE['sucmesg'])){?>
                        <div class="alert alert-success alert-dismissible bg-success text-white border-0 fade show" role="alert">
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            <strong>Success - </strong> <?= $_COOKIE['sucmesg'];?>
                        </div>
                        <?php }?>
                        <div class="row">
                        	 <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                    	<table id="basic-datatable" class="table dt-responsive nowrap w-100">
    										<thead>
                                                <tr>
                                                	<th>ID</th>
                                                	<th>Nama</th>
                                                	<th>Email</th>
                                                	<th>NIS</th>
                                                    <th>Action</th>
        										</tr>
    										</thead>
    										<tbody>
                                                <?php
                                                    foreach ($peserta as $peserta) {
                                                ?>
        										<tr>
                                    	            <td><?= $peserta['peserta_id'];?></td>
                                    	            <td><?= $peserta['peserta_name'];?></td>
                                     	           	<td><?= $peserta['peserta_email'];?></td>
                                      	          	<td><?= $peserta['peserta_nis'];?></td>
                                                    <td>
                                                        <a href="<?= base_url();?>admin/peserta/edit/<?= $peserta['peserta_id'];?>"><button type="button" class="btn btn-warning"><i class="mdi mdi-pencil"></i> </button></a>
                                                        <a href="<?= base_url();?>admin/peserta/delete/<?= $peserta['peserta_id'];?>"><button type="button" class="btn btn-danger"><i class="mdi mdi-trash-can"></i> </button></td></a>
                                            	</tr>
                                            <?php } ?>
    										</tbody>
										</table>
                                    </div>
                                </div>
                            </div>
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
        <script src="<?= base_url();?>assets/js/vendor/jquery.dataTables.min.js"></script>
        <script src="<?= base_url();?>assets/js/vendor/dataTables.bootstrap5.js"></script>
        <script src="<?= base_url();?>assets/js/vendor/dataTables.responsive.min.js"></script>
        <script src="<?= base_url();?>assets/js/vendor/responsive.bootstrap5.min.js"></script>
        <script src="<?= base_url();?>assets/js/vendor/dataTables.buttons.min.js"></script>
        <script src="<?= base_url();?>assets/js/vendor/buttons.bootstrap5.min.js"></script>
        <script src="<?= base_url();?>assets/js/vendor/buttons.html5.min.js"></script>
        <script src="<?= base_url();?>assets/js/vendor/buttons.flash.min.js"></script>
        <script src="<?= base_url();?>assets/js/vendor/buttons.print.min.js"></script>
        <script src="<?= base_url();?>assets/js/vendor/dataTables.keyTable.min.js"></script>
        <script src="<?= base_url();?>assets/js/vendor/dataTables.select.min.js"></script>
        <!-- third party js ends -->

        <!-- demo app -->
        <script src="<?= base_url();?>assets/js/pages/demo.datatable-init.js"></script>
        <!-- end demo js-->

        <!-- third party js -->
        <script src="<?= base_url();?>assets/js/vendor/Chart.bundle.min.js"></script>
        <!-- third party js ends -->

        <!-- demo app -->
        <script src="<?= base_url();?>assets/js/pages/demo.dashboard-projects.js"></script>
        <!-- end demo js-->

    </body>
</html>
