<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>HOSL - Sistema de Manutenção</title>
        <!-- Tell the browser to be responsive to screen width -->
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <link rel="icon" type="image/png" href="<?= base_url('assets/img/favicon.png') ?>">
        <!-- Bootstrap 3.3.7 -->
        <link rel="stylesheet" href="<?= base_url('assets/bower_components/bootstrap/dist/css/bootstrap.min.css'); ?>">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="<?= base_url('assets/bower_components/font-awesome/css/font-awesome.min.css'); ?>">
        <!-- Ionicons -->
        <link rel="stylesheet" href="<?= base_url('assets/bower_components/Ionicons/css/ionicons.min.css'); ?>">
        <!-- jvectormap -->
        <link rel="stylesheet" href="<?= base_url('assets/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css'); ?>">
        <!-- Theme style -->
        <link rel="stylesheet" href="<?= base_url('assets/dist/css/AdminLTE.min.css'); ?>">
        <!-- AdminLTE Skins. Choose a skin from the css/skins
             folder instead of downloading all of them to reduce the load. -->
        <link rel="stylesheet" href="<?= base_url('assets/dist/css/skins/_all-skins.css'); ?>">
        
        <link rel="stylesheet" href="<?= base_url('assets/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css'); ?>">
        
        <link rel="stylesheet" href="<?= base_url('assets/bower_components/select2/dist/css/select2.min.css'); ?>">

        <script src="<?= base_url('assets/bower_components/jquery/dist/jquery.min.js'); ?>"></script>
        <!-- Bootstrap 3.3.7 -->
        <script src="<?= base_url('assets/bower_components/bootstrap/dist/js/bootstrap.min.js'); ?>"></script>
        
        <script src="<?= base_url('assets/bower_components/select2/dist/js/select2.full.min.js'); ?>"></script>
        
        <script src="<?= base_url('assets/plugins/input-mask/jquery.inputmask.js'); ?>"></script>
        <script src="<?= base_url('assets/plugins/input-mask/jquery.inputmask.date.extensions.js'); ?>"></script>
        <script src="<?= base_url('assets/plugins/input-mask/jquery.inputmask.extensions.js'); ?>"></script>
        
        <script src="<?= base_url('assets/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js'); ?>"></script>
        <!-- FastClick -->
        <script src="<?= base_url('assets/bower_components/fastclick/lib/fastclick.js'); ?>"></script>
        <!-- AdminLTE App -->
        <script src="<?= base_url('assets/dist/js/adminlte.min.js'); ?>"></script>
        <!-- Sparkline -->
        <script src="<?= base_url('assets/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js'); ?>"></script>
        <!-- SlimScroll -->
        <script src="<?= base_url('assets/bower_components/jquery-slimscroll/jquery.slimscroll.min.js'); ?>"></script>
        <!-- ChartJS -->
        <script src="<?= base_url('assets/bower_components/chart.js/Chart.js'); ?>"></script>

        <script src="<?= base_url('assets/bower_components/datatables.net/js/jquery.dataTables.min.js'); ?>"></script>
        <script src="<?= base_url('assets/bower_components/datatables.net-bs/js/dataTables.bootstrap.js'); ?>"></script>
   

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->

        <!-- Google Font -->
        <link rel="stylesheet"
              href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
    </head>
    <body class="hold-transition skin-red-light sidebar-mini">
        <div class="wrapper">

            <header class="main-header">

                <!-- Logo -->
                <a href="#" class="logo">
                    <span class="logo-mini"><img src="<?= base_url('assets/img/logo-hosl-white.svg') ?>" height="35px" width="45px"></span>
                    <span class="logo-lg"><img src="<?= base_url('assets/img/logo-hosl-white.svg') ?>" height="45px" width="160px"></span>
                </a>

                <!-- Header Navbar: style can be found in header.less -->
                <nav class="navbar navbar-static-top">
                    <!-- Sidebar toggle button-->
                    <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                        <span class="sr-only">Toggle navigation</span>
                    </a>
                    <ul class="nav navbar-nav navbar-left">
                        <li><a href="#">SISTEMA DE MANUTENÇÃO</a></li>
                    </ul>

                    <!-- Navbar Right Menu -->
                    <div class="navbar-custom-menu">
                        <ul class="nav navbar-nav">
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Menu <span class="caret"></span></a>
                                <ul class="dropdown-menu" role="menu">
                                    <li><a href="<?= base_url('auth/change_password')?>">Alterar senha</a></li>
                                    <!--<li><a href="#">Configurações</a></li>-->
                                    <li class="divider"></li>
                                    <li><a href="<?= base_url('auth/logout')?>">Sair do sistema</a></li>
                                </ul>
                            </li>

                        </ul>
                    </div>

                </nav>
            </header>
            <!-- Left side column. contains the logo and sidebar -->
            <aside class="main-sidebar">
                <!-- sidebar: style can be found in sidebar.less -->
                <section class="sidebar">
                    <!-- Sidebar user panel -->
                    <!-- sidebar menu: : style can be found in sidebar.less -->
                    <ul class="sidebar-menu" data-widget="tree">
                        <li class="header"></li>
                        <li>
                            <a href="<?= base_url('hosl'); ?>">
                                <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                            </a>
                        </li>
                        <li class="treeview">
                            <a href="#">
                                <i class="fa fa-files-o"></i>
                                <span>Chamados</span>
                                <span class="pull-right-container">
                                    <i class="fa fa-angle-left pull-right"></i>
                                </span>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="<?= base_url('chamados')?>"><i class="fa fa-circle-o"></i> Chamados</a></li>
                                <li><a href="<?= base_url('chamados/listaFinalizados')?>"><i class="fa fa-circle-o"></i> Chamados Finalizados</a></li>
                            </ul>
                        </li>
                        <?php if ($this->ion_auth->is_admin()){ ?>
                        <li class="treeview">
                            <a href="#">
                                <i class="fa fa-table"></i>
                                <span>Cadastros</span>
                                <span class="pull-right-container">
                                    <i class="fa fa-angle-left pull-right"></i>
                                </span>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="<?= base_url('colaboradores') ?>"><i class="fa fa-circle-o"></i> Colaboradores</a></li>
                                <li><a href="<?= base_url('unidades') ?>"><i class="fa fa-circle-o"></i> Unidades</a></li>
                                <li><a href="<?= base_url('setores') ?>"><i class="fa fa-circle-o"></i> Setores</a></li>
                                <li><a href="<?= base_url('auth/index')?>"><i class="fa fa-circle-o"></i> Usuários</a></li>
                            </ul>
                        </li>
                        <?php } ?>
                        <li class="treeview">
                            <a href="#">
                                <i class="fa fa-book"></i>
                                <span>Relatórios</span>
                                <span class="pull-right-container">
                                    <i class="fa fa-angle-left pull-right"></i>
                                </span>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="#"><i class="fa fa-circle-o"></i> Chamados por período</a></li>
                                <li><a href="#"><i class="fa fa-circle-o"></i> Chamados por responsável</a></li>
                                <li><a href="#"><i class="fa fa-circle-o"></i> Chamados por unidade</a></li>
                            </ul>
                        </li>

                    </ul>
                </section>
                <!-- /.sidebar -->
            </aside>
            <div class="content-wrapper">

