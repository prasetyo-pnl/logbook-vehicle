<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?= $header; ?></title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/bower_components/bootstrap/dist/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/bower_components/font-awesome/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/bower_components/Ionicons/css/ionicons.min.css">
    <!-- iCheck for checkboxes and radio inputs -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/plugins/iCheck/all.css">
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
                    <li><a href="<?= site_url('trouble'); ?>">Trouble</a></li>
                    <li class="active">Edit Trouble</li>
                </ol>
            </section>

            <!-- Main content -->
            <section class="content">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Edit Data Trouble</h3>
                        <div class="pull-right">
                        </div>
                    </div>

                    <!-- Default box -->
                    <div class="box">
                        <div class="box-body table-responsive">

                            <form class="" id="form1" method="POST" action="<?= site_url('trouble/proses') ?>" enctype="multipart/form-data">
                                <input type="hidden" name="id" value="<?= $trouble->id_trouble; ?>">
                                <table class="table table-bordered table-striped">
                                    <div class="container-fluid">
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label>Tag Sign</label>
                                                <input type="text" class="form-control pull-right" name="tagsign" value="<?= $trouble->tagsign; ?>" disabled />
                                            </div>
                                            <div class="form-group col-xs-6">
                                                <label>Date Entry</label>
                                                <div class="input-group date">
                                                    <input type="text" class="form-control pull-right" name="dateentry" id="datepicker" value="<?= date("d-m-yy H:i", strtotime($trouble->dateentry)); ?>" />
                                                    <div class="input-group-addon">
                                                        <i class="fa fa-calendar"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="container-fluid">
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label>Kind Of Trouble</label>
                                                <select class="form-control" name="kindoftrouble">
                                                    <?php
                                                    if ($trouble->kindoftrouble == 'Trouble') { ?>
                                                        <option value="Trouble" selected>Trouble</option>
                                                        <option value="Preventif Maintenance">Preventif Maintenance</option>
                                                        <option value="Periodical Inspection">Periodical Inspection</option><?php
                                                                                                                        } else if ($trouble->kindoftrouble == 'Periodical Inspection') { ?>
                                                        <option value="Trouble">Trouble</option>
                                                        <option value="Preventif Maintenance">Preventif Maintenance</option>
                                                        <option value="Periodical Inspection" selected>Periodical Inspection</option><?php
                                                                                                                                    } else if ($trouble->kindoftrouble == 'Preventif Maintenance') { ?>
                                                        <option value="Trouble">Trouble</option>
                                                        <option value="Preventif Maintenance" selected>Preventif Maintenance</option>
                                                        <option value="Periodical Inspection">Periodical Inspection</option><?php
                                                                                                                                    } ?>
                                                </select>
                                            </div>
                                            <div class="form-group col-xs-6">
                                                <label>Date Finish</label>
                                                <div class="input-group date">
                                                    <input type="text" class="form-control pull-right" name="datefinish" id="datepickeri" value="<?= date("d-m-yy H:i", strtotime($trouble->datefinish)); ?>" />
                                                    <div class="input-group-addon">
                                                        <i class="fa fa-calendar"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="container-fluid">
                                        <div class="form-row">
                                            <div class="col-lg-3">
                                                <br><br><br><br><br>
                                                <label for="">Part Of Work :</label>
                                            </div>
                                            <div class="col-lg-3">
                                                <div class="row">
                                                    <?php
                                                    $pow = $trouble->partofwork;
                                                    $pisah = explode(";", $pow);

                                                    ?>
                                                    <div class="col-12">
                                                        <label for="pow1">
                                                            <input id="pow1" type="checkbox" name="pow[]" class="flat-red" value="Engine" <?php
                                                                                                                                            for ($i = 0; $i < count($pisah); $i++) {
                                                                                                                                                if ($pisah[$i] == 'Engine') {
                                                                                                                                                    echo "checked";
                                                                                                                                                }
                                                                                                                                            }
                                                                                                                                            ?>>
                                                            Engine
                                                            <?php

                                                            ?>
                                                        </label>
                                                    </div>
                                                    <div class="col-12">
                                                        <label for="pow2">
                                                            <input id="pow2" type="checkbox" name="pow[]" class="flat-red" value="Transmisi" <?php
                                                                                                                                                for ($i = 0; $i < count($pisah); $i++) {
                                                                                                                                                    if ($pisah[$i] == 'Transmisi') {
                                                                                                                                                        echo "checked";
                                                                                                                                                    }
                                                                                                                                                }
                                                                                                                                                ?>>
                                                            Transmisi
                                                        </label>
                                                    </div>
                                                    <div class="col-12">
                                                        <label for="pow3">
                                                            <input id="pow3" type="checkbox" name="pow[]" class="flat-red" value="Brake" <?php
                                                                                                                                            for ($i = 0; $i < count($pisah); $i++) {
                                                                                                                                                if ($pisah[$i] == 'Brake') {
                                                                                                                                                    echo "checked";
                                                                                                                                                }
                                                                                                                                            }
                                                                                                                                            ?>>
                                                            Brake
                                                        </label>
                                                    </div>
                                                    <div class="col-12">
                                                        <label for="pow4">
                                                            <input id="pow4" type="checkbox" name="pow[]" class="flat-red" value="Hydraulic" <?php
                                                                                                                                                for ($i = 0; $i < count($pisah); $i++) {
                                                                                                                                                    if ($pisah[$i] == 'Hydraulic') {
                                                                                                                                                        echo "checked";
                                                                                                                                                    }
                                                                                                                                                }
                                                                                                                                                ?>>
                                                            Hydraulic
                                                        </label>
                                                    </div>
                                                    <div class="col-12">
                                                        <label for="pow5">
                                                            <input id="pow5" type="checkbox" name="pow[]" class="flat-red" value="Attachment" <?php
                                                                                                                                                for ($i = 0; $i < count($pisah); $i++) {
                                                                                                                                                    if ($pisah[$i] == 'Attachment') {
                                                                                                                                                        echo "checked";
                                                                                                                                                    }
                                                                                                                                                }
                                                                                                                                                ?>>
                                                            Attachment
                                                        </label>
                                                    </div>
                                                    <div class="col-12">
                                                        <label for="pow6">
                                                            <input id="pow6" type="checkbox" name="pow[]" class="flat-red" value="Body Chasis" <?php
                                                                                                                                                for ($i = 0; $i < count($pisah); $i++) {
                                                                                                                                                    if ($pisah[$i] == 'Body Chasis') {
                                                                                                                                                        echo "checked";
                                                                                                                                                    }
                                                                                                                                                }
                                                                                                                                                ?>>
                                                            Body Chasis
                                                        </label>
                                                    </div>
                                                    <div class="col-12">
                                                        <label for="pow7">
                                                            <input id="pow7" type="checkbox" name="pow[]" class="flat-red" value="Steering" <?php
                                                                                                                                            for ($i = 0; $i < count($pisah); $i++) {
                                                                                                                                                if ($pisah[$i] == 'Steering') {
                                                                                                                                                    echo "checked";
                                                                                                                                                }
                                                                                                                                            }
                                                                                                                                            ?>>
                                                            Steering
                                                        </label>
                                                    </div>
                                                    <div class="col-12">
                                                        <label for="pow8">
                                                            <input id="pow8" type="checkbox" name="pow[]" class="flat-red" value="Electrical" <?php
                                                                                                                                                for ($i = 0; $i < count($pisah); $i++) {
                                                                                                                                                    if ($pisah[$i] == 'Electrical') {
                                                                                                                                                        echo "checked";
                                                                                                                                                    }
                                                                                                                                                }
                                                                                                                                                ?>>
                                                            Electrical
                                                        </label>
                                                    </div>
                                                    <div class="col-12">
                                                        <label for="pow9">
                                                            <input id="pow9" type="checkbox" name="pow[]" class="flat-red" value="All" <?php
                                                                                                                                        for ($i = 0; $i < count($pisah); $i++) {
                                                                                                                                            if ($pisah[$i] == 'All') {
                                                                                                                                                echo "checked";
                                                                                                                                            }
                                                                                                                                        }
                                                                                                                                        ?>>
                                                            All
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group col-lg-6">
                                                <label>Description</label>
                                                <div class="pull-right">
                                                    <a onclick="removeDesc()" class="btn">
                                                        <i class="fa fa-minus"></i>
                                                    </a>
                                                </div>
                                                <div class="pull-right">
                                                    <a onclick="addDesc()" class="btn">
                                                        <i class="fa fa-plus"></i>
                                                    </a>
                                                </div>
                                                <?php
                                                $desc = $trouble->description;
                                                $pisah = explode(";", $desc);
                                                ?>
                                                <div id="desc">
                                                    <?php
                                                    for ($i = 0; $i < count($pisah); $i++) { ?>
                                                        <input value="<?= $pisah[$i] ?>" type="text" class="form-control" name="description[]" />

                                                    <?php
                                                    }
                                                    ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="container-fluid">
                                        <div class="form-group col-lg-6">
                                            <label>Spare Part</label>
                                            <div class="pull-right">
                                                <a onclick="removeSpare()" class="btn">
                                                    <i class="fa fa-minus"></i>
                                                </a>
                                            </div>
                                            <div class="pull-right">
                                                <a onclick="addSpare()" class="btn">
                                                    <i class="fa fa-plus"></i>
                                                </a>
                                            </div>
                                            <?php
                                            $spare = $trouble->sparepart;
                                            $pisah = explode(";", $spare);
                                            ?>
                                            <div id="spare">
                                                <?php
                                                for ($i = 0; $i < count($pisah); $i++) { ?>
                                                    <input value="<?= $pisah[$i] ?>" type="text" class="form-control" name="sparepart[]" />
                                                <?php
                                                }
                                                ?>
                                            </div>
                                        </div>

                                        <div class="form-row">
                                            <div class="form-group col-lg-6">
                                                <label>Countermeasure</label>
                                                <div class="pull-right">
                                                    <a onclick="removeCount()" class="btn">
                                                        <i class="fa fa-minus"></i>
                                                    </a>
                                                </div>
                                                <div class="pull-right">
                                                    <a onclick="addCount()" class="btn">
                                                        <i class="fa fa-plus"></i>
                                                    </a>
                                                </div>
                                                <?php
                                                $count = $trouble->sparepart;
                                                $pisah = explode(";", $count);
                                                ?>
                                                <div id="count">
                                                    <?php
                                                    for ($i = 0; $i < count($pisah); $i++) { ?>
                                                        <input value="<?= $pisah[$i] ?>" type="text" class="form-control" name="countermeasure[]" />
                                                    <?php
                                                    }
                                                    ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="container-fluid">
                                        <div class="form-row">
                                            <div class="form-group col-xs-6">
                                                <label>Man Power</label>
                                                <a href="" style="visibility: hidden;" class="btn" visible="true">:</a>
                                                <input value="<?= $trouble->manpower ?>" type="text" class="form-control" name="manpower" required />
                                            </div>

                                            <div class="form-group col-xs-6">
                                                <label>Remarks</label>
                                                <a href="" style="visibility: hidden;" class="btn" visible="true">:</a>
                                                <input value="<?= $trouble->remarks ?>" type="text" class="form-control" name="remarks" required />
                                            </div>
                                        </div>
                                    </div>
                                </table>
                                <div class="form-row">
                                    <div class="form-group pull-right">
                                        <button name="edit" style="margin-right: 20px;" class="btn btn-success" type="submit">Submit</button>
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
    <!-- iCheck 1.0.1 -->
    <script src="<?= base_url() ?>assets/plugins/iCheck/icheck.min.js"></script>
    <!-- AdminLTE App -->
    <script src="<?= base_url() ?>assets/dist/js/adminlte.min.js"></script>
    <!-- ChartJS -->
    <script src="<?= base_url() ?>assets/bower_components/chart.js/Chart.js"></script>
    <!-- Native js -->
    <!-- <script src="<?= base_url() ?>assets/js/script.js"></script> -->
    <script src="<?= base_url() ?>node_modules/jquery/dist/jquery.js"></script>
    <script src="<?= base_url() ?>node_modules/jquery-datetimepicker/build/jquery.datetimepicker.full.min.js"></script>
    <script>
        jQuery.datetimepicker.setLocale('id');

        jQuery('#datepicker').datetimepicker({
            i18n: {
                de: {
                    months: [
                        'Januari', 'Februari', 'Maret', 'April',
                        'Mei', 'Juni', 'Juli', 'Agustus',
                        'September', 'Oktober', 'November', 'Desember',
                    ],
                    dayOfWeek: [
                        "Minggu", "Senin", "Selasa", "Rabu",
                        "Kamis", "Jumat", "Sabtu",
                    ]
                }
            },
            timepicker: true,
            format: 'd-m-Y H:i'
        });
        jQuery('#datepickeri').datetimepicker({
            i18n: {
                de: {
                    months: [
                        'Januari', 'Februari', 'Maret', 'April',
                        'Mei', 'Juni', 'Juli', 'Agustus',
                        'September', 'Oktober', 'November', 'Desember',
                    ],
                    dayOfWeek: [
                        "Minggu", "Senin", "Selasa", "Rabu",
                        "Kamis", "Jumat", "Sabtu",
                    ]
                }
            },
            timepicker: true,
            format: 'd-m-Y H:i'
        });

        function resetForm() {
            document.getElementById("form1").reset();
        }

        function addDesc() {
            let desc = document.getElementById("desc");
            desc.insertAdjacentHTML("beforeend", "<input type='text' class='form-control' name='description[]' />");
        }

        function removeDesc() {
            let desc = document.getElementById("desc");
            let last = desc.lastChild;
            desc.removeChild(last);
        }

        function addSpare() {
            let spare = document.getElementById("spare");
            spare.insertAdjacentHTML("beforeend", "<input type='text' class='form-control' name='sparepart[]' />");
        }

        function removeSpare() {
            let spare = document.getElementById("spare");
            let last = spare.lastChild;
            spare.removeChild(last);
        }

        function addCount() {
            let count = document.getElementById("count");
            count.insertAdjacentHTML("beforeend", "<input type='text' class='form-control' name='countermeasure[]' />");
        }

        function removeCount() {
            let count = document.getElementById("count");
            let last = count.lastChild;
            count.removeChild(last);
        }
    </script>
</body>

</html>