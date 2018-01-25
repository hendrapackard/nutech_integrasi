<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
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

    <!-- Bootstrap Material Datetime Picker Css -->
    <link href="<?= base_url();?>adminbsb/plugins/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css" rel="stylesheet" />

    <!-- JQuery DataTable Css -->
    <link href="<?= base_url();?>adminbsb/plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css" rel="stylesheet">

    <!-- Custom Css -->
    <link href="<?= base_url();?>adminbsb/css/style.css" rel="stylesheet">
    <link href="<?= base_url();?>adminbsb/css/app.css" rel="stylesheet">


    <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
    <link href="<?= base_url();?>adminbsb/css/themes/all-themes.css" rel="stylesheet" />
</head>

<body class="theme-deep-purple">
<!-- Page Loader -->
<div class="page-loader-wrapper">
    <div class="loader">
        <div class="preloader">
            <div class="spinner-layer pl-red">
                <div class="circle-clipper left">
                    <div class="circle"></div>
                </div>
                <div class="circle-clipper right">
                    <div class="circle"></div>
                </div>
            </div>
        </div>
        <p>Please wait...</p>
    </div>
</div>-
<!-- #END# Page Loader -->

<!-- Overlay For Sidebars -->
<div class="overlay"></div>
<!-- #END# Overlay For Sidebars -->

<!-- Top Bar -->
<nav class="navbar">
    <div class="container-fluid">
        <div class="navbar-header">
            <a href="javascript:void(0);" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false"></a>
            <a href="javascript:void(0);" class="bars"></a>
            <a class="navbar-brand" href="<?= base_url() ?>">Aplikasi Inventory</a>
        </div>
        <div class="collapse navbar-collapse" id="navbar-collapse">
            <ul class="nav navbar-nav navbar-right">
                <!-- Call Search -->
                <li><a href="javascript:void(0);" class="js-search" data-close="true"><?php $waktu = date('Y-m-d'); echo formatHariTanggal($waktu) ?><div align="right" id="clock"></div></a></li>
            </ul>
        </div>
    </div>
</nav>
<!-- #Top Bar -->

<!-- Left Sidebar -->
<section>
    <?php $this->load->view('sidebar') ?>
</section>
<!-- #END# Left Sidebar -->

<!-- Isi Halaman -->
<section class="content">
    <?php $this->load->view($main_view) ?>
</section>
<!-- #END# Isi Halaman -->


<!-- Jquery Core Js -->
<script src="<?= base_url();?>adminbsb/plugins/jquery/jquery.min.js"></script>

<!-- Bootstrap Core Js -->
<script src="<?= base_url();?>adminbsb/plugins/bootstrap/js/bootstrap.js"></script>

<!-- Slimscroll Plugin Js -->
<script src="<?= base_url();?>adminbsb/plugins/jquery-slimscroll/jquery.slimscroll.js"></script>

<!-- Waves Effect Plugin Js -->
<script src="<?= base_url();?>adminbsb/plugins/node-waves/waves.js"></script>

<!-- Autosize Plugin Js -->
<script src="<?= base_url();?>adminbsb/plugins/autosize/autosize.js"></script>

<!-- Moment Plugin Js -->
<script src="<?= base_url();?>adminbsb/plugins/momentjs/moment.js"></script>

<!-- Bootstrap Material Datetime Picker Plugin Js -->
<script src="<?= base_url();?>adminbsb/plugins/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js"></script>

<!-- Jquery DataTable Plugin Js -->
<script src="<?= base_url();?>adminbsb/plugins/jquery-datatable/jquery.dataTables.js"></script>
<script src="<?= base_url();?>adminbsb/plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js"></script>

<!-- Custom Js -->
<script src="<?= base_url();?>adminbsb/js/admin.js"></script>

<!-- Demo Js -->
<script src="<?= base_url();?>adminbsb/js/demo.js"></script>

<script src="<?= base_url();?>adminbsb/js/app.js"></script>


</body>

</html>