<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Aplikasi Inventory</title>
    <!-- Favicon-->
    <link rel="icon" href="<?= base_url();?>/adminbsb/favicon.ico" type="image/x-icon">

   <!-- Google Fonts -->
    <link href="<?= base_url();?>adminbsb/googlefont/css.css" rel="stylesheet" type="text/css">
    <link href="<?= base_url();?>adminbsb/googlefont/icon.css" rel="stylesheet" type="text/css">

    <!-- Bootstrap Core Css -->
    <link href="<?= base_url();?>adminbsb/plugins/bootstrap/css/bootstrap.css" rel="stylesheet">

    <!-- Waves Effect Css -->
    <link href="<?= base_url();?>adminbsb/plugins/node-waves/waves.css" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="<?= base_url();?>adminbsb/plugins/animate-css/animate.css" rel="stylesheet" />

    <!-- Custom Css -->
    <link href="<?= base_url();?>adminbsb/css/style.css" rel="stylesheet">
    <link href="<?= base_url();?>adminbsb/css/app.css" rel="stylesheet">
</head>

<body class="login-page">
<div class="login-box">
    <div class="logo">
        <a href="<?= base_url() ?>">Aplikasi Inventory</a>
        <img src="<?= base_url();?>adminbsb/images/logo.png" class="img-circle center-block" height="110px">
    </div>
    <?php $this->load->view('_partial/flash_message') ?>
    <div class="card">
        <div class="body">
            <?= form_open('login'); ?>
            <div class="msg">Login</div>
            <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">person</i>
                        </span>
                <div class="form-line">
                    <?= form_input('username', $input->username, ['class' => 'form-control','placeholder' => 'Username : hendrapackard', 'required autofocus']) ?>
                </div>
                <?= form_error('username') ?>

            </div>
            <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">lock</i>
                        </span>
                <div class="form-line">
                    <?= form_password('password', $input->password, ['class' => 'form-control','placeholder' => 'Password : admin', 'required autofocus'])?>
                </div>
                <?= form_error('password'); ?>
            </div>
            <div class="row">
                <div class="col-xs-8 p-t-5">
                    <input type="checkbox" name="rememberme" id="rememberme" class="filled-in chk-col-pink">
                    <label for="rememberme">Remember Me</label>
                </div>
                <div class="col-xs-4">
                    <?= form_submit('submit','Login',['class '=> 'btn btn-block bg-pink waves-effect']) ?>
                </div>
            </div>
            <?= form_close() ?>
            <div class="row m-t-15 m-b--20">
                <div class="col-xs-6">
                    <a href=javascript:void(0);>Register Now!</a>
                </div>
            </div>
            </form>
        </div>
    </div>
</div>

<!-- Jquery Core Js -->
<script src="<?= base_url();?>adminbsb/plugins/jquery/jquery.min.js"></script>

<!-- Bootstrap Core Js -->
<script src="<?= base_url();?>adminbsb/plugins/bootstrap/js/bootstrap.js"></script>

<!-- Waves Effect Plugin Js -->
<script src="<?= base_url();?>adminbsb/plugins/node-waves/waves.js"></script>

<!-- Custom Js -->
<script src="<?= base_url();?>adminbsb/js/admin.js"></script>
<script src="<?= base_url();?>adminbsb/js/app.js"></script>

</body>

</html>