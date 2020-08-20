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
    <!-- DataTables -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
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

                    <li class="treeview active">
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
                            <li class="active"><a href=""><i class="fa fa-circle-o"></i> Trouble</a></li>
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

                    <small></small>
                </h1>
                <ol class="breadcrumb">
                    <li><a href="<?= site_url(); ?>"><i class="fa fa-dashboard"></i>Dashboard</a></li>
                    <li class="active">Trouble</li>
                </ol>
            </section>

            <!-- Main content -->
            <section class="content">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Data Trouble</h3>
                        <div class="pull-right">
                            <a href="<?= site_url('trouble/add') ?>" class="btn btn-success">
                                <i class="fa fa-plus"></i> Add
                            </a>
                        </div>
                    </div>

                    <!-- Default box -->
                    <div class="box">
                        <div class="box-body table-responsive">
                            <table class="table table-bordered table-striped text-center" id="table1">

                                <thead align="center">
                                    <tr>
                                        <th>No</th>
                                        <th>Tag Sign</th>
                                        <th>Date Entry</th>
                                        <th>Date Finish</th>
                                        <th>Stop Time</th>
                                        <th>Kind Of Trouble</th>
                                        <th>Part Of Work</th>
                                        <th>Description</th>
                                        <th>Couter Measure</th>
                                        <th>Spare Part</th>
                                        <th>Man Power</th>
                                        <th>Remarks</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <?php
                                $nodata = 1;
                                foreach ($trouble as $t => $row) {
                                    if ($row->kodebidang == $this->session->userdata('kodebidang')) {
                                        goto label;
                                    } elseif ($this->session->userdata('kodebidang') == null) {
                                        goto label;
                                    } else {
                                        continue;
                                    }
                                    label:
                                ?>

                                    <tbody>
                                        <tr>
                                            <td><?= $nodata ?></td>
                                            <td><?= $row->tagsign; ?></td>
                                            <td><?php
                                                echo date("d-m-yy H:i", strtotime($row->dateentry));
                                                ?></td>
                                            <td><?php
                                                echo date("d-m-yy H:i", strtotime($row->datefinish));
                                                ?></td>
                                            <td><?= $row->stoptime; ?></td>
                                            <td><?= $row->kindoftrouble; ?></td>
                                            <td>
                                                <?php
                                                $pow = $row->partofwork;
                                                $pisah = explode(";", $pow);
                                                $no = 1;
                                                for ($i = 0; $i < count($pisah); $i++) {
                                                    echo $no . ". " . $pisah[$i] . "<br>";
                                                    $no++;
                                                }
                                                ?>
                                            </td>
                                            <td>
                                                <?php
                                                $desc = $row->description;
                                                $pisah = explode(";", $desc);
                                                $no = 1;
                                                for ($i = 0; $i < count($pisah); $i++) {
                                                    echo $no . ". " . $pisah[$i] . "<br>";
                                                    $no++;
                                                }
                                                ?>
                                            </td>
                                            <td>
                                                <?php
                                                $count = $row->countermeasure;
                                                $pisah = explode(";", $count);
                                                $no = 1;
                                                for ($i = 0; $i < count($pisah); $i++) {
                                                    echo $no . ". " . $pisah[$i] . "<br>";
                                                    $no++;
                                                }
                                                ?>
                                            </td>
                                            <td>
                                                <?php
                                                $spare = $row->sparepart;
                                                $pisah = explode(";", $spare);
                                                $no = 1;
                                                for ($i = 0; $i < count($pisah); $i++) {
                                                    echo $no . ". " . $pisah[$i] . "<br>";
                                                    $no++;
                                                }
                                                $nodata++;
                                                ?>
                                            </td>
                                            <td><?= $row->manpower; ?></td>
                                            <td><?= $row->remarks; ?></td>
                                            <td class="text-center" width=" 160px">
                                                <a href="<?= site_url('trouble/edit/' . $row->id_trouble) ?>" class=" btn btn-warning btn-xs">
                                                    <i class="fa fa-pencil"></i> Edit
                                                </a>
                                                <?php if ($this->session->userdata('level') == 1) { ?>
                                                    <a href="<?= site_url('trouble/delete/' . $row->id_trouble) ?>" onclick="return confirm('Yakin hapus data?')" class="btn btn-danger btn-xs">
                                                        <i class="fa fa-trash"></i> Delete
                                                    </a>
                                                <?php } ?>
                                            </td>
                                        </tr>
                                    </tbody>
                                <?php
                                }
                                ?>
                            </table>
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
    <!-- DataTables -->
    <script src="<?= base_url() ?>assets/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="<?= base_url() ?>assets/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
    <!-- AdminLTE App -->
    <script src="<?= base_url() ?>assets/dist/js/adminlte.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="<?= base_url() ?>assets/dist/js/demo.js"></script>
    <!-- ChartJS -->
    <script src="<?= base_url() ?>assets/bower_components/chart.js/Chart.js"></script>
    <!-- Native js -->
    <!-- <script src="<?= base_url() ?>assets/js/script.js"></script> -->
    <script>
        $(document).ready(function() {
            $('#table1').DataTable({
                'paging': false,
                'lengthChange': false,
                'searching': true,
                'ordering': false,
                'info': true,
                'autoWidth': false
            });
        })
    </script>

</body>

</html>