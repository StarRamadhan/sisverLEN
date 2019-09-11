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
						<?php
							if(count($find)>0) {
								foreach ($find as $data) {
						?>
		        <div class="col-sm-6 col-sm-offset-3">
		            <!--      Wizard container        -->
		            <div class="wizard-container">
		                <div class="card wizard-card" data-color="green" id="wizard">
		                <!--        You can switch " data-color="blue" "  with one of the next bright colors: "green", "orange", "red", "purple"             -->

											<div class="wizard-header">
                        	<h3 class="wizard-title">Document Position</h3>
                    	</div>
											<div class="wizard-navigation" style="pointer-events:none;">
												<ul>
													<?php
														$position = $data->Lok_Dokumen;
														if ($position=="Reject") {
															echo '<li class="active"><a href="#" data-toggle="tab">Verification</a>
																		<i class="material-icons">check_box_outline_blank</i></li>';
															echo '<li><a href="#" data-toggle="tab">Journalist</a>
																		<i class="material-icons">indeterminate_check_box</i></li>';
															echo '<li><a href="#" data-toggle="tab">Manager</a>
																		<i class="material-icons">indeterminate_check_box</i></li>';
															echo '<li><a href="#" data-toggle="tab">Finish</a>
																		<i class="material-icons">indeterminate_check_box</i></li>';
														}if($position=="Jurnalis 1") {
															echo '<li><a href="#" data-toggle="tab">Verification</a>
																		<i class="material-icons">check_box</i></li>';
															echo '<li class="active"><a href="#" data-toggle="tab">Journalist 1</a>
																		<i class="material-icons">check_box_outline_blank</i></li>';
															echo '<li><a href="#" data-toggle="tab">Manager</a>
																		<i class="material-icons">indeterminate_check_box</i></li>';
															echo '<li><a href="#" data-toggle="tab">Finish</a>
																		<i class="material-icons">indeterminate_check_box</i></li>';
														}if($position=="Jurnalis 2") {
															echo '<li><a href="#" data-toggle="tab">Verification</a>
																		<i class="material-icons">check_box</i></li>';
															echo '<li class="active"><a href="#" data-toggle="tab">Journalist 2</a>
																		<i class="material-icons">check_box_outline_blank</i></li>';
															echo '<li><a href="#" data-toggle="tab">Manager</a>
																		<i class="material-icons">indeterminate_check_box</i></li>';
															echo '<li><a href="#" data-toggle="tab">Finish</a>
																		<i class="material-icons">indeterminate_check_box</i></li>';
														}if($position=="Jurnalis 3") {
															echo '<li><a href="#" data-toggle="tab">Verification</a>
																		<i class="material-icons">check_box</i></li>';
															echo '<li class="active"><a href="#" data-toggle="tab">Journalist 3</a>
																		<i class="material-icons">check_box_outline_blank</i></li>';
															echo '<li><a href="#" data-toggle="tab">Manager</a>
																		<i class="material-icons">indeterminate_check_box</i></li>';
															echo '<li><a href="#" data-toggle="tab">Finish</a>
																		<i class="material-icons">indeterminate_check_box</i></li>';
														}if($position=="Manager") {
															echo '<li><a href="#" data-toggle="tab">Verification</a>
																		<i class="material-icons">check_box</i></li>';
															echo '<li><a href="#" data-toggle="tab">Journalist</a>
																		<i class="material-icons">check_box</i></li>';
															echo '<li class="active"><a href="#" data-toggle="tab">Manager</a>
																		<i class="material-icons">check_box_outline_blank</i></li>';
															echo '<li><a href="#" data-toggle="tab">Finish</a>
																		<i class="material-icons">indeterminate_check_box</i></li>';
														}if($position=="Finish") {
															echo '<li><a href="#" data-toggle="tab">Verification</a>
																		<i class="material-icons">check_box</i></li>';
															echo '<li><a href="#" data-toggle="tab">Journalist</a>
																		<i class="material-icons">check_box</i></li>';
															echo '<li><a href="#" data-toggle="tab">Manager</a>
																		<i class="material-icons">indeterminate_check_box</i></li>';
															echo '<li class="active"><a href="#" data-toggle="tab">Finish</a>
																		<i class="material-icons">check_box_outline_blank</i></li>';
														}
													?>
												</ul>
											</div>

                      <div class="tab-content">
                          <!-- <div class="tab-pane" id="details"> -->
                          <div class="" id="">
                          	<div class="row">
                            	<div class="col-md-12">
                                	<h4 class="info-text"> Details :</h4>
                            	</div>
                              	<div class="col-md-12">
																	<div class="col-md-6">
																		<div class="input-group">
																			<span class="input-group-addon">
																				<i class="material-icons">vpn_key</i>
																			</span>
																			<div class="form-group label-floating">
																				<label class="control-label"><b>No Verification</b></label>
																				<input class="form-control" value="<?php echo $data->No_Verifikasi?>" readonly>
																			</div>
																		</div>
																	</div>
																	<div class="col-md-6">
																		<div class="input-group">
																			<span class="input-group-addon">
																				<i class="material-icons">calendar_today</i>
																			</span>
																			<div class="form-group label-floating">
	                                    	<label class="control-label"><b>Date In</b></label>
		                                    <input class="form-control" value="<?php echo date('Y-m-d', strtotime($data->Tanggal_Masuk));?>" readonly>
	                                    </div>
																		</div>
																	</div>
																	<div class="col-md-6">
																		<div class="input-group">
																			<span class="input-group-addon">
																				<i class="material-icons">face</i>
																			</span>
																			<div class="form-group label-floating">
																				<label class="control-label"><b>Person</b></label>
																					<input class="form-control" value="<?php echo $data->User?>" readonly>
																			</div>
																		</div>
																	</div>
																	<div class="col-md-6">
																		<div class="input-group">
																			<span class="input-group-addon">
																				<i class="material-icons">monetization_on</i>
																			</span>
																			<div class="form-group label-floating">
																				<label class="control-label"><b>Amount</b></label>
																					<?php
																					$jumlah = number_format($data->Jumlah,2,",",".");
																					if ($data->Mata_Uang=="RP") {
																							$mu = "IDR";
																					}else {
																						$mu = $data->Mata_Uang;
																					}?>
																					<input class="form-control" value="<?php echo $jumlah." (".$mu.")";?>" readonly>
																			</div>
																		</div>
																	</div>
																	<div class="col-md-12">
																		<div class="input-group">
																			<span class="input-group-addon">
																				<i class="material-icons">description</i>
																			</span>
																			<div class="form-group label-floating">
																				<label class="control-label"><b>Information</b></label>
																				<textarea class="form-control" readonly><?php echo $data->Keterangan?></textarea>
																				<!-- <input class="form-control" value="<?php echo $data->Keterangan?>" readonly> -->
																			</div>
																		</div>
																	</div>
																	<!-- end of col 12 -->
                              	</div>
																<!-- end of row -->
                          	</div>
                          </div>
													<!-- end of content -->
                      </div>

											<br>
											<div class="text-center">
												<a align="center" href="<?php echo base_url('login')?>" class="btn btn-warning">BACK</a>
											</div>
		                </div>
		            </div> <!-- wizard container -->
		        </div>
						<?php
								}
							}else{?>
								<div class="col-sm-6 col-sm-offset-3">
				            <!--      Wizard container        -->
				            <div class="wizard-container">
				                <div class="card wizard-card" data-color="green" id="wizard">
				                <!--        You can switch " data-color="blue" "  with one of the next bright colors: "green", "orange", "red", "purple"             -->

													<div class="wizard-header">
		                        	<h3 class="wizard-title">RESULT</h3>
		                    	</div>
													<div>
														<ul>
															<li><a href="#">-- Your Document Not Found --</a></li>
														</ul>
													</div>
													<br>
													<br>
													<br>
													<br>
													<br>
													<br>
													<br>
													<br>
													<div class="text-center">
														<a align="center" href="<?php echo base_url('login')?>" class="btn btn-warning">BACK</a>
													</div>
				                </div>
				            </div> <!-- wizard container -->
				        </div>
						<?php } ?>
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
