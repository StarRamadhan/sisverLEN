<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>PT. Len Industri (PERSERO) - Monitoring Dokumen Verifikasi</title>
    <!-- Favicon-->
    <link rel="icon" href="<?php echo base_url('images/favicon.ico')?>" type="image/x-icon">

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

    <!-- Date Picker -->
    <link href="<?php echo base_url()?>plugins/bootstrap-datepicker/css/bootstrap-datepicker.css" rel="stylesheet" />

    <!-- Bootstrap Select Css -->
    <link href="<?php echo base_url()?>plugins/bootstrap-select/css/bootstrap-select.css" rel="stylesheet" />

    <!-- DataTable Css -->
    <link href="<?php echo base_url()?>plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css" rel="stylesheet">

    <!-- Custom Css -->
    <link href="<?php echo base_url()?>css/style.css" rel="stylesheet">


    <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
    <link href="<?php echo base_url()?>css/themes/all-themes.css" rel="stylesheet" />
</head>

<body class="theme-light-green">
    <!-- Page Loader -->
    <div class="page-loader-wrapper">
        <div class="loader">
            <div class="preloader pl-size-xl">
                <div class="spinner-layer pl-green">
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
    <!-- <div class="search-bar">
        <div class="search-icon">
            <i class="material-icons">search</i>
        </div>
        <input type="text" placeholder="START TYPING...">
        <div class="close-search">
            <i class="material-icons">close</i>
        </div>
    </div> -->
    <!-- #END# Search Bar -->
    <!-- Top Bar -->
    <?php $this->load->view($navbar);?>
    <!-- #Top Bar -->

    <!-- Side Bar -->
    <?php $this->load->view($sidebar);?>
    <!-- #side Bar -->

    <section class="content">
        <div class="container-fluid">
            <!-- Basic Examples -->
            <?php $this->load->view($content);?>
            <!-- #END# Basic Examples -->
            <!-- Exportable Table -->

        </div>
    </section>

    <!-- Jquery Core Js -->
    <script src="<?php echo base_url()?>plugins/jquery/jquery.min.js"></script>
    <script src="<?php echo base_url()?>plugins/jquery/jquery.js"></script>
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

    <!-- Chart Js -->
    <script src="<?php echo base_url()?>plugins/chartjs/Chart.bundle.js"></script>

    <!-- Custom Js -->
    <script src="<?php echo base_url()?>js/admin.js"></script>

    <!-- Bootstrap Datepicker Plugin Js -->
    <script src="<?php echo base_url()?>plugins/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>

    <script src="<?php echo base_url()?>js/pages/tables/jquery-datatable.js"></script>
    <script src="<?php echo base_url()?>js/pages/ui/modals.js"></script>
    <!-- Demo Js -->
    <script src="<?php echo base_url()?>js/demo.js"></script>
    <script>

    // $('#category').on('change', function() {
    //     if ((this.value)!="") {
    //       $("#categoryValue").removeAttr("required");
    //     }else if((this.value)==""){
    //       $("#categoryValue").attr("required");
    //     }
    //
    // });

    $('li > a').click(function() {
      $('li').removeClass('active');
      $(this).parent().addClass('active');
    });

    $('#dateStart').datepicker({
        format: 'yyyy-mm-dd',
        closeText: "Ok",
        autoclose: true,
        todayHighlight: true,
        clearBtn: true,
    });
    $('#dateEnd').datepicker({
        format: 'yyyy-mm-dd',
        closeText: "Ok",
        autoclose: true,
        todayHighlight: true,
        clearBtn: true,
    });

    //REFERENSI :
  // var tgl1 = new Date();
  // tgl1.setMonth(tgl1.getMonth()-1);
  // tgl1.setDate(1);
  // var tgl2 = new Date();
  // tgl2.setMonth(tgl2.getMonth()-1);
  // tgl2.setDate(15);

    var tgl1 = new Date();
    tgl1.setMonth(tgl1.getMonth());
    tgl1.setDate(-8);
    var tgl2 = new Date();
    tgl2.setMonth(tgl2.getMonth());
//    tgl2.setDate(15);
  $('#customDate').datepicker({
      startDate: tgl1,
      endDate:tgl2,
      format: 'yyyy-mm-dd',
      autoclose: true,
      clearBtn: true,
      daysOfWeekDisabled: [0,6]
  });

  $("#buttonFilter").click(function(){
    $("#formFilter").fadeToggle();
  });

  $(function () {
      new Chart(document.getElementById("chartDokMasuk").getContext("2d"), getChartJs('bar'));
      new Chart(document.getElementById("chartDokReject").getContext("2d"), getChartJs('bar'));
  });

  function getChartJs(type) {
      var config = null;
      if (type === 'bar') {
          config = {
              type: 'bar',
              data: {
                labels:[
                <?php
                  date_default_timezone_set("Asia/Jakarta");
                  $now = date('m');
                  for ($i = 0; $i < $now; ++$i) {
                    $m = date("M", strtotime("January +$i months"));
                    echo '"'.$m.'",';
                  }
                  ?>],
                  datasets: [
                    {
                      label: "Dokumen Tepat Waktu",
                      data: [2300, 2500, 2415, 2391, 2532, 0, 1990],
                      borderColor: 'rgba(0, 188, 212, 0.75)',
                      backgroundColor: 'rgba(0, 188, 212, 0.3)',
                      pointBorderColor: 'rgba(0, 188, 212, 0)',
                      pointBackgroundColor: 'rgba(0, 188, 212, 0.9)',
                      pointBorderWidth: 1
                    },
                    {
                        label: "Dokumen Telat",
                        data: [60, 45, 34, 72, 67, 49, 20],
                        borderColor: 'rgba(233, 30, 99, 0.75)',
                        backgroundColor: 'rgba(233, 30, 99, 0.3)',
                        pointBorderColor: 'rgba(233, 30, 99, 0)',
                        pointBackgroundColor: 'rgba(233, 30, 99, 0.9)',
                        pointBorderWidth: 1
                    }]
              },
              options: {
                  responsive: true,
                  legend: false
              }
          }
      }
      else if (type === 'bar') {
          config = {
              type: 'bar',
              data: {
                  labels: ["January", "February", "March", "April", "May", "June", "July"],
                  datasets: [{
                      label: "My First dataset",
                      data: [65, 59, 80, 81, 56, 55, 40],
                      backgroundColor: 'rgba(0, 188, 212, 0.8)'
                  }]
              },
              options: {
                  responsive: true,
                  legend: false
              }
          }
      }
      return config;
  }


    </script>
</body>

</html>
