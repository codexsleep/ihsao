<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>Beranda Peserta | Ihsao</title>
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
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Peserta</a></li>
                                            <li class="breadcrumb-item active">Quiz</li>
                                        </ol>
                                    </div>
                                    <h4 class="page-title">Ihsao Beranda Peserta</h4>
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
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="app-search">
                                            <form method="POST" action="<?= base_url();?>peserta/beranda/proses_token">
                                                <div class="input-group">
                                                    <input type="text" class="form-control dropdown-toggle" name="token" placeholder="Masukkan Token Quiz..." id="top-search">
                                                        <span class="mdi mdi-barcode-scan search-icon"></span>
                                                        <button class="input-group-text btn-primary" type="submit">Proses</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="dropdown float-end">
                                            <a href="#" class="dropdown-toggle arrow-none card-drop" data-bs-toggle="dropdown" aria-expanded="false">
                                                <i class="mdi mdi-dots-vertical"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-end">
                                                <!-- item-->
                                                <a href="<?= base_url();?>peserta/beranda" class="dropdown-item">Refresh</a>
                                            </div>
                                        </div>
                                        <h4 class="header-title mb-3">Quiz Saya</h4>
                                        <div class="table-responsive">
                                            <table class="table table-centered table-nowrap table-hover mb-0">
                                                <tbody>
                                                    <?php
                                                    if($myquiz==null){//mengecek apakah log quiz dari user kosong
                                                        echo '<center class="font-16">Anda belum memiliki quiz :(</center>';

                                                    }else{//kondisi jika quiz log tersedia
                                                        foreach($myquiz as $quiz) {
                                                        $quizdata = $this->dashboard_model->dataquiz($quiz['quiz_id'])->row_array();
                                                        $jumsoal = $this->dashboard_model->totalsoal($quiz['quiz_id'])->row_array();
                                                        $awal   = strtotime($quizdata['quiz_start']);
                                                        $akhir  = strtotime($quizdata['quiz_end']);
                                                        $sekarang = strtotime(date('Y-m-d H:i:s'));
                                                        $diff   = $akhir - $awal;
                                                        $menit  = $diff/60;
                                                        //mengecek apakah waktu quiz tersedia untuk dikerjakan
                                                        if($sekarang>=$awal && $sekarang<$akhir){
                                                            $current_status = $quiz['quiz_status'];
                                                        }else{
                                                            $current_status = "Ditutup";
                                                        }
                                                        //algoritma status
                                                        if($current_status=="Tersedia"){
                                                            $status_quiz = "Tersedia";
                                                            $bd_status = "badge-success-lighten";

                                                        }elseif($current_status=="In-progress"){
                                                            $status_quiz = "In-progress";
                                                            $bd_status = "badge-warning-lighten";

                                                        }elseif($current_status=="Selesai"){
                                                            $status_quiz = "Selesai";
                                                            $bd_status = "badge-primary-lighten";
                                                            
                                                        }elseif($current_status=="Ditutup"){
                                                            $status_quiz = "Ditutup";
                                                            $bd_status = "badge-dark-lighten";
                                                            
                                                        }
                                                     ?>  
                                                    <tr>
                                                        <td>
                                                            <h5 class="font-14 my-1"><a href="javascript:void(0);" class="text-body">
                                                            <?= $quizdata['quiz_name'];?>
                                                            </a></h5>
                                                            <span class="text-muted font-13"><?php if($quizdata['quiz_type']=="Objektif"){ if($jumsoal['total']==null){echo "0 Soal";}else{ echo $jumsoal['total'].' Soal';}}else{ echo "-";}?></span>
                                                        </td>
                                                        <td>
                                                            <span class="text-muted font-13">Status</span> <br/>
                                                            <span class="badge <?= $bd_status;?>"><?= $status_quiz;?></span>
                                                        </td>
                                                        <td>
                                                            <span class="text-muted font-13">Waktu</span>
                                                            <h5 class="font-14 mt-1 fw-normal"><?= $quizdata['quiz_time'];?>m</h5>
                                                        </td>
                                                        <td class="table-action" style="width: 90px;">
                                                            <a href="<?= base_url();?>peserta/beranda/start_objektif_quiz/<?= $quiz['quiz_log_id'];?>" <?php if($current_status=="Ditutup"){ echo 'onclick="return false;"';}?>><button type="button" class="btn btn-<?php if($current_status=="Ditutup"){ echo "light";}else{ echo "info";}?>" <?php if($current_status=="Ditutup"){ echo "disabled";}?>> Mulai</button></a>
                                                        </td>
                                                    </tr>
                                                     <?php
                                                            }
                                                        }
                                                    ?>
                                                    <!--
                                                         <center>Anda belum memiliki quiz :(</center>
                                                    <tr>
                                                        <td>
                                                            <h5 class="font-14 my-1"><a href="javascript:void(0);" class="text-body">Quiz Objektif SMA</a></h5>
                                                            <span class="text-muted font-13">50 Soal</span>
                                                        </td>
                                                        <td>
                                                            <span class="text-muted font-13">Status</span> <br/>
                                                            <span class="badge badge-warning-lighten">In-progress</span>
                                                        </td>
                                                        <td>
                                                            <span class="text-muted font-13">Waktu</span>
                                                            <h5 class="font-14 mt-1 fw-normal">90m</h5>
                                                        </td>
                                                        <td class="table-action" style="width: 90px;">
                                                            <a href="<?= base_url();?>peserta/quiz?type=objective&id=1"><button type="button" class="btn btn-info"> Mulai</button></a>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <h5 class="font-14 my-1"><a href="javascript:void(0);" class="text-body">Quiz Objektif SMK</a></h5>
                                                            <span class="text-muted font-13">10 Soal</span>
                                                        </td>
                                                        <td>
                                                            <span class="text-muted font-13">Status</span> <br/>
                                                            <span class="badge badge-success-lighten">Tersedia</span>
                                                        </td>
                                                        <td>
                                                            <span class="text-muted font-13">Waktu</span>
                                                            <h5 class="font-14 mt-1 fw-normal">90m</h5>
                                                        </td>
                                                        <td class="table-action" style="width: 90px;">
                                                            <a href="<?= base_url();?>peserta/quiz?type=objective&id=1"><button type="button" class="btn btn-info"> Mulai</button></a>
                                                        </td>
                                                    </tr>
                                                    
                                                    <tr>
                                                        <td>
                                                            <h5 class="font-14 my-1"><a href="javascript:void(0);" class="text-body">Quiz Esay SMK</a></h5>
                                                            <span class="text-muted font-13">5 Soal</span>
                                                        </td>
                                                        <td>
                                                            <span class="text-muted font-13">Status</span> <br/>
                                                            <span class="badge badge-primary-lighten">Selesai</span>
                                                        </td>
                                                        <td>
                                                            <span class="text-muted font-13">Waktu</span>
                                                            <h5 class="font-14 mt-1 fw-normal">60m</h5>
                                                        </td>
                                                        <td class="table-action" style="width: 90px;">
                                                            <a href="#<?= base_url();?>peserta/quiz?type=objective&id=1"><button type="button" class="btn btn-info" disabled> Mulai</button></a>
                                                        </td>
                                                    </tr>
                                                    -->
                                                </tbody>
                                            </table>
                                        </div> <!-- end table-responsive-->

                                    </div> <!-- end card body-->
                                </div> <!-- end card -->
                            </div><!-- end col-->
                        </div>
                        <!-- end row-->
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
