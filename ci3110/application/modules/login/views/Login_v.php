<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<title>PT. LEN (PERSERO) - Monitoring Dokumen</title>

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
  <meta name="viewport" content="width=device-width" />

	<link rel="icon" href="<?php echo base_url('images/favicon.ico')?>" type="image/x-icon">

	<!--     Fonts and icons     -->
	<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />

	<!-- CSS Files -->
	<link href="<?php echo base_url()?>plugins/MBW/assets/css/bootstrap.min.css" rel="stylesheet" />
	<link href="<?php echo base_url()?>plugins/MBW/assets/css/material-bootstrap-wizard.css" rel="stylesheet" />

	<!-- CSS Just for demo purpose, don't include it in your project -->
	<!-- <link href="assets/css/demo.css" rel="stylesheet" /> -->
</head>

<body>

	<div class="image-container set-full-height" style="background-image: url('<?php echo base_url()?>plugins/MBW/assets/img/wizard-book.jpg')">
	    <!--   Big container   -->
	    <div class="container">
	        <div class="row">
		        <div class="col-md-10 col-md-offset-1">
            <div class="col-md-6 col-md-offset-3">
		            <!--      Wizard container        -->
		            <div class="wizard-container">
		                <div class="card wizard-card" data-color="purple" id="wizard">
		                <!--        You can switch " data-color="blue" "  with one of the next bright colors: "green", "orange", "red", "purple"             -->
                      <div class="tab-content">
                          <!-- <div class="tab-pane" id="details"> -->
                          <div class="" id="">
                          	<div class="row">

                              <form id="loginform" method="POST" action="login/auth">
                                <div class="wizard-header">
                                  <h3 class="wizard-title">PT Len Industri (Persero)</h3>
                                    Monitoring Dokumen Verifikasi<br>
                                </div>

                                <?php if($this->session->flashdata('flashMessage')) {
                                  $flashMessage=$this->session->flashdata('flashMessage');?>
                                      <div class="alert alert-danger">
                                          <div class="text-center">
                                                <i class="material-icons" style="vertical-align: middle;">info_outline</i> Username or Password is Incorrect !!
                                          </div>
                                      </div>
                                  <?php
                                }else {
                                  echo '<div class="text-center"><small><a>Login To Start Your Session</a></small></div>';
                                } ?>
                                <div class="col-sm-11">
                                  <div class="input-group">
          													<span class="input-group-addon">
          														<i class="material-icons">face</i>
          													</span>
          													<div class="form-group label-floating">
                                      	<label class="control-label">Username</label>
                                        <input type="text" class="form-control" name="username" autocomplete="off" autofocus>
                                    </div>
          												</div>
                                </div>
                                <div class="col-sm-11">
                                  <div class="input-group">
          													<span class="input-group-addon">
          														<i class="material-icons">lock</i>
          													</span>
          													<div class="form-group label-floating">
                                      	<label class="control-label">Password</label>
                                      <input type="password" class="form-control" name="password" autocomplete="off">
                                    </div>
          												</div>
                                </div>
                              <div class="text-center">
                                <button type="submit" class="btn btn-primary btn-sm">LOGIN</button>
                              </div>
                            </form>

                              <hr style="
                              height: 10px;
                              	border: 0;
                              	box-shadow: 0 10px 10px -10px #8c8b8b inset;
                              ">

                              <div class="text-center">
                                <a>OR Search Your Document</a>
                              </div>
                              <div class="row">
                                <form id="loginform" method="GET" action="<?php echo base_url('login/search/result')?>">
                                <div class="col-md-7 col-md-offset-1">
                                  <div class="input-group">
                                    <span class="input-group-addon">
                                      <i class="material-icons">lock</i>
                                    </span>
                                    <div class="form-group label-floating">
                                      <label class="control-label">Search By No Verificarion</label>
                                      <input type="text" name='NoVerifikasi' class="form-control" autocomplete="off">
                                    </div>
                                  </div>
                                </div><br>
                                <div class="col-md-3">
                                  <div class="text-center">
                                    <button type="submit" class="btn btn-primary btn-sm">SEARCH</button>
                                  </div>
                                </div>
                              </form>
                              </div>

                          	</div>
                          </div>
                      </div>
		                </div>
		            </div> <!-- wizard container -->
		        </div>
            </div>
	    	</div> <!-- row -->
		</div> <!--  big container -->

    <div class="footer">
        <div class="container text-center">
             Made with <i class="fa fa-heart heart"></i> by Creative Tim
        </div>
    </div>
	</div>

</body>
		<!--   Core JS Files   -->
		<script src="<?php echo base_url()?>plugins/MBW/assets/js/jquery-2.2.4.min.js" type="text/javascript"></script>
		<script src="<?php echo base_url()?>plugins/MBW/assets/js/bootstrap.min.js" type="text/javascript"></script>
		<script src="<?php echo base_url()?>plugins/MBW/assets/js/jquery.bootstrap.js" type="text/javascript"></script>

		<!--  Plugin for the Wizard -->
		<script src="<?php echo base_url()?>plugins/MBW/assets/js/material-bootstrap-wizard.js"></script>

		<!--  More information about jquery.validate here: http://jqueryvalidation.org/	 -->
		<script src="<?php echo base_url()?>plugins/MBW/assets/js/jquery.validate.min.js"></script>
</html>
