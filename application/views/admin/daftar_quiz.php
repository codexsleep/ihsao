<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>Quiz Administrator | Ihsao</title>
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
                                            <li class="breadcrumb-item active">Quiz</li>
                                        </ol>
                                    </div>
                                    <h4 class="page-title">Daftar Quiz</h4>
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
                                                	<th>Jenis</th>
                                                	<th>Waktu</th>
                                                	<th>Start End Time</th>
                                                	<th>Token</th>
                                                    <th>Total Soal</th>
                                                    <th>Action</th>
        										</tr>
    										</thead>
    										<tbody>
                                                <?php
                                                    foreach ($quiz as $quiz) {

                                                    if($quiz['quiz_type']=="Objektif"){ 
                                                            $jumlah = $this->quiz_model->jumlah_soal_objektif($quiz['quiz_id'])->row_array(); 
                                                            $jumsoal = $jumlah['total'];
                                                        }elseif($quiz['quiz_type']=="Esay"){ 
                                                            $jumsoal = "-";
                                                        }
                                                ?>
        										<tr>
                                    	            <td><?= $quiz['quiz_id'];?></td>
                                    	            <td><?= $quiz['quiz_name'];?></td>
                                     	           	<td><?= $quiz['quiz_type'];?></td>
                                      	          	<td><?= $quiz['quiz_time'];?>M</td>
                                     	           	<td><?= $quiz['quiz_start'];?> - <?= $quiz['quiz_end'];?></td>
                                      	          	<td><?= $quiz['quiz_token'];?></td>
                                                    <td><?= $jumsoal;?></td>
                                                    <td>

                                                        <?php
                                                            if($quiz['quiz_type']=="Objektif"){
                                                        ?>
                                                        <a href="<?= base_url();?>admin/quiz/soal_objektif/<?= $quiz['quiz_id'];?>"><button type="button" class="btn btn-success"><i class="mdi mdi-format-list-bulleted-square"></i> </button></a>
                                                        <?php
                                                            }elseif($quiz['quiz_type']=="Esay"){
                                                        ?>
                                                        <a href="<?= base_url();?>admin/quiz/soal_esay/<?= $quiz['quiz_id'];?>"><button type="button" class="btn btn-success"><i class="mdi mdi-file-document-outline"></i> </button></a>
                                                        <?php
                                                            }
                                                        ?>
                                                        <a href="<?= base_url();?>admin/quiz/edit/<?= $quiz['quiz_id'];?>"><button type="button" class="btn btn-warning"><i class="mdi mdi-pencil"></i> </button></a>
                                                        <a href="<?= base_url();?>admin/quiz/delete/<?= $quiz['quiz_id'];?>"><button type="button" class="btn btn-danger"><i class="mdi mdi-trash-can"></i> </button></td>
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
