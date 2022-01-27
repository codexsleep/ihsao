
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>Tambah Soal Administrator | Ihsao</title>
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

        <!-- Quill css -->
        <link href="<?= base_url();?>assets/css/vendor/quill.core.css" rel="stylesheet" type="text/css" />
        <link href="<?= base_url();?>assets/css/vendor/quill.snow.css" rel="stylesheet" type="text/css" />
        <script type="text/javascript" src="<?= base_url();?>assets/plugin/ckeditor/ckeditor.js"></script>

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
                                            <li class="breadcrumb-item"><a href="<?= base_url();?>admin/quiz">Quiz</a></li>
                                            <li class="breadcrumb-item active">Lihat Soal</li>
                                        </ol>
                                    </div>
                                    <h4 class="page-title">Soal <?= $soalid;?></h4>
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
                         <?php } ?>
                        <div class="row">
                        	 <div class="col-12">
                                 <div class="card">
                                    <div class="card-body">
                                        <div class="tab-content">
                                           			<div class="mb-3">
       			 										<div class="font-16"><?= htmlspecialchars_decode($objektif['quiz_question']);?></div>
                                           			</div>
                                           			<?php
                                           				//algoritma check jawaban
                                           			if($objektif['quiz_answare']=="A"){
                                           				$option_a = "checked";
                                           			}elseif($objektif['quiz_answare']=="B"){
                                           				$option_b = "checked";
                                           			}elseif($objektif['quiz_answare']=="C"){
                                           				$option_c = "checked";
                                           			}elseif($objektif['quiz_answare']=="D"){
                                           				$option_d = "checked";
                                           			}elseif($objektif['quiz_answare']=="E"){
                                           				$quiz_option_e = "checked";
                                           			}
                                           			?>
                                                    <div class="mb-3">
                                                        <div class="form-check">
       			 											<input type="radio" name="customRadio" class="form-check-input" <?php if(isset($option_a)){ echo $option_a;}?>>
        													<label class="form-check-label"><?= htmlspecialchars_decode($objektif['quiz_option_a']);?></label>
    													</div>
    													<div class="form-check">
        													<input type="radio" name="customRadio" class="form-check-input" <?php if(isset($option_a)){ echo $option_b;}?>>
        													<label class="form-check-label"><?= htmlspecialchars_decode($objektif['quiz_option_b']);?></label>
    													</div>
    													<div class="form-check">
        													<input type="radio" name="customRadio" class="form-check-input" <?php if(isset($option_a)){ echo $option_c;}?>>
        													<label class="form-check-label"><?= htmlspecialchars_decode($objektif['quiz_option_c']);?></label>
    													</div>
    													<div class="form-check">
        													<input type="radio" name="customRadio" class="form-check-input" <?php if(isset($option_a)){ echo $option_d;}?>>
        													<label class="form-check-label"><?= htmlspecialchars_decode($objektif['quiz_option_d']);?></label>
    													</div>
    													<div class="form-check">
        													<input type="radio" name="customRadio" class="form-check-input" <?php if(isset($option_a)){ echo $option_e;}?>>
        													<label class="form-check-label"><?= htmlspecialchars_decode($objektif['quiz_option_e']);?></label>
    													</div>
                                                    </div>
                                                    </div>
                                        </div> <!-- end tab-content-->
                                    </div> <!-- end card-body-->
                                </div> <!-- end card-->
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
        <script>
        var quill = new Quill('#quill_editor', {
                theme: 'snow'
        });
   quill.on('text-change', function(delta, oldDelta, source) {
        document.getElementById("quill_html").value = quill.root.innerHTML;
    });
        </script>
        <!-- quill js -->
        <script src="<?= base_url();?>assets/js/vendor/quill.min.js"></script>
        <!-- quill Init js-->
        <script src="<?= base_url();?>assets/js/pages/demo.quilljs.js"></script>
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
