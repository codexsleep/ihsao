<?php
 $data_quiz = $this->quiz_model->data_quiz($log_quiz['quiz_id'])->row_array(); //mengambil data log quiz
 $waktu_quiz = $data_quiz['quiz_time']*60;
 $end_time =  date('Y-m-d H:i',strtotime($log_quiz['start_time'])+$waktu_quiz);
 $awal   = strtotime(date('Y-m-d H:i'));
 $akhir  = strtotime($end_time);
 $diff  = $akhir - $awal;
 $menit  = $diff/60;
 
 //algoritma checked
if($log_soal['jawaban']=="A"){
    $checkA = "checked";
}elseif($log_soal['jawaban']=="B"){
   $checkB = "checked";
}elseif($log_soal['jawaban']=="C"){
   $checkC = "checked";
}elseif($log_soal['jawaban']=="D"){
    $checkD = "checked";
}elseif($log_soal['jawaban']=="E"){
    $checkE = "checked";
}
?>
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
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Quiz</a></li>
                                            <li class="breadcrumb-item active">Objektif</li>
                                        </ol>
                                    </div>
                                    <h4 class="page-title">Ihsao Quiz Objektif</h4>
                                </div>
                            </div>
                        </div>
                        <!-- end page title --> 
                         <form action="" method="POST">
                        <div class="row">
                        <div class="col-xl-8">  
                                <div class="card">
                                    <div class="card-body">
                                            <div class="font-16" style="margin-bottom: 30px;"><?= htmlspecialchars_decode($datasoal['quiz_question']);?></div>
                                        <div class="mb-3">
                                                        <div class="form-check">
                                                            <input type="radio" name="option" value="A" class="form-check-input" <?php if(isset($checkA)){ echo $checkA;}?>>
                                                            <label class="form-check-label"> <?= htmlspecialchars_decode($datasoal['quiz_option_a']);?> </label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input type="radio" name="option" value="B" class="form-check-input" <?php if(isset($checkB)){ echo $checkB;}?>>
                                                            <label class="form-check-label"> <?= htmlspecialchars_decode($datasoal['quiz_option_b']);?></label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input type="radio" name="option" value="C" class="form-check-input" <?php if(isset($checkC)){ echo $checkC;}?>>
                                                            <label class="form-check-label"> <?= htmlspecialchars_decode($datasoal['quiz_option_c']);?></label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input type="radio" name="option" value="D" class="form-check-input" <?php if(isset($checkD)){ echo $checkD;}?>>
                                                            <label class="form-check-label"> <?= htmlspecialchars_decode($datasoal['quiz_option_d']);?></label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input type="radio" name="option" value="E" class="form-check-input" <?php if(isset($checkE)){ echo $checkE;}?>>
                                                            <label class="form-check-label"> <?= htmlspecialchars_decode($datasoal['quiz_option_e']);?></label>
                                                        </div>
                                                    </div>
                                    </div> <!-- end card-body -->
                                </div> <!-- end card-->
                            </div> <!-- end col -->
                            <div class="col-xl-4">
                                <div class="card">
                                    <div class="card-body">
                                    <h4 class="header-title text-center">Counter Time</h4>
                                    <h1 class="display-5 text-center" id="msg">00:00:00</h1>

                                    </div>
                                </div>  
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="header-title text-center">Quizz Navigation</h4><br>
                                        <div class="button-list" style="margin-bottom:10px;">
                                        <?php 
                                            $no = 1;
                                            foreach ($soal_nav as $nav) {
                                                //algoritma cek sudah jawab
                                                if($nav['soal_id']==$datasoal['soal_id']){
                                                    $btn_bg = "btn-primary";
                                                }elseif($nav['jawaban']==null){
                                                    $btn_bg = "btn-light";
                                                }else{
                                                    $btn_bg = "btn-success";
                                                }
                                        ?>
                                        <input class="btn <?= $btn_bg;?> btn-sm" type="submit" name="number_nav" value="<?= $no++;?>">
                                        <?php
                                            }
                                        ?>
                                       <!--
                                            <button type="button" class="btn btn-success btn-sm">1 </button>
                                            <button type="button" class="btn btn-success btn-sm">2 </button>
                                            <button type="button" class="btn btn-light btn-sm">3 </button>
                                            <button type="button" class="btn btn-primary btn-sm">4 </button>
                                            <button type="button" class="btn btn-success btn-sm">5 </button>
                                            <button type="button" class="btn btn-light btn-sm">6 </button>
                                            <button type="button" class="btn btn-light btn-sm">7 </button>
                                            <button type="button" class="btn btn-light btn-sm">8 </button>
                                            <button type="button" class="btn btn-light btn-sm">9 </button>
                                            <button type="button" class="btn btn-light btn-sm">10 </button>
                                            <button type="button" class="btn btn-light btn-sm">11 </button>
                                            <button type="button" class="btn btn-light btn-sm">12 </button>
                                        </div>
                                        -->
                                        <div class="button-list" style="margin-top:20px;">
                                            <input type="submit" name="nav" class="btn btn-<?php if(isset($nav_prevbg)){ echo $nav_prevbg;}else{ echo "primary";}?> btn-sm" value="Prev" <?php if(isset($disabled_prevnav)){ echo $disabled_prevnav;}?>>
                                            <input type="submit" name="nav" class="btn btn-<?php if(isset($nav_nextbg)){ echo $nav_nextbg;}else{ echo "primary";}?> btn-sm" value="Next" <?php if(isset($disabled_nextnav)){ echo $disabled_nextnav;}?>>
                                            <input type="submit" name="nav" class="btn btn-<?php if(isset($nav_finishbg)){ echo $nav_finishbg;}else{ echo "light";}?> btn-sm" value="Finish" <?php if(!isset($nav_finishbg)){ echo "disabled";}?>>
                                        </div>
                                    </div> <!-- end card-body -->
                                </div> <!-- end card-->
                            </div> <!-- end col -->
                        </div> <!-- end row -->
                    </form>

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
<script>
var akhir = new Date("<?= $end_time;?>").getTime();

var x = setInterval(function() {
  var awal = new Date().getTime();
    
  var distance = akhir - awal;
    
  var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
  var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
  var seconds = Math.floor((distance % (1000 * 60)) / 1000);

  if(minutes<10 && minutes>=0){
    var showminutes = "0"+minutes;
  }else{
    var showminutes = minutes;
  }

  if(hours<10 && hours>=0){
    var showhours = "0"+hours;
  }else{
    var showhours = hours;
  }

 if(seconds<10 && seconds>=0){
    var showseconds = "0"+seconds;
  }else{
    var showseconds = seconds;
  }

  document.getElementById("msg").innerHTML = showhours + ":"+ showminutes +":"+ showseconds;
    
  if (distance < 0) {
    clearInterval(x);
    document.getElementById("msg").innerHTML = "00:00:00";
    var url = "<?= base_url();?>peserta/beranda";
    window.location.href = url;
  }
}, 1000);
</script>
    </body>
</html>
