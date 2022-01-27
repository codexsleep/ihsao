<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>Login Administrator | Ihsao</title>
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
    <body class="loading authentication-bg" data-layout-config='{"leftSideBarTheme":"dark","layoutBoxed":false, "leftSidebarCondensed":false, "leftSidebarScrollable":false,"darkMode":false, "showRightSidebarOnStart": true}'>
        <div class="account-pages pt-2 pt-sm-5 pb-4 pb-sm-5">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xxl-4 col-lg-5">
                        <div class="card">

                            <!-- Logo -->
                            <div class="card-header pt-4 pb-4 text-center bg-primary">
                                <a href="index.html">
                                    <span><img src="<?= base_url();?>assets/images/logo.png" alt="" height="18"></span>
                                </a>
                            </div>

                            <div class="card-body p-4">
                                <?php if(isset($_COOKIE['error_login'])){
                                        if($_COOKIE['error_login']=='true' or $_COOKIE['error_login']=='null'){
                                    ?>
                                <div class="alert alert-danger alert-dismissible bg-danger text-white border-0 fade show" role="alert">
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                        <?php if($_COOKIE['error_login']=='true'){ 
                                            echo "<strong>Login Gagal - </strong> Perika Kembali Username atau Password Anda";
                                        }elseif($_COOKIE['error_login']=='null'){ 
                                            echo "<strong>Error - </strong> Username dan Password Tidak Boleh Kosong";
                                        }?>
                                </div>
                                <?php }elseif($_COOKIE['error_login']=='false'){?>
                                    <div class="alert alert-success alert-dismissible bg-success text-white border-0 fade show" role="alert">
                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                            <strong>Success - </strong> Login Berhasil
                                    </div>
                                <?php }} ?>
                                <form action="<?= base_url();?>admin/auth" method="POST">
                                    <div class="mb-3">
                                        <label for="username" class="form-label">Username</label>
                                        <input class="form-control" type="text" id="username" required="" name="username"placeholder="Enter your username">
                                    </div>
                                    <div class="mb-3">
                                        <label for="password" class="form-label">Password</label>
                                        <div class="input-group input-group-merge">
                                            <input type="password" id="password" class="form-control" name="password" placeholder="Enter your password">
                                            <div class="input-group-text" data-password="false">
                                                <span class="password-eye"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-3 mb-0 text-center">
                                        <button class="btn btn-primary" type="submit" name="login"> Log In </button>
                                    </div>
                                </form>
                            </div> <!-- end card-body -->
                        </div>
                        <!-- end card -->

                    </div> <!-- end col -->
                </div>
                <!-- end row -->
            </div>
            <!-- end container -->
        </div>
        <!-- end page -->

        <footer class="footer footer-alt">
           <script>document.write(new Date().getFullYear())</script> © IhsaoQuiz - Development by <a href="https://instagram.com/firmanraiwan21">M Firman Riawan</a>
        </footer>

        <!-- bundle -->
        <script src="<?= base_url();?>assets/js/vendor.min.js"></script>
        <script src="<?= base_url();?>assets/js/app.min.js"></script>
        
    </body>
</html>
