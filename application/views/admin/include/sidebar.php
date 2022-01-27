  <!-- ========== Left Sidebar Start ========== -->
  <div class="leftside-menu">
    
    <!-- LOGO -->
    <a href="index.html" class="logo text-center logo-light">
        <span class="logo-lg">
            <img src="<?= base_url();?>assets/images/logo-new.png" alt="" height="52">
        </span>
        <span class="logo-sm">
            <img src="<?= base_url();?>assets/images/logo-new.png" alt="" height="52">
        </span>
    </a>

    <!-- LOGO -->
    <a href="index.html" class="logo text-center logo-dark">
        <span class="logo-lg">
            <img src="<?= base_url();?>assets/images/logo-new.png" alt="" height="52">
        </span>
        <span class="logo-sm">
            <img src="<?= base_url();?>assets/images/logo-new.png" alt="" height="52">
        </span>
    </a>

    <div class="h-100" id="leftside-menu-container" data-simplebar>

        <!--- Sidemenu -->
        <ul class="side-nav">

            <li class="side-nav-title side-nav-item text-center">Navigation</li>
            <li class="side-nav-item">
                <a href="<?= base_url();?>admin/beranda" class="side-nav-link">
                <i class="uil-home-alt"></i>
                <span> Beranda </span>
                </a>
            </li>
             <li class="side-nav-item">
                            <a data-bs-toggle="collapse" href="#quiz" aria-expanded="false" aria-controls="quiz" class="side-nav-link">
                            <i class="uil-package"></i>
                            <span> Quiz </span>
                            <span class="menu-arrow"></span>
                        </a>
                        <div class="collapse" id="quiz">
                        <ul class="side-nav-second-level">
                        <li>
                            <a href="<?= base_url();?>admin/quiz/add">Tambah Quiz</a>
                        </li>
                        <li>
                            <a href="<?= base_url();?>admin/quiz">Daftar Quiz</a>
                       </li>
                    </ul>
                </div>
          </li>
           <li class="side-nav-item">
                            <a data-bs-toggle="collapse" href="#peserta" aria-expanded="false" aria-controls="peserta" class="side-nav-link">
                            <i class="uil-book-reader"></i>
                            <span> Peserta </span>
                            <span class="menu-arrow"></span>
                        </a>
                        <div class="collapse" id="peserta">
                        <ul class="side-nav-second-level">
                        <li>
                            <a href="<?= base_url();?>admin/peserta/add">Tambah Peserta</a>
                        </li>
                        <li>
                            <a href="<?= base_url();?>admin/peserta">Daftar Peserta</a>
                       </li>
                    </ul>
                </div>
          </li>
          <li class="side-nav-item">
                <a href="<?= base_url();?>admin/upload" class="side-nav-link">
                    <i class="mdi mdi-cloud"></i>
                        <span> CloudFile </span>
               </a>
            </li>
          <?php if($userdata['admin_role']=="superadmin"){?>
            <li class="side-nav-item">
                <a href="#<?= base_url();?>admin/nilai" class="side-nav-link">
                    <i class="mdi mdi-trophy"></i>
                        <span> Nilai </span>
               </a>
            </li>
            <li class="side-nav-item">
                <a href="<?= base_url();?>admin/administrator" class="side-nav-link">
                    <i class="uil-user-square"></i>
                        <span> Admin </span>
               </a>
            </li>
             <li class="side-nav-item">
                <a href="#<?= base_url();?>admin/pengaturan" class="side-nav-link">
                    <i class="uil-cog"></i>
                        <span> Pengaturan </span>
               </a>
            </li>
        <?php } ?>
        </ul>
        <!-- End Sidebar -->

        <div class="clearfix"></div>

    </div>
    <!-- Sidebar -left -->

</div>
<!-- Left Sidebar End -->