<?php
session_start();
date_default_timezone_set('America/Bogota');
if (!isset($_SESSION['log'])) {
  echo "<script type='text/javascript'>  
         window.location.href = '../controlAcceso/?error=expire';
       </script>";
}
 require_once 'Model/Consigna.php';
   $consignas = new Consigna();
    $cons= $consignas->Listar();
    //print_r($cons);
    $num_mensajes=count($cons);

?>
<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>CENSIG | Seguridad Privada</title>
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="View/library/plugins/fontawesome-free/css/all.min.css">
  <!-- SweetAlert2 -->
  <link rel="stylesheet" href="View/library/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
  <!-- Select2 -->
  <link rel="stylesheet" href="View/library/plugins/select2/css/select2.min.css">
  <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="View/library/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
  <!-- Bootstrap4 Duallistbox -->
  <link rel="stylesheet" href="View/library/plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="View/library/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="View/library/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="View/library/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">

  <!-- Theme style -->
  <link rel="stylesheet" href="View/library/dist/css/adminlte.min.css">
  <script src="View/library/plugins/jquery/jquery.min.js"></script>
  <style>
    a {
      outline: none;
      text-decoration: none;
      padding: 2px 1px 0;
    }

    a:link {
      color: #000000;
    }

    a:visited {
      color: gray;
    }

    a:focus {
      border-bottom: 1px solid;
      background: gray;
    }

    a:hover {
      border-bottom: 1px solid;

    }

    .a {
      pointer-events: none;
    }

    .fixed {
      position: relative;
      top: 20
    }
  </style>

</head>

<body class="hold-transition layout-top-nav">
  <div class="wrapper">
    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand-md navbar-light navbar-white fixed">
      <div class="container">
        <a href="#" class="navbar-brand a">
          <img src="View/library/dist/img/logoCensig.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
          <span class="brand-text font-weight-light">Seguridad</span>
        </a>
        <button class="navbar-toggler order-1" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse order-3" id="navbarCollapse">
          <!-- Left navbar links -->
          <ul class="navbar-nav">
            <li class="nav-item">
              <a href="?c=accesopersonas&a=dashboard" class="nav-link">Acceso Personal</a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">Acceso Vehicular</a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">Informes</a>
            </li>
            <li class="nav-item dropdown">
              <a id="dropdownSubMenu1" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle">Configuración</a>
              <ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow">
                <li><a href="?c=condominios&a=dashboard" class="dropdown-item">Administración</a></li>
                <li><a href="?c=usuarios&a=personas" class="dropdown-item">Usuario</a></li>
                <li><a href="?c=seguridad&a=dashboard" class="dropdown-item">Permisos</a></li>
                <li><a href="#" class="dropdown-item">E. Seguridad</a></li>
                <li><a href="#" class="dropdown-item">Tipo Vehiculos</a></li>
                <li><a href="#" class="dropdown-item">Tipo Inmuebles</a></li>
                <li><a href="?c=consignas&a=index" class="dropdown-item">Consignas</a></li>
                <li><a href="?c=minutas&a=index" class="dropdown-item">Minuta</a></li>
                <li><a href="?c=correspondencias&a=index" class="dropdown-item">Correspondencia</a></li>
                <!--<li class="dropdown-divider"></li>
               Level two dropdown
              <li class="dropdown-submenu dropdown-hover">
                <a id="dropdownSubMenu2" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-item dropdown-toggle">Hover for action</a>
                <ul aria-labelledby="dropdownSubMenu2" class="dropdown-menu border-0 shadow">
                  <li>
                    <a tabindex="-1" href="#" class="dropdown-item">level 2</a>
                  </li>

                  <!-- Level three dropdown
                  <li class="dropdown-submenu">
                    <a id="dropdownSubMenu3" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-item dropdown-toggle">level 2</a>
                    <ul aria-labelledby="dropdownSubMenu3" class="dropdown-menu border-0 shadow">
                      <li><a href="#" class="dropdown-item">E. Seguridad</a></li>
                      <li><a href="#" class="dropdown-item">Tipo Vehiculos</a></li>
                      <li><a href="#" class="dropdown-item">Tipo Inmuebles</a></li>
                    </ul>
                  </li>
                  <!-- End Level three 

                  <li><a href="#" class="dropdown-item">level 2</a></li>
                  <li><a href="#" class="dropdown-item">level 2</a></li>
                </ul>
              </li>-->
                <!-- End Level two -->
              </ul>
            </li>
          </ul>
        </div>
        <!-- Right navbar links -->
        <ul class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto">
          <!-- Messages Dropdown Menu --->          
          <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#">
              <i class="far fa-comments"></i>
              <span class="badge badge-danger navbar-badge"><?php echo $num_mensajes ?></span>
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
              <a href="#" class="dropdown-item">
                <!-- Message Start -->
                <?php foreach($cons as $con): ?>
                <div class="media">
                  <img src="../../dist/img/user1-128x128.jpg" alt="User" class="img-size-50 mr-3 img-circle">
                  <div class="media-body">
                    <h3 class="dropdown-item-title">
                      <?php echo $con->fullname; ?>
                      <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
                    </h3>
                    <p class="text-sm"><?php echo substr($con->consigna, 0,60); ?></p>
                    <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> <?php echo $con->fecha_reg; ?></p>
                  </div>
                </div>
                <?php endforeach;?>
                <!-- Message End -->
              </a>
              <div class="dropdown-divider"></div>
               <!-- Message End -->
              </a>
              <div class="dropdown-divider"></div>
              <a href="#" class="dropdown-item dropdown-footer">Ver Todas</a>
            </div>
            <li class="nav-item dropdown">
            <a class="nav-link a" data-toggle="dropdown" href="#">
              <i class="fas fa-user" style="color:green"> <?php echo strtoupper($_SESSION['full_name']); ?><br> <?php echo  $_SESSION['datosinfra']->nombre ?></i>
            </a>
          </li>
          <li class="nav-item">
            <a href="?c=seguridad&a=logout" class="nav-link"> <i class="fas fa-power-off" style="color:red"></i></a>
          </li>

          </li>


      </div>
    </nav>
    <!-- /.navbar -->
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <div class="content-header">
        <div class="container">
          <script>
            $(function() {
              //Initialize Select2 Elements
              $('.select2').select2()

              //Initialize Select2 Elements
              $('.select2bs4').select2({
                theme: 'bootstrap4'
              });
            });
          </script>