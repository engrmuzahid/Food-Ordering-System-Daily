<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>ProLunch</title>
	<!-- Global stylesheets -->
	<link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
	<link href="<?php echo base_url('assets/admin_layout/css/icons/icomoon/styles.css') ?>" rel="stylesheet" type="text/css">
	<link href="<?php echo base_url('assets/admin_layout/css/bootstrap.css') ?>" rel="stylesheet" type="text/css">
	<link href="<?php echo base_url('assets/admin_layout/css/core.css') ?>" rel="stylesheet" type="text/css">
	<link href="<?php echo base_url('assets/admin_layout/css/components.css') ?>" rel="stylesheet" type="text/css">
	<link href="<?php echo base_url('assets/admin_layout/css/colors.css') ?>" rel="stylesheet" type="text/css">
	<!-- /global stylesheets -->
	<!-- Core JS files -->
	<script type="text/javascript" src="<?php echo base_url('assets/admin_layout/js/plugins/loaders/pace.min.js') ?>"></script>
	<script type="text/javascript" src="<?php echo base_url('assets/admin_layout/js/core/libraries/jquery.min.js') ?>"></script>
	<script type="text/javascript" src="<?php echo base_url('assets/admin_layout/js/core/libraries/bootstrap.min.js') ?>"></script>
	<script type="text/javascript" src="<?php echo base_url('assets/admin_layout/js/plugins/loaders/blockui.min.js') ?>"></script>
	<!-- /core JS files -->
	<!-- Theme JS files -->
	<script type="text/javascript" src="<?php echo base_url('assets/admin_layout/js/core/app.js') ?>"></script>
	 <script src="//cdnjs.cloudflare.com/ajax/libs/jquery-form-validator/2.3.26/jquery.form-validator.min.js"></script> 
	<!-- /theme JS files -->
</head>
<body class="login-container">
	<!-- Main navbar -->
	<div class="navbar navbar-inverse">
		<div class="navbar-header">
			<a class="navbar-brand" href="index.html"><img src="assets/images/logo_light.png" alt=""></a>

			<ul class="nav navbar-nav pull-right visible-xs-block">
				<li><a data-toggle="collapse" data-target="#navbar-mobile"><i class="icon-tree5"></i></a></li>
			</ul>
		</div>
		<div class="navbar-collapse collapse" id="navbar-mobile">
			<ul class="nav navbar-nav navbar-right">
				<li>
					<a href="#">
						<i class="icon-display4"></i> <span class="visible-xs-inline-block position-right"> Go to website</span>
					</a>
				</li>

				<li>
					<a href="#">
						<i class="icon-user-tie"></i> <span class="visible-xs-inline-block position-right"> Contact admin</span>
					</a>
				</li>

				<li class="dropdown">
					<a class="dropdown-toggle" data-toggle="dropdown">
						<i class="icon-cog3"></i>
						<span class="visible-xs-inline-block position-right"> Options</span>
					</a>
				</li>
			</ul>
		</div>
	</div>
	<!-- /main navbar -->
	<!-- Page container -->
	<div class="page-container">
		<!-- Page content -->
		<div class="page-content">
			<!-- Main content -->
			<div class="content-wrapper">
				<!-- Content area -->
				<div class="content">
					

					<!-- Simple login form -->
                   	<form method="POST" action="<?php echo base_url('login/forgot_update/'.$users->user_id)?>">

						<div class="panel panel-body login-form">

							<div class="text-center">
								<div style="border-radius: 50%;"><i><img width=100% src="<?php echo base_url('assets/images/logo.jpg') ?>" alt=""></i>
							</div>
							<?php if($this->session->flashdata('msg')) { echo $this->session->flashdata('msg'); } ?>
							<h5 class="content-group"><strong>Reset Password</strong></h5>
     
			    <?php
			    if ( $error = $this->session->flashdata('error')) {
			    ?>
			      <div class="alert alert-danger">
			        <strong>Error!</strong> <?= $error; ?>
			      </div>
			    <?php
			    $this->session->sess_destroy();
			     } ?>
							</div>

							<div class="form-group">
								<h6>Cofirmation Code</h6>
								<input type="text" name="code" class="form-control" required="">
							</div>
							<div class="form-group">
								<button type="submit" class="btn btn-primary btn-block">Submit<i class="icon-circle-right2 position-right"></i></button>
							</div>
							<div class="text-center">
								<a href="<?php echo base_url('login/');?>">Back to Login?</a>
							</div>
						</div>
					</form>
					<!-- /simple login form -->
					<!-- Footer -->
					<div class="footer text-muted text-center">
						&copy; 2019. by <a href="http://ginilab.com" target="_blank">ProLunch</a>
					</div>
					<!-- /footer -->
				</div>
				<!-- /content area -->
			</div>
			<!-- /main content -->
		</div>
		<!-- /page content -->
	</div>
	<!-- /page container -->
 <script>
      $.validate({
      	reCaptchaSiteKey: '...',
  		reCaptchaTheme: 'light',
        lang: 'en'
      });
    </script>
</body>
</html>
