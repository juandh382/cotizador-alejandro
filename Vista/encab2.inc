<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Creative - Bootstrap 3 Responsive Admin Template">
    <meta name="author" content="GeeksLabs">
    <meta name="keyword" content="Creative, Dashboard, Admin, Template, Theme, Bootstrap, Responsive, Retina, Minimal">
    <link rel="shortcut icon" href="img/Waterfalls-Scenery-Wallpaper-1.jpg">

    <title>Buffet Duralex</title>
    <!-- Bootstrap W3Schools -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    
    <!-- DT --> 
    <link rel="stylesheet" href="css/jquery.dataTables.min.css">
    <script src="//cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script> 
    <!-- Bootstrap CSS -->    
    <!-- <link href="css/bootstrap.min.css" rel="stylesheet">  -->
    <!-- bootstrap theme -->
   <!-- <link href="css/bootstrap-theme.css" rel="stylesheet">  -->
    <!--external css-->
    <!-- font icon -->
    <link href="css/elegant-icons-style.css" rel="stylesheet" />
    <link href="css/font-awesome.min.css" rel="stylesheet" />    
    <!-- full calendar css-->
    <link href="assets/fullcalendar/fullcalendar/bootstrap-fullcalendar.css" rel="stylesheet" />
	<link href="assets/fullcalendar/fullcalendar/fullcalendar.css" rel="stylesheet" />
    <!-- easy pie chart-->
    <link href="assets/jquery-easy-pie-chart/jquery.easy-pie-chart.css" rel="stylesheet" type="text/css" media="screen"/>
    <!-- owl carousel -->
    <link rel="stylesheet" href="css/owl.carousel.css" type="text/css">
	<link href="css/jquery-jvectormap-1.2.2.css" rel="stylesheet">
    <!-- Custom styles -->
	<link rel="stylesheet" href="css/fullcalendar.css">
	<link href="css/widgets.css" rel="stylesheet">
        <link href="css/style.css" rel="stylesheet">
        <link href="css/style-responsive.css" rel="stylesheet" />
	<link href="css/xcharts.min.css" rel=" stylesheet">	
<!--	<link href="css/jquery-ui-1.10.4.min.css" rel="stylesheet">  -->
    <!-- =======================================================
        Theme Name: NiceAdmin
        Theme URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
        Author: BootstrapMade
        Author URL: https://bootstrapmade.com
    ======================================================= -->
     <!-- Código JQuery y Ajax DT-->
 <script>
    $(document).ready(function(){
    $('#tablaClientes').DataTable({
        "language": {
            "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
        }
        }),
        $(".modificar").click(function(){
            $.ajax({
               type: "GET",
               url: "../Controlador/ajax/datosCliente.php?idCliente="+this.id,
               success : function(data){
                   //alert(data);
                   var result=$.parseJSON(data);
                   $("#idCliente").val(result.idCliente);
                   $("#rutCliente").val(result.rutCliente);
                   $("#nombreCompleto").val(result.nombreCompleto);
                   $("#fechaIncorporacion").val(result.fechaIncorporacion);
                   $("#tipoPersona").val(result.tipoPersona);
                   $("#direccion").val(result.direccion);
                   $("#telefono").val(result.telefono);
                   $("#accion").val("modificar");
               }
            });        
            });          
    });
  </script>
  </head>  
  <body style="color: black">
  <!-- container section start -->  
  <section id="container" class="">