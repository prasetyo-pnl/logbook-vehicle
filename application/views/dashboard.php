<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Dashboard LogBook Maintenance</title>
	<!-- Tell the browser to be responsive to screen width -->
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	<!-- Bootstrap 3.3.7 -->
	<link rel="stylesheet" href="<?= base_url() ?>assets/bower_components/bootstrap/dist/css/bootstrap.min.css">
	<!-- Font Awesome -->
	<link rel="stylesheet" href="<?= base_url() ?>assets/bower_components/font-awesome/css/font-awesome.min.css">
	<!-- Ionicons -->
	<link rel="stylesheet" href="<?= base_url() ?>assets/bower_components/Ionicons/css/ionicons.min.css">
	<!-- Theme style -->
	<link rel="stylesheet" href="<?= base_url() ?>assets/dist/css/AdminLTE.min.css">
	<!-- AdminLTE Skins. Choose a skin from the css/skins
    folder instead of downloading all of them to reduce the load. -->
	<link rel="stylesheet" href="<?= base_url() ?>assets/dist/css/skins/_all-skins.min.css">

	<!-- Google Font -->
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>

<body class="hold-transition skin-blue sidebar-mini">
	<!-- Site wrapper -->
	<div class="wrapper">

		<header class="main-header">
			<!-- Logo -->
			<a href="<?= site_url(); ?>" class="logo" style="background-color: #222D32;">
				<!-- mini logo for sidebar mini 50x50 pixels -->
				<span class="logo-mini"><img src="<?= base_url() ?>assets/dist/img/INALUMKECIL.png" width="20px" height="20px"></span>
				<!-- logo for regular state and mobile devices -->
				<span class="logo-lg"><img src="<?= base_url() ?>assets/dist/img/INALUM.png" width="200px" height="35px"></span>
				<!-- <span class="logo-lg"><b>LogBook </b>System</span> -->
			</a>

			<!-- Header Navbar: style can be found in header.less -->
			<nav class="navbar navbar-static-top">
				<!-- Sidebar toggle button-->
				<a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</a>

				<div class="navbar-custom-menu">
					<ul class="nav navbar-nav">

						<!-- User Account: style can be found in dropdown.less -->
						<li class="dropdown user user-menu">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">
								<img src="<?= base_url() ?>assets/dist/img/admin.png" class="user-image" alt="User Image">
								<span class="hidden-xs">Admin</span>
							</a>
							<ul class="dropdown-menu">
								<!-- User image -->
								<li class="user-header">
									<img src="<?= base_url() ?>assets/dist/img/admin.png" class="img-circle" alt="User Image">

									<p>
										PNL - Web Developer
										<small>Member since July. 2020</small>
									</p>
								</li>
								<!-- Menu Footer-->
								<li class="user-footer">
									<div class="pull-left">
										<a href="#" class="btn btn-success btn-flat">Profile</a>
									</div>
									<div class="pull-right">
										<a href="#" class="btn btn-danger btn-flat ">Sign out</a>
									</div>
								</li>
							</ul>
						</li>
					</ul>
				</div>
			</nav>
		</header>

		<!-- =============================================== -->

		<!-- Left side column. contains the sidebar -->
		<aside class="main-sidebar">
			<!-- sidebar: style can be found in sidebar.less -->
			<section class="sidebar">
				<!-- Sidebar user panel -->
				<!-- <div class="user-panel">
					<div class="pull-left image">
						<img src="<?= base_url() ?>assets/dist/img/admin.png" class="img-circle" alt="User Image">
					</div>
					<div class="pull-left info">
						<p>Admin</p>
						<a href="#"><i class="fa fa-circle text-success"></i> Online</a>
					</div>
				</div> -->
				<!-- search form -->
				<form action="#" method="get" class="sidebar-form">
					<div class="input-group">
						<input type="text" name="q" class="form-control" placeholder="Search...">
						<span class="input-group-btn">
							<button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
							</button>
						</span>
					</div>
				</form>
				<!-- /.search form -->
				<!-- sidebar menu: : style can be found in sidebar.less -->
				<ul class="sidebar-menu" data-widget="tree">
					<li class="header">MAIN NAVIGATION</li>

					<li class="treeview">
						<a href="#">
							<i class="fa fa-edit"></i> <span>Input</span>
							<span class="pull-right-container">
								<i class="fa fa-angle-left pull-right"></i>
							</span>
						</a>
						<ul class="treeview-menu">
							<li><a href="<?= site_url('user'); ?>"><i class="fa fa-circle-o"></i>User</a></li>
							<li><a href="<?= site_url('plant'); ?>"><i class="fa fa-circle-o"></i> Plants</a></li>
							<li><a href="<?= site_url('vehicle'); ?>"><i class="fa fa-circle-o"></i> Vehicle</a></li>
							<li><a href="<?= site_url('trouble'); ?>"><i class="fa fa-circle-o"></i> Trouble</a></li>
						</ul>
					</li>
					<li class="treeview">
						<a href="#">
							<i class="fa fa-table"></i> <span>Report</span>
							<span class="pull-right-container">
								<i class="fa fa-angle-left pull-right"></i>
							</span>
						</a>
						<ul class="treeview-menu">
							<li><a href="<?= site_url('weekly'); ?>"><i class="fa fa-circle-o"></i> Weekly</a></li>
							<li><a href="<?= site_url('monthly'); ?>"><i class="fa fa-circle-o"></i> Monthly</a></li>
							<li><a href="<?= site_url('range'); ?>"><i class="fa fa-circle-o"></i> Date Range </a></li>
						</ul>
					</li>

				</ul>
			</section>
			<!-- /.sidebar -->
		</aside>

		<!-- =============================================== -->

		<!-- Content Wrapper. Contains page content -->
		<div class="content-wrapper">
			<!-- Content Header (Page header) -->
			<section class="content-header">
				<h1>
					<!-- Data Grafik Maintenance -->
					<small></small>
				</h1>
				<ol class="breadcrumb">
					<li class="active"><i class="fa fa-dashboard"></i> Dashboard</li>
				</ol>
			</section>


			<!-- Main content -->
			<section class="content">

				<div class="jumbotron-fluid" style="background-color: #222D32;">
					<div class="text-justify" style="color: #B8C7CE;">
						<h3 class="text-center" style="padding-top: 20px;"><strong>VEHICLE LOGBOOK SYSTEM</strong></h3>
						<p style="padding: 0px 20px 20px;">A logbook (a ship's logs or simply log) is a record of important events in the management, operation, and navigation of a ship. It is essential to traditional navigation, and must be filled in at least daily.
							The term originally referred to a book for recording readings from the chip log that was used to estimate a ship's speed through the water. Today's ship's log has grown to contain many other types of information, and is a record of operational data relating to a ship or submarine, such as weather conditions, times of routine events and significant incidents, crew complement or what ports were docked at and when.
							The term logbook has spread to a wide variety of other usages. Today, a virtual or electronic logbook is typically used for record-keeping for complex machines such as nuclear plants or particle accelerators. In military terms, a logbook is a series of official and legally binding documents. Each document (usually arranged by date) is marked with the time of an event or action of significance.</p>
					</div>
				</div>
				<!-- Small boxes (Stat box) -->
				<div class="row" style="margin-top: 30px;">
					<div class="col-sm-3 col-xs-6">
						<!-- small box -->
						<div class="small-box bg-aqua">
							<div class="inner">
								<h3><?php echo $totalUser->user; ?></h3>
								<p>USER</p>
							</div>
							<div class="icon">
								<i class="ion ion-person"></i>
							</div>
							<a href="<?= site_url('pengguna'); ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
						</div>
					</div>
					<!-- ./col -->
					<div class="col-sm-3 col-xs-6">
						<!-- small box -->
						<div class="small-box bg-yellow">
							<div class="inner">
								<h3><?php echo $totalPlant->plant ?></h3>

								<p>PLANT</p>
							</div>
							<div class="icon">
								<i class="ion ion-ios-people-outline"></i>
							</div>
							<a href="<?= site_url('plant'); ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
						</div>
					</div>
					<!-- ./col -->
					<div class="col-sm-3 col-xs-6">
						<!-- small box -->
						<div class="small-box bg-green">
							<div class="inner">
								<h3><?php echo $totalVehicle->vehicle ?></h3>

								<p>VEHICLE</p>
							</div>
							<div class="icon">
								<i class="ion ion-android-car "></i>
							</div>
							<a href="<?= site_url('vehicle'); ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
						</div>
					</div>

					<!-- ./col -->
					<div class="col-sm-3 col-xs-6">
						<!-- small box -->
						<div class="small-box bg-red">
							<div class="inner">
								<h3><?php echo $totalTrouble->trouble ?></h3>

								<p>TROUBLE</p>
							</div>
							<div class="icon">
								<i class="fa fa-wrench" aria-hidden="true"></i>
							</div>
							<a href="<?= site_url('trouble'); ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
						</div>
					</div>
					<!-- ./col -->
				</div>
			</section>
			<!-- /.content -->
		</div>
		<!-- /.content-wrapper -->

		<footer class="main-footer">
			<div class="pull-right hidden-xs">
				<b>Version</b> 1.1.0
			</div>
			<strong>Copyright &copy; 2020 <a href="https://inalum.id">PT.INDONESIA ASAHAN ALUMINIUM</a>.</strong> All rights
			reserved.
		</footer>

	</div>
	<!-- ./wrapper -->

	<!-- jQuery 3 -->
	<script src="<?= base_url() ?>assets/bower_components/jquery/dist/jquery.min.js"></script>
	<!-- Bootstrap 3.3.7 -->
	<script src="<?= base_url() ?>assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
	<!-- SlimScroll -->
	<script src="<?= base_url() ?>assets/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
	<!-- FastClick -->
	<script src="<?= base_url() ?>assets/bower_components/fastclick/lib/fastclick.js"></script>
	<!-- iCheck 1.0.1 -->
	<script src="<?= base_url() ?>assets/plugins/iCheck/icheck.min.js"></script>
	<!-- AdminLTE App -->
	<script src="<?= base_url() ?>assets/dist/js/adminlte.min.js"></script>
	<!-- AdminLTE for demo purposes -->
	<script src="<?= base_url() ?>assets/dist/js/demo.js"></script>
	<!-- Native js -->
	<script src="<?= base_url() ?>assets/js/script.js"></script>
	<!-- ChartJS -->
	<script src="<?= base_url() ?>assets/bower_components/chart.js/Chart.js"></script>

</body>

</html>