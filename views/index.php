<?php

session_start();


require('../config/constants.php');
require('../models/sesion.class.php');

$sesion = new sesion();

if (!$sesion->validar()) {

  echo '<script>window.location = "' . DOMAIN . '/cotizaciones/views/login.php?error=2" </script>';
  exit;
}

require('../models/Conexion.php');
$db = new Conexion();
$db->conn();
require('../models/usuario.class.php');
$usuario = new usuario();
$data = $usuario->obtenerUsuarios();
$flagAlerta = false;

$user = $_SESSION['usuario'];
$perfil = $usuario->getUserProfile($user);


?>

<?php require_once 'layout/head.php'; ?>
  <!-- container section start -->
  <section id="container" class="">
     
      <?php require_once 'layout/header.php'; ?>

      <!--sidebar start-->
      <?php require_once 'layout/sidebar.php'; ?>
      <!--sidebar end-->
      
      <!--main content start-->
      <section id="main-content">
          <section class="wrapper">            
              <!--overview start-->
			  <div class="row">
				<div class="col-lg-12">
					<h3 class="page-header"><i class="fa fa-laptop"></i> Dashboard</h3>
					<ol class="breadcrumb">
						<li><i class="fa fa-home"></i><a href="index.php">Home</a></li>
						<li><i class="fa fa-laptop"></i>Dashboard</li>						  	
					</ol>
				</div>
			</div>          
          </section>
          <div class="text-right">       
        </div>
      </section>
      <!--main content end-->
  </section>
  <!-- container section start -->

  <?php require_once 'layout/footer.php'; ?>