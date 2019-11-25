<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Sistema de Ventas | Dashboard</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="<?php echo base_url();?>assets/template/bootstrap/css/bootstrap.min.css">
     <!-- DataTables -->
    <link rel="stylesheet" href="<?php echo base_url();?>assets/template/datatables.net-bs/css/dataTables.bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?php echo base_url();?>assets/template/font-awesome/css/font-awesome.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo base_url();?>assets/template/dist/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
    folder instead of downloading all of them to reduce the load. -->
	<link rel="stylesheet" href="<?php echo base_url();?>assets/template/dist/css/skins/_all-skins.min.css">

</head>
<body class="hold-transition skin-blue sidebar-mini">
    <!-- Site wrapper -->
    <div class="wrapper">
        <header class="main-header">
            <!-- Logo -->
            <a href="../../index2.html" class="logo">
                <!-- mini logo for sidebar mini 50x50 pixels -->
                <span class="logo-mini"><b>M</b>E</span>
                <!-- logo for regular state and mobile devices -->
                <span class="logo-lg"><b>MAGVE Eventos</b></span>
            </a>
            <!-- Header Navbar: style can be found in header.less -->
            <nav class="navbar navbar-static-top">
                <!-- Sidebar toggle button-->
                <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                    <span class="sr-only">Toggle navigation</span>
                </a>
                <div class="navbar-custom-menu">
                    <ul class="nav navbar-nav">
                        <!-- carrito de compras -->
                        <li class="nav-item dropdown">
                            <a class="nav-link" data-toggle="dropdown" href="#">
                                <i class="fa fa-shopping-cart"></i>
                                <span class="badge badge-warning navbar-badge">3</span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right" style="padding:15px;width:300px;">
                                <span class="dropdown-item dropdown-header">Carrito de compras</span>
                                <div class="dropdown-divider"></div>
                                <hr style="padding:0;margin:10px;">

                                <a href="#" class="dropdown-item" style="color:#333;">
                                    <span class="" style="display:block"><i class="fa fa-check"></i> Local Las Torres</span>
                                    <span class="float-right text-muted text-sm">Servicio</span>
                                </a>
                                <a href="#" class="dropdown-item" style="color:#333;">
                                    <span class="" style="display:block"><i class="fa fa-check"></i> Paquete de fotografía</span>
                                    <span class="float-right text-muted text-sm">Servicio</span>
                                </a>
                                <hr>
                                <div>
                                <a href="#" style="font-size:13px;float:left;">Ver todo</a>
                                <a href="#" style="font-size:13px;float:right;">Pagar</a>
                                </div>
                            </div>
                        </li>
                        <!-- fin carrito de compras -->
                        <!-- User Account: style can be found in dropdown.less -->
                        <li class="dropdown user user-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <img src="<?php echo base_url()?>assets/template/dist/img/user2-160x160.jpg" class="user-image" alt="User Image">
                                <span class="hidden-xs"><?php echo $this->session->userdata("nombre")?></span>
                            </a>
                            <ul class="dropdown-menu">
                                <li class="user-body">
                                    <div class="row">
                                        <div class="col-xs-12 text-center">
                                            <a href="<?php echo base_url(); ?>auth/logout"> Cerrar Sesión</a>
                                        </div>
                                    </div>
                                    <!-- /.row -->
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>

        <!-- Left side column. contains the sidebar -->
        <aside class="main-sidebar">
            <!-- sidebar: style can be found in sidebar.less -->
            <section class="sidebar">      
                <!-- sidebar menu: : style can be found in sidebar.less -->
                <ul class="sidebar-menu" data-widget="tree">
                    <li class="header">Modulos</li>
                    <li>
                        <a href="<?php echo base_url('ventas'); ?>">
                            <i class="fa fa-cubes"></i>
                            Servicios
                        </a>
                    </li>  
                    <li>
                        <a href="<?php echo base_url('sistema/clientes'); ?>">
                            <i class="fa fa-group"></i>
                            Clientes
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo base_url('sistema/clientes'); ?>">
                            <i class="fa fa-truck"></i>
                            Proveedores
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo base_url('sistema/cotizaciones'); ?>">
                            <i class="fa fa-cube"></i>
                            Cotización
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo base_url('ventas'); ?>">
                            <i class="fa fa-shopping-bag"></i>
                            Ventas
                        </a>
                    </li>                
                </ul>
            </section>
            <!-- /.sidebar -->
        </aside>
