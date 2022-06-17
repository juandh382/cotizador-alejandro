<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Creative - Bootstrap 3 Responsive Admin Template">
    <meta name="author" content="GeeksLabs">
    <meta name="keyword" content="Creative, Dashboard, Admin, Template, Theme, Bootstrap, Responsive, Retina, Minimal">
  <!--  <link rel="shortcut icon" href="assets/img/Waterfalls-Scenery-Wallpaper-1.jpg">  -->

    <title>Sistema Cotizaciones</title>
    <!-- Bootstrap W3Schools -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    
    <!-- DT --> 
    <link rel="stylesheet" href="assets/css/jquery.dataTables.min.css">
    <script src="//cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script> 
    <!-- Bootstrap CSS -->    
    <!-- <link href="css/bootstrap.min.css" rel="stylesheet">  -->
    <!-- bootstrap theme -->
   <!-- <link href="css/bootstrap-theme.css" rel="stylesheet">  -->
    <!--external css-->
    <!-- font icon -->
    <link href="assets/css/elegant-icons-style.css" rel="stylesheet" />
    <link href="assets/css/font-awesome.min.css" rel="stylesheet" />    
    <!-- easy pie chart-->
	<link href="assets/css/widgets.css" rel="stylesheet">
        <link href="assets/css/style.css" rel="stylesheet">
        <link href="assets/css/style-responsive.css" rel="stylesheet" />
	<link href="assets/css/xcharts.min.css" rel=" stylesheet">	
<!--	<link href="assets/css/jquery-ui-1.10.4.min.css" rel="stylesheet">  -->
    <!-- =======================================================
        Theme Name: NiceAdmin
        Theme URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
        Author: BootstrapMade
        Author URL: https://bootstrapmade.com
    ======================================================= -->
     <!-- Código JQuery y Ajax DT-->
 <script>
    $(document).ready(function(){
    $('#tablaUsuarios').DataTable({
        "language": {
            "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
        }
        }),
        $(".modificar").click(handlerClickEditButton);   

            
        function handlerClickEditButton(e) {
            e.preventDefault();
            window.scroll(0, window.outerHeight);
            $.ajax({
                type: "GET",
                url: "../Controlador/ajax/datosUsuario.php?idUsuario=" + this.id,
                success: function (data) {
                //alert(data);
                var result = $.parseJSON(data);
                $("#idUsuario").val(result.idUsuario);
                $("#nombre").val(result.nombre);
                $("#perfil").val(result.perfil);
                $("#accion").val("modificar");
                },
            });
        }       
    });
  </script>
  </head>  
  <body style="color: black">
  <!-- container section start -->  