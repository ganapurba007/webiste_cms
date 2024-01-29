<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Halaman Log In</title>
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=So
urce+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?php echo base_url() . 'assets/plugins/font
awesome-free/css/all.min.css' ?>">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/ich
eck-bootstrap/icheck-bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo base_url() . 'assets/dist/css/adm
inlte.min.css'; ?>">
</head>

<body class="hold-transition login-page">
    <div class="login-box">
        <div class="login-logo">
            <a href="<?php echo base_url(); ?>"><b>Website</b>Saya</a>
        </div>
        <!-- /.login-logo -->
        <?php
        if (isset($GET['alert'])) {
            if ($_GET['alert'] == 'gagal') {
                echo "
        <div class='alert alert-danger font-weight-bold text-center'>
        Maaf! Username & Password Salah.
        </div>
        ";
            } elseif ($_GET['alert'] == "belum_login") {
                echo "
        <div class='alert alert-danger font-weight-bold text-center'>
        Anda Harus Login Terlebih Dulu!
        </div>
        ";
            } elseif ($_GET['alert'] == "logout") {
                echo "
        <div class='alert alert-success font-weight-bold text-center'>
        Anda Telah Logout!
        </div>
        ";
            }
        }
        ?>
        <div class="card">
            <div class="card-body login-card-body">
                <p class="login-box-msg">Sign in to start mywebsite</p>
                <form action="<?php echo base_url() . 'login/aksi' ?>" method="post">
                    <div class="input-group mb-3">
                        <input type="text" class="formcontrol" placeholder="Username" name="username" required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-users"></span>
                            </div>
                        </div>
                    </div>
                    <?php echo form_error('username'); ?>
                    <div class="input-group mb-3">
                        <input type="password" class="formcontrol" placeholder="Password" name="password" required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <?php echo form_error('password'); ?>
                    <div class="row">
                        <div class="col-8">
                            <div class="icheck-primary">
                                <input type="checkbox" id="remember">
                                <label for="remember">
                                    Remember Me
                                </label>
                            </div>
                        </div>
                        <!-- /.col -->
                        <div class="col-4">
                            <button type="submit" class="btn btn-primary btnblock">Sign In</button>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>
            </div>
            <!-- /.login-card-body -->
        </div>
    </div>
    <!-- /.login-box -->
    <!-- jQuery -->
    <script src="<?php echo base_url(); ?>assets/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="<?php echo base_url(); ?>assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="<?php echo base_url(); ?>assets/dist/js/adminlte.min.js">
    </script>
</body>

</html>