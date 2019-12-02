<!DOCTYPE html>
<html>
<head>
   <meta charset="utf-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <title>AdminLTE 3 | Legacy User Menu</title>
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="stylesheet" href="<?php echo base_url('assets/adminlte-3.0.1/'); ?>plugins/fontawesome-free/css/all.min.css">
   <link rel="stylesheet" href="<?php echo base_url('assets/adminlte-3.0.1/'); ?>dist/css/adminlte.min.css">
   <!--<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">-->
   <!-- Ion Slider -->
  <link rel="stylesheet" href="<?php echo base_url('assets/adminlte-3.0.1/'); ?>plugins/ion-rangeslider/css/ion.rangeSlider.min.css">
   <!-- custom css load --> 
   <?php

      // Cargamos de forma dinamica el archivo CSS para esta vista
      $ruta = ($this->router->fetch_method() == 'vista') ? $this->uri->segment(2) : $this->router->fetch_method();
      $CSSFile = base_url().'assets/css/'.$this->router->fetch_class().'/'.$ruta.'.css';
      echo '<link rel="stylesheet" href="'.$CSSFile.'">';


      // Requerimos la clase Cart para hacer uso de sus metodos para el conteo
      // global de items
      require_once(APPPATH.'/controllers/sistema/Cart.php');
   ?>
