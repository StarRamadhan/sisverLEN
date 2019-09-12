<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>PT. LEN (PERSERO) - Monitoring Dokumen</title>
    <!-- Favicon-->
    <link rel="icon" href="<?php echo base_url('images/favicon.ico')?>" type="image/x-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

    <!-- Bootstrap Core Css -->
    <link href="<?php echo base_url()?>plugins/bootstrap/css/bootstrap.css" rel="stylesheet">

    <!-- Waves Effect Css -->
    <link href="<?php echo base_url()?>plugins/node-waves/waves.css" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="<?php echo base_url()?>plugins/animate-css/animate.css" rel="stylesheet" />

    <!-- Custom Css -->
    <link href="<?php echo base_url()?>css/style.css" rel="stylesheet">
    <link href="<?php echo base_url()?>application/modules/login/views/assets/css/material-bootstrap-wizard.css" rel="stylesheet" />

</head>

<body class="login-page">
    <div class="login-box">
        <div class="logo">
            <a href="javascript:void(0);">RESULT :</a>
        </div>
        <div class="card">

            <div class="body">
              <?php

          		if(count($find)>0)
          		{
          			foreach ($find as $data) {
          		?>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">calendar_today</i>
                        </span>
                        <div class="form-line">
                          <label>Tanggal Masuk : <?php echo date('Y-m-d', strtotime($data->Tanggal_Masuk));?></label>
                        </div>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">vpn_key</i>
                        </span>
                        <div class="form-line">
                          <label>No Verifikasi : <?php echo $data->No_Verifikasi?></label>
                        </div>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">description</i>
                        </span>
                        <div class="form-line">
                          <label>Keterangan : <?php echo $data->Keterangan?></label>
                        </div>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">face</i>
                        </span>
                        <div class="form-line">
                          <label>User : <?php echo $data->User?></label>
                        </div>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">monetization_on</i>
                        </span>
                        <div class="form-line">
                          <label>Jumlah : <?php echo $data->Jumlah." (".$data->Mata_Uang.")"?></label>
                        </div>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">navigation</i>
                        </span>
                        <div class="form-line">
                          <label>Lokasi : <?php echo $data->Lok_Dokumen?></label>
                        </div>
                    </div>
                  <?php
                          }
                    		}else{?>
                          <div class="input-group">
                              <span class="input-group-addon">
                                  <label style="text-align:center;"><h3>Your Document Not Found !!!</h3></label>
                              </span>

                          </div>
                  <?php
                    		}?>
                    <div class="row">
                        <div class="col-md-4 col-md-offset-4">
                            <a type="button" href="<?php echo base_url('login')?>" class="btn btn-block bg-pink waves-effect" type="submit">BACK</a>
                        </div>
                    </div>
            </div>
        </div>
    </div>

    <!-- Jquery Core Js -->
    <script src="<?php echo base_url()?>plugins/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core Js -->
    <script src="<?php echo base_url()?>plugins/bootstrap/js/bootstrap.js"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="<?php echo base_url()?>plugins/node-waves/waves.js"></script>

    <!-- Validation Plugin Js -->
    <script src="<?php echo base_url()?>plugins/jquery-validation/jquery.validate.js"></script>

    <!-- Custom Js -->
    <script src="<?php echo base_url()?>js/admin.js"></script>
    <script src="<?php echo base_url()?>js/pages/examples/sign-in.js"></script>


    <!-- <script src="assets/js/jquery.bootstrap.js" type="text/javascript"></script> -->

    <!--  Plugin for the Wizard -->
    <script src="<?php echo base_url()?>application/modules/login/views/assets/js/material-bootstrap-wizard.js"></script>

</body>

</html>
