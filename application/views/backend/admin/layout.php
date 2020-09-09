<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Spice-Guru</title>

	<!-- Global stylesheets -->
	<link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
	<link href="<?php echo base_url('assets/admin_layout/css/icons/icomoon/styles.css') ?>" rel="stylesheet" type="text/css">
	<link href="<?php echo base_url('assets/admin_layout/css/bootstrap.css') ?>" rel="stylesheet" type="text/css">
	<link href="<?php echo base_url('assets/admin_layout/css/core.css') ?>" rel="stylesheet" type="text/css">
	<link href="<?php echo base_url('assets/admin_layout/css/components.css') ?>" rel="stylesheet" type="text/css">
	<link href="<?php echo base_url('assets/admin_layout/css/colors.css') ?>" rel="stylesheet" type="text/css">
	<!-- /global stylesheets -->

	<!-- Core JS files -->
    <script type="text/javascript" language="javascript" src="https://code.jquery.com/jquery-3.3.1.js"></script>
	<script type="text/javascript" src="<?php echo base_url('assets/admin_layout/js/plugins/loaders/pace.min.js') ?>"></script>
	<script type="text/javascript" src="<?php echo base_url('assets/admin_layout/js/core/libraries/jquery.min.js') ?>"></script>
	<script type="text/javascript" src="<?php echo base_url('assets/admin_layout/js/core/libraries/bootstrap.min.js') ?>"></script>
	<script type="text/javascript" src="<?php echo base_url('assets/admin_layout/js/plugins/loaders/blockui.min.js') ?>"></script>
	<!-- /core JS files -->

	<!-- Theme JS files -->
	<script type="text/javascript" src="<?php echo base_url('assets/admin_layout/js/plugins/visualization/d3/d3.min.js') ?>"></script>
	<script type="text/javascript" src="<?php echo base_url('assets/admin_layout/js/plugins/visualization/d3/d3_tooltip.js') ?>"></script>
	<script type="text/javascript" src="<?php echo base_url('assets/admin_layout/js/plugins/forms/styling/switchery.min.js') ?>"></script>
	<script type="text/javascript" src="<?php echo base_url('assets/admin_layout/js/plugins/forms/styling/uniform.min.js') ?>"></script>
	<script type="text/javascript" src="<?php echo base_url('assets/admin_layout/js/plugins/forms/selects/bootstrap_multiselect.js') ?>"></script>
	<script type="text/javascript" src="<?php echo base_url('assets/admin_layout/js/plugins/ui/moment/moment.min.js') ?>"></script>
	<script type="text/javascript" src="<?php echo base_url('assets/admin_layout/js/plugins/pickers/daterangepicker.js') ?>"></script>

	<script type="text/javascript" src="<?php echo base_url('assets/admin_layout/js/core/app.js') ?>"></script>

	<script type="text/javascript" src="<?php echo base_url('assets/admin_layout/js/plugins/forms/selects/select2.min.js') ?>"></script>

	<script type="text/javascript" src="<?php echo base_url('assets/admin_layout/ckeditor/ckeditor.js') ?>"></script>
	<script src="<?php echo base_url('assets/admin_layout/js/sweetalert.min.js') ?>"></script>
	<script src="<?php echo base_url('assets/admin_layout/js/jquery.form-validator.min.js') ?>"></script>

    <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/1.5.6/js/dataTables.buttons.min.js"></script>
    <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.flash.min.js"></script>
    <script type="text/javascript" language="javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script type="text/javascript" language="javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script type="text/javascript" language="javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.html5.min.js"></script>
    <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.print.min.js"></script>

	<!-- /theme JS files -->

</head>

<body>

	<!-- Main navbar -->
	<div class="navbar navbar-inverse">
		<div class="navbar-header">
			<a class="navbar-brand" href="">Spice-Guru Admin Panel</a>

			<ul class="nav navbar-nav visible-xs-block">
				<li><a data-toggle="collapse" data-target="#navbar-mobile"><i class="icon-tree5"></i></a></li>
				<li><a class="sidebar-mobile-main-toggle"><i class="icon-paragraph-justify3"></i></a></li>
			</ul>
		</div>

		<div class="navbar-collapse collapse" id="navbar-mobile">
			<ul class="nav navbar-nav">
				<li><a class="sidebar-control sidebar-main-toggle hidden-xs"><i class="icon-paragraph-justify3"></i></a></li>


			</ul>

			<a target="_blank" href="<?php echo base_url('Site') ?>"><p class="navbar-text"><span class="label bg-success">Live View</span></p></a>

			<ul class="nav navbar-nav navbar-right">
				

				
				<?php $user=$this->db->where('user_id',$_SESSION['admin_id'])->get('users')->row(); ?>
				<li class="dropdown dropdown-user">
					<a class="dropdown-toggle" data-toggle="dropdown">
						<img src="<?php echo base_url('assets/images/logo.jpg') ?>" alt="">
						<span><?= $user->user_name; ?></span>
						<i class="caret"></i>
					</a>

					<ul class="dropdown-menu dropdown-menu-right">
						<li><a href="<?php echo base_url('login/user_info');?>"><i class="icon-user-plus"></i> My profile</a></li>
						<li><a href="<?php echo base_url('login/password_change');?>"><i class="icon-cog5"></i> Password Change</a></li>
						<li><a href="<?php echo base_url('login/user_logout'); ?>"><i class="icon-switch2"></i> Logout</a></li>
					</ul>
				</li>
			</ul>
		</div>
	</div>
	<!-- /main navbar -->


	<!-- Page container -->
	<div class="page-container">

		<!-- Page content -->
		<div class="page-content">

			<!-- Main sidebar -->
			
			<?php echo $side_menu; ?>
			<!-- /main sidebar -->


			<!-- Main content -->
			<div class="content-wrapper">


				<!-- Content area -->
				<?php echo $main_content; ?>
				<!-- /content area -->

			</div>
			<!-- /main content -->

		</div>
		<!-- /page content -->

	</div>
	<!-- /page container -->

</body>
</html>