</head>
<body class="hold-transition sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">
  	<!-- Navbar -->
  	<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    	<!-- Left navbar links -->
    	<ul class="navbar-nav">
      	<li class="nav-item">
        		<a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
      	</li>
    	</ul>

    	<!-- SEARCH FORM -->
    	<form class="form-inline ml-3">
      	<div class="input-group input-group-sm">
        		<input class="form-control form-control-navbar" type="search" placeholder="Busqueda" aria-label="Search">
        		<div class="input-group-append">
							<button class="btn btn-navbar" type="submit">
								<i class="fas fa-search"></i>
							</button>
						<input hidden type="text" id="base_url" value="<?php echo base_url();?>">
      		</div>
      	</div>
    	</form>

    	<!-- Right navbar links -->
    	<ul class="navbar-nav ml-auto">
			<!-- ================================================== -->
			<!-- Mensajes y notificaciones -->
			<!-- ================================================== -->
			<li class="nav-item dropdown">
        		<a class="nav-link" data-toggle="dropdown" href="#">
          		<i class="fas fa-envelope"></i>
          		<span class="badge badge-warning navbar-badge">3</span>
        		</a>
        		<div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          		<a href="#" class="dropdown-item">
            		<!-- Message Start -->
            		<div class="media">
              			<img src="<?php echo base_url('assets/adminlte-3.0.1/'); ?>dist/img/user1-128x128.jpg" alt="User Avatar" class="img-size-50 mr-3 img-circle">
              			<div class="media-body">
                			<h3 class="dropdown-item-title">
                  			Brad Diesel
                  			<span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
                			</h3>
                			<p class="text-sm">Call me whenever you can...</p>
                			<p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
              			</div>
								</div>
            		<!-- Message End -->
          		</a>
          		<div class="dropdown-divider"></div>
          		<a href="#" class="dropdown-item dropdown-footer">Ver todos los mensajes</a>
        		</div>
      	</li>

      <!-- ================================================== -->
      <!-- Carrito de compras -->
      <!-- ================================================== -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="fas fa-shopping-cart"></i>
          <span class="badge badge-success navbar-badge">
            <?php
              if(null !== $this->session->userdata('cart')){
                $items = array_values(unserialize($this->session->userdata('cart')));
                $s = 0;
                foreach ($items as $item) {
                    $s += 1 * $item['quantity'];
                }
                echo $s;
              }else{
                echo '0';
              }
            ?>
          </span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <span class="dropdown-item dropdown-header">Productos agregados</span>

          <!--- ITEMS DEL CARRITO EN MENU SUPERIOR -->
          <?php 
          if(isset($items)){
            foreach ($items as $item) { ?>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item">
              <i class="fas fa-cube mr-2"></i>
              <?php echo $item['name']; ?>
              <span class="float-right text-muted text-sm"><?php echo $item['quantity']; ?></span>
            </a>
            <?php } ?>
            <?php }else{ ?>
              <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item">
              No hay productos en el carrito
            </a>
          <?php } ?>
          <!--- ITEMS DEL CARRITO EN MENU SUPERIOR -->

          <div class="dropdown-divider"></div>
          <a href="<?php echo base_url('carrito'); ?>" class="dropdown-item dropdown-footer">Ver todo el carrito</a>
        </div>
      </li>

        <!-- ================================================== -->
        <!-- Navegacion arrba a la derecha usuario -->
        <!-- ================================================== -->
      <li class="nav-item dropdown user-menu">
        <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
          <img src="<?php echo base_url('assets/adminlte-3.0.1/'); ?>dist/img/user2-160x160.jpg" class="user-image img-circle elevation-2" alt="User Image">
          <span class="d-none d-md-inline"><?php echo $this->session->userdata("nombre")?></span>
        </a>
        <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <!-- User image -->
          <li class="user-header bg-primary">
            <img src="<?php echo base_url('assets/adminlte-3.0.1/'); ?>dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
            <p><?php echo $this->session->userdata("nombre")?> - Web Developer<small>Activo desde Nov. 26, 2019.</small></p>
          </li>
          <!-- Menu Body -->
          <!--<li class="user-body">
            <div class="row">
              <div class="col-4 text-center">
                <a href="#">Ventas</a>
              </div>
              <div class="col-4 text-center">
                <a href="#">Ventas</a>
              </div>
              <div class="col-4 text-center">
                <a href="#">Pendiente</a>
              </div>
            </div>
          </li>-->
          <!-- Menu Footer-->
          <li class="user-footer">
            <a href="#" class="btn btn-default btn-flat">Perfil</a>
						<a href="<?php echo base_url(); ?>auth/logout" class="btn btn-default btn-flat float-right">Salir</a>
          </li>
        </ul>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->



    <!-- ================================================== -->
    <!-- Navegacion barra izquierda principal -->
    <!-- ================================================== -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="../../index3.html" class="brand-link">
      <img src="<?php echo base_url('assets/adminlte-3.0.1/'); ?>dist/img/AdminLTELogo.png"
           alt="AdminLTE Logo"
           class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">Magve Eventos</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
            <!-- <li class="nav-item">
                <a href="../widgets.html" class="nav-link">
                    <i class="nav-icon fas fa-home"></i>
                    <p>Panel principal<span class="right badge badge-info">Nuevo</span></p>
                </a>
            </li> -->

            <!-- termina link -->
            <li class="nav-header">SISTEMA</li>
            <li class="nav-item">
                <a href="<?php echo base_url('servicios'); ?>" class="nav-link">
                    <i class="nav-icon fas fa-cube"></i>
                    <p>Servicios<span class="right badge badge-info">6</span></p>
                </a>
            </li>

          <!-- Termina link --> 

            <li class="nav-item">
                <a href="<?php echo base_url('sistema/cart'); ?>" class="nav-link">
                    <i class="nav-icon fas fa-cubes"></i>
                    <p>Cotizar<span class="right badge badge-warning">1</span></p>
                </a>
            </li>

          <!-- Termina link -->

            <li class="nav-item">
                <a href="<?php echo base_url('ventas'); ?>" class="nav-link">
                    <i class="nav-icon fas fa-shopping-bag"></i>
                    <p>Ventas<span class="right badge badge-danger"></span></p>
                </a>
            </li>

					<!-- Termina link --> 
					
					
					<li class="nav-item">
                <a href="<?php echo base_url('clientes'); ?>" class="nav-link">
                    <i class="nav-icon fas fa-shopping-bag"></i>
                    <p>Clientes<span class="right badge badge-danger"></span></p>
                </a>
            </li>

          <!-- Termina link --> 
          <li class="nav-header">PERSONAS</li>

          <li class="nav-item has-treeview">
                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-users"></i>
                    <p>
                        Clientes
                        <i class="fas fa-angle-left right"></i>
                        <span class="badge badge-info right"><!-- numero --></span>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Todos los proveedores</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="../layout/boxed.html" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Alta de proveedores</p>
                        </a>
                    </li>
                </ul>
            </li>

            <!-- Termina link -->
            
            <li class="nav-item has-treeview">
                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-truck"></i>
                    <p>
                        Proveedores
                        <i class="fas fa-angle-left right"></i>
                        <span class="badge badge-info right"><!-- numero --></span>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Todos los proveedores</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="../layout/boxed.html" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Alta de proveedores</p>
                        </a>
                    </li>
                </ul>
            </li>

            <!-- Termina link --> 

            <li class="nav-item has-treeview">
                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-user-shield"></i>
                    <p>
                        Usuarios
                        <i class="fas fa-angle-left right"></i>
                        <span class="badge badge-info right"><!-- numero --></span>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Todos los proveedores</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="../layout/boxed.html" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Alta de proveedores</p>
                        </a>
                    </li>
                </ul>
            </li>

            <!-- Termina link --> 
          
          <li class="nav-header">OTROS ENLACES</li>
          <li class="nav-item">
            <a href="https://adminlte.io/docs/3.0" class="nav-link">
              <i class="nav-icon fas fa-file"></i>
              <p>Acerca de</p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid"><!----- HEADER ---->
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1><?= $title; ?></h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Ruta</a></li>
              <li class="breadcrumb-item active">Sistema</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
