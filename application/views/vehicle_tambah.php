<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?= $header ?></title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/bower_components/bootstrap/dist/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/bower_components/font-awesome/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/bower_components/Ionicons/css/ionicons.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/bower_components/Ionicons/css/ionicons.min.css">
    <!-- bootstrap datepicker -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/dist/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
    folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/dist/css/skins/_all-skins.min.css">
    <!-- plugin datetimepicker -->
    <link rel="stylesheet" href="<?= base_url() ?>node_modules/jquery-datetimepicker/jquery.datetimepicker.css">

    <!-- Google Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>

<body class="hold-transition skin-blue sidebar-mini">
    <!-- Site wrapper -->
    <div class="wrapper">

        <header class="main-header">
            <!-- Logo -->
            <a href="<?= site_url(); ?>" class="logo">
                <!-- mini logo for sidebar mini 50x50 pixels -->
                <span class="logo-mini"><b>VLS</b></span>
                <!-- logo for regular state and mobile devices -->
                <span class="logo-lg"><b>LogBook </b><small>System</small></span>
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
                <div class="user-panel">
                    <div class="pull-left image">
                        <img src="<?= base_url() ?>assets/dist/img/admin.png" class="img-circle" alt="User Image">
                    </div>
                    <div class="pull-left info">
                        <p>Admin</p>
                        <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                    </div>
                </div>
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

                    <li class="treeview active">
                        <a href="#">
                            <i class="fa fa-edit"></i> <span>Input</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="<?= site_url('user'); ?>"><i class="fa fa-circle-o"></i> User</a></li>
                            <li><a href="<?= site_url('plant'); ?>"><i class="fa fa-circle-o"></i> Plants</a></li>
                            <li class="active"><a href=""><i class="fa fa-circle-o"></i> Vehicle</a></li>
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
                    Halaman Vehicle
                    <small></small>
                </h1>
                <ol class="breadcrumb">
                    <li><a href="<?= site_url(); ?>"><i class="fa fa-dashboard"></i>Dashboard</a></li>
                    <li><a href="<?= site_url('vehicle'); ?>">Vehicle</a></li>
                    <li class="active">Add Vehicle</li>
                </ol>
            </section>

            <!-- Main content -->
            <section class="content">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Input Vehicle</h3>
                        <div class="pull-right">
                        </div>
                    </div>

                    <!-- Default box -->
                    <div class="box">
                        <div class="box-body table-responsive">

                            <form id="form1" method="POST" action="<?= site_url('vehicle/proses') ?>" enctype="multipart/form-data">

                                <table class="table table-bordered table-striped justify-content-center">
                                    <div class="form-row">
                                        <div class="form-group col-xs-6">
                                            <label>Tag Sign</label>
                                            <input type="text" class="form-control" name="tagsign" required />
                                        </div>
                                        <div class="form-group col-xs-6">
                                            <label>Nama Kendaraan</label>
                                            <input type="text" class="form-control" name="namakendaraan" required />
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-xs-6">
                                            <label>Type</label>
                                            <input type="text" class="form-control" name="type" required />
                                        </div>
                                        <div class="form-group col-xs-6">
                                            <label>Kapasitas</label>
                                            <input type="text" class="form-control" name="kapasitas" required />
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-xs-6">
                                            <label>Model</label>
                                            <input type="text" class="form-control" name="model" required />
                                        </div>
                                        <div class="form-group col-xs-6">
                                            <label>Maker</label>
                                            <input type="text" class="form-control" name="maker" required />
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-xs-6">
                                            <label>Chasis</label>
                                            <input type="text" class="form-control" name="chasis" required />
                                        </div>
                                        <div class="form-group col-xs-6">
                                            <label>Engine</label>
                                            <input type="text" class="form-control" name="engine" required />
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-xs-6">
                                            <label>Using Date</label>
                                            <div class="input-group date">
                                                <input type="text" class="form-control pull-right" name="usingdate" id="datepicker" />
                                                <div class="input-group-addon">
                                                    <i class="fa fa-calendar"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group col-xs-6">
                                            <label>Plant</label>

                                            <select class="form-control" name="kodebidang">
                                                <?php
                                                foreach ($plant as $p => $row) { ?>
                                                    <option value="<?= $row->kodebidang ?>"><?= $row->kodebidang ?></option>
                                                <?php
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-row">
                                        <div class="form-group col-xs-6">
                                            <label>Image</label>
                                            <input type="file" name="foto" class="form-control-file" required />
                                        </div>
                                    </div>

                                </table>
                                <div class="form-row">
                                    <div class="form-group pull-right">
                                        <button name="add" style="margin-right: 20px;" class="btn btn-success" type="submit">Submit</button>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group pull-right">
                                        <input style="margin-right: 20px;" class="btn btn-danger" type="button" onclick="resetForm()" value="Reset">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- /.box -->
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        <footer class="main-footer">
            <div class="pull-right hidden-xs">
                <b>Version</b> 1.0.0
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
    <!-- bootstrap datepicker -->
    <script src="<?= base_url() ?>assets/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
    <!-- SlimScroll -->
    <script src="<?= base_url() ?>assets/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
    <!-- FastClick -->
    <script src="<?= base_url() ?>assets/bower_components/fastclick/lib/fastclick.js"></script>
    <!-- AdminLTE App -->
    <script src="<?= base_url() ?>assets/dist/js/adminlte.min.js"></script>
    <!-- ChartJS -->
    <script src="<?= base_url() ?>assets/bower_components/chart.js/Chart.js"></script>
    <!-- Native js -->
    <!-- <script src="<?= base_url() ?>assets/js/script.js"></script> -->
    <!-- plugin dattimepicker -->
    <script src="<?= base_url() ?>node_modules/jquery/dist/jquery.js"></script>
    <script src="<?= base_url() ?>node_modules/jquery-datetimepicker/build/jquery.datetimepicker.full.min.js"></script>
    <script>
        jQuery.datetimepicker.setLocale('id');

        jQuery('#datepicker').datetimepicker({
            i18n: {
                de: {
                    months: [
                        'January', 'February', 'March', 'April',
                        'May', 'June', 'July', 'August',
                        'September', 'October', 'November', 'December',
                    ],
                    dayOfWeek: [
                        "Sunday", "Monday", "Thusday", "Wednesday",
                        "Thursday", "Friday", "Saturday",
                    ]
                }
            },
            timepicker: false,
            format: 'd-m-Y '
        });

        function resetForm() {
            document.getElementById("form1").reset();
        }
    </script>
</body>

</html>