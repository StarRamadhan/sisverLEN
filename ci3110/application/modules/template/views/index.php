<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Jquery DataTable | Bootstrap Based Admin Template - Material Design</title>
    <!-- Favicon-->
    <link rel="icon" href="<?php echo base_url()?>favicon.ico" type="image/x-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

    <!-- Bootstrap Core Css -->
    <link href="<?php echo base_url()?>plugins/bootstrap/css/bootstrap.css" rel="stylesheet">

    <!-- Font Awesome5 -->
    <link href="<?php echo base_url()?>plugins/font-awesome5/css/all.min.css"/>

    <!-- Waves Effect Css -->
    <link href="<?php echo base_url()?>plugins/node-waves/waves.css" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="<?php echo base_url()?>plugins/animate-css/animate.css" rel="stylesheet" />

    <!-- Bootstrap Select Css -->
    <link href="<?php echo base_url()?>plugins/bootstrap-select/css/bootstrap-select.css" rel="stylesheet" />

    <!-- DataTable Css -->
    <link href="<?php echo base_url()?>plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css" rel="stylesheet">

    <!-- Custom Css -->
    <link href="<?php echo base_url()?>css/style.css" rel="stylesheet">

    <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
    <link href="<?php echo base_url()?>css/themes/all-themes.css" rel="stylesheet" />
</head>

<body class="theme-red">
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
    </div>
    <!-- #END# Page Loader -->
    <!-- Overlay For Sidebars -->
    <div class="overlay"></div>
    <!-- #END# Overlay For Sidebars -->
    <!-- Search Bar -->
    <div class="search-bar">
        <div class="search-icon">
            <i class="material-icons">search</i>
        </div>
        <input type="text" placeholder="START TYPING...">
        <div class="close-search">
            <i class="material-icons">close</i>
        </div>
    </div>
    <!-- #END# Search Bar -->
    <!-- Top Bar -->
    <?php $this->load->view($navbar);?>
    <!-- #Top Bar -->

    <!-- Side Bar -->
    <?php $this->load->view($sidebar);?>
    <!-- #side Bar -->

    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>
                    JQUERY DATATABLES
                    <small>Taken from <a href="https://datatables.net/" target="_blank">datatables.net</a></small>
                </h2>
            </div>
            <!-- Basic Examples -->
            <?php $this->load->view($content);?>
            <!-- #END# Basic Examples -->
            <!-- Exportable Table -->

        </div>
    </section>

    <!-- Jquery Core Js -->
    <script src="<?php echo base_url()?>plugins/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core Js -->
    <script src="<?php echo base_url()?>plugins/bootstrap/js/bootstrap.js"></script>

    <!-- Font Awesome5 -->
    <script src="<?php echo base_url()?>plugins/font-awesome5/js/all.min.js"></script>

    <!-- Select Plugin Js -->
    <script src="<?php echo base_url()?>plugins/bootstrap-select/js/bootstrap-select.js"></script>

    <!-- Slimscroll Plugin Js -->
    <script src="<?php echo base_url()?>plugins/jquery-slimscroll/jquery.slimscroll.js"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="<?php echo base_url()?>plugins/node-waves/waves.js"></script>

    <!-- Autosize Plugin Js -->
    <script src="<?php echo base_url()?>plugins/autosize/autosize.js"></script>

    <!-- FORM EDIT -->
    <!-- Jquery Validation Plugin Css -->
    <script src="<?php echo base_url()?>plugins/jquery-validation/jquery.validate.js"></script>
    <!-- FORM Validation Plugin Css -->
    <script src="<?php echo base_url()?>js/pages/forms/form-validation.js"></script>


    <!-- TABEL -->
    <!-- Jquery DataTable Plugin Js -->
    <script src="<?php echo base_url()?>plugins/jquery-datatable/jquery.dataTables.js"></script>
    <script src="<?php echo base_url()?>plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js"></script>
    <script src="<?php echo base_url()?>plugins/jquery-datatable/extensions/export/dataTables.buttons.min.js"></script>
    <script src="<?php echo base_url()?>plugins/jquery-datatable/extensions/export/buttons.flash.min.js"></script>
    <script src="<?php echo base_url()?>plugins/jquery-datatable/extensions/export/jszip.min.js"></script>
    <script src="<?php echo base_url()?>plugins/jquery-datatable/extensions/export/pdfmake.min.js"></script>
    <script src="<?php echo base_url()?>plugins/jquery-datatable/extensions/export/vfs_fonts.js"></script>
    <script src="<?php echo base_url()?>plugins/jquery-datatable/extensions/export/buttons.html5.min.js"></script>
    <script src="<?php echo base_url()?>plugins/jquery-datatable/extensions/export/buttons.print.min.js"></script>

    <!-- Custom Js -->
    <script src="<?php echo base_url()?>js/admin.js"></script>
    <!-- <script src="<?php //echo base_url()?>js/pages/forms/basic-form-elements.js"></script> -->
    <script src="<?php echo base_url()?>js/pages/tables/jquery-datatable.js"></script>

    <!-- Demo Js -->
    <script src="<?php echo base_url()?>js/demo.js"></script>



</body>

</html>
