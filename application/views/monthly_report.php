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
    <link rel="stylesheet" href="<?= base_url() ?>assets/css/grafik.css">
    <style>
        .line-title {
            border: 0;
            border-style: inset;
            border-top: 1px solid #000;
        }

        .contain {
            display: flex;
            align-items: center;
            justify-content: center;
            height: 150px;
        }
    </style>
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
                                <span class="hidden-xs">
                                    <?php
                                    $username = $this->session->userdata('username');
                                    echo $username;
                                    ?>
                                </span>
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
                                        <a href="<?= site_url('auth/logout') ?>" class="btn btn-danger btn-flat ">Sign out</a>
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
                            <?php if ($this->session->userdata('level') == 1) { ?>
                                <li><a href="<?= site_url('user'); ?>"><i class="fa fa-circle-o"></i>User</a></li>
                            <?php } ?>
                            <li><a href="<?= site_url('plant'); ?>"><i class="fa fa-circle-o"></i> Plant</a></li>
                            <li><a href="<?= site_url('vehicle'); ?>"><i class="fa fa-circle-o"></i> Vehicle</a></li>
                            <li><a href="<?= site_url('trouble'); ?>"><i class="fa fa-circle-o"></i> Trouble</a></li>
                        </ul>
                    </li>
                    <li class="treeview active">
                        <a href="#">
                            <i class="fa fa-table"></i> <span>Report</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="<?= site_url('weekly'); ?>"><i class="fa fa-circle-o"></i> Weekly</a></li>
                            <li class="active"><a href="<?= site_url('monthly'); ?>"><i class="fa fa-circle-o"></i> Monthly</a></li>
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
                <?php
                $url = $_SERVER['REQUEST_URI'];
                if ($url == '/logbook/monthly' or $url == '/logbook/monthly/index/I/' or $url == '/logbook/monthly/index/O/') {

                    if ($toggle == null or $toggle == 'O') {
                        $toggle = 'I'; ?>
                        <a href="<?= site_url('monthly/index/' . $toggle) ?>/">
                            <input class="btn" type="checkbox" name="checkbox" id="checkbox" style="margin-right:25px; margin-left:10px">
                        </a>
                    <?php } elseif ($toggle == 'I') {
                        $toggle = 'O'; ?>
                        <a href="<?= site_url('monthly/index/' . $toggle) ?>/">
                            <input checked class="btn" type="checkbox" name="checkbox" id="checkbox" style="margin-right:25px;margin-left:10px">
                        </a>
                    <?php } elseif ($toggle == 'O') {
                        $toggle = 'I'; ?>
                        <input class="btn" type="checkbox" name="checkbox" id="checkbox" style="margin-right:25px;margin-left:10px">
                    <?php }
                } else {
                    if ($toggle == null or $toggle == 'O') {
                        $toggle = 'I'; ?>
                        <a href="<?= site_url('monthly/report/' . $toggle . 'x' . $tahun . 'x' . $bulan . 'x'  . $tagsort . 'x'  . $plantsort) ?>/">
                            <input class="btn" type="checkbox" name="checkbox" id="checkbox" style="margin-right:25px; margin-left:10px">
                        </a>
                    <?php } elseif ($toggle == 'I') {
                        $toggle = 'O'; ?>
                        <a href="<?= site_url('monthly/report/' . $toggle . 'x' . $tahun . 'x' . $bulan . 'x'  . $tagsort . 'x'  . $plantsort) ?>/">
                            <input checked class="btn" type="checkbox" name="checkbox" id="checkbox" style="margin-right:25px;margin-left:10px">
                        </a>
                    <?php } elseif ($toggle == 'O') {
                        $toggle = 'I'; ?>
                        <input class="btn" type="checkbox" name="checkbox" id="checkbox" style="margin-right:25px;margin-left:10px">
                <?php }
                }
                ?>


                <?php $x = 'x' ?>
                <a href="<?= site_url('monthly/pdf/' . $tahun . 'x' . $bulan . 'x'  . $tagsort . 'x'  . $plantsort) ?>" class="btn btn-danger" style="margin-right:25px;"><i class="fa fa-file-pdf-o"></i> PDF</a>
                <a href="<?= site_url('monthly/excel/' . $tahun . 'x' . $bulan . 'x'  . $tagsort . 'x'  . $plantsort) ?>" class="btn btn-success" style="margin-right:25px;"><i class="fa fa-file-excel-o"></i> Excel</a>
                <a href="<?= site_url('monthly/print/' . $tahun . 'x' . $bulan . 'x'  . $tagsort . 'x'  . $plantsort) ?>" target="_blank" class="btn btn-warning" style="margin-right:25px;"><i class="fa fa-print"></i> Print</a>


                <ol class="breadcrumb">
                    <li><a href="<?= site_url(); ?>"><i class="fa fa-dashboard"></i>Dashboard</a></li>
                    <li><a href="<?= site_url('monthly'); ?>">Monthly</a></li>
                    <li class="active">Report</li>
                </ol>
            </section>

            <!-- Main content -->
            <section class="content">
                <div class="box">
                    <div class="box-header">

                        <form id="form1" method="POST" action="<?= site_url('monthly/report/') ?>" enctype="multipart/form-data">
                            <?php if ($toggle == 'O') { ?>
                                <input type="hidden" name="toggle" value="I">
                            <?php
                            } elseif ($toggle == 'I') { ?>
                                <input type="hidden" name="toggle" value="O">
                            <?php
                            }
                            ?>

                            <div class="form-row">
                                <div class="col-md-2" style="margin-right: 20px;">
                                    <label>Year</label>
                                    <select class="form-control" name="year">
                                        <?php
                                        $tahun = date('yy');
                                        for ($i = 0; $i <= 10; $i++) {  ?>
                                            <option value="<?= $tahun; ?>"><?= $tahun; ?></option>
                                        <?php
                                            $tahun--;
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="col-md-2" style="margin-right: 20px;">
                                    <label>Month</label>
                                    <select class="form-control" name="month">
                                        <?php
                                        $today = date('m');
                                        $cek = date('m', strtotime($bulan));
                                        for ($i = 0; $i < 12; $i++) {
                                            $number = date('m', strtotime('+' . $i . ' month', strtotime($today)));
                                            $months = date('F', strtotime('+' . $i . ' month', strtotime($today)));
                                            if ($number == $bulan) { ?>
                                                <option selected value="<?= $number ?>"><?= $months ?></option>
                                            <?php
                                            } else { ?>
                                                <option value="<?= $number ?>"><?= $months ?></option>
                                            <?php
                                            }
                                            ?>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="col-md-3" style="margin-right: 20px;">
                                    <label>Jenis Kendaraan</label>
                                    <select class="form-control" name="tagSort">
                                        <option value="all">- All -</option>
                                        <?php
                                        foreach ($tagsign as $t => $row) {
                                            if ($row->kodebidang == $this->session->userdata('kodebidang')) {
                                                goto label;
                                            } elseif ($this->session->userdata('kodebidang') == null) {
                                                goto label;
                                            } else {
                                                continue;
                                            }
                                            label:
                                            if ($tagsort == $row->tagsign) { ?>
                                                <option selected value="<?= $row->tagsign ?>"><?= $row->tagsign ?></option>
                                            <?php
                                            } else { ?>
                                                <option value="<?= $row->tagsign ?>"><?= $row->tagsign ?></option>
                                            <?php
                                            }
                                            ?>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="col-md-3" style="margin-right: 20px;">
                                    <label>Plant</label>
                                    <select class="form-control" name="plantSort">
                                        <?php if ($this->session->userdata('level') == 1)
                                            echo "<option value='all'>- All -</option>";
                                        foreach ($plant as $p => $row) {
                                            if ($row->kodebidang == $this->session->userdata('kodebidang')) {
                                                goto plant;
                                            } elseif ($this->session->userdata('kodebidang') == null) {
                                                goto plant;
                                            } else {
                                                continue;
                                            }
                                            plant:

                                            if ($plantsort == $row->kodebidang) { ?>
                                                <option selected value="<?= $row->kodebidang ?>"><?= $row->kodebidang ?></option>
                                            <?php
                                            } else {
                                            ?>
                                                <option value="<?= $row->kodebidang ?>"><?= $row->kodebidang ?></option>
                                            <?php
                                            } ?>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-row  pull-right">
                                <div class="form-group">
                                    <button name="show" style="margin-right: 15px; margin-top:25px; padding:5px; padding-bottom:6px;" class="btn btn-primary" type="submit">Show Data</button>
                                </div>
                            </div>
                        </form>
                    </div>

                    <!-- report -->


                    <?php if ($toggle == 'I') {
                        $this->load->view('report/monthly_print');
                    } elseif ($toggle == 'O') {
                        $this->load->view('grafik/grafik_monthly');
                    }
                    ?>
                </div>
                <!-- /.box -->
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
            // i18n: {
            //     de: {
            //         months: [
            //             'January', 'February', 'March', 'April',
            //             'May', 'June', 'July', 'August',
            //             'September', 'October', 'November', 'December',
            //         ],
            //         // dayOfWeek: [
            //         //     "Sunday", "Monday", "Thusday", "Wednesday",
            //         //     "Thursday", "Friday", "Saturday",
            //         // ]
            //     }
            // },
            timepicker: false,
            format: 'm-yy '
        });

        function resetForm() {
            document.getElementById("form1").reset();
        }
    </script>
</body>

</html>