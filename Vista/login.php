<?php
$flagError=false;

if(isset($_GET['error']) && ($_GET['error'] == 1)){
    $msgError = "Usuario/Contraseña no coinciden";    
    $flagError=true;
}

if(isset($_GET['error']) && ($_GET['error'] == 2)){
    $msgError = "Debe iniciar sesión antes de entrar";    
    $flagError=true;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Creative - Bootstrap 3 Responsive Admin Template">
    <meta name="author" content="GeeksLabs">
    <meta name="keyword" content="Creative, Dashboard, Admin, Template, Theme, Bootstrap, Responsive, Retina, Minimal">
    <link rel="shortcut icon" href="assets/img/Waterfalls-Scenery-Wallpaper-1.jpg">

    <title>Iniciar sesión</title>
    <!-- Bootstrap W3Schools -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    
    <!-- Bootstrap CSS -->     
  <!--  <link href="assets/css/bootstrap.min.css" rel="stylesheet">  -->
    <!-- bootstrap theme -->
    <link href="assets/css/bootstrap-theme.css" rel="stylesheet">   
    <!--external css-->
    <!-- font icon -->
    <link href="assets/css/elegant-icons-style.css" rel="stylesheet" />
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <!-- Custom styles -->
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/css/style-responsive.css" rel="stylesheet" />

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 -->
    <!--[if lt IE 9]>
    <script src="assets/js/html5shiv.js"></script>
    <script src="assets/js/respond.min.js"></script>
    <![endif]-->
</head>

  <body class="login-img3-body">
    <div class="container">         
        <form class="login-form" action="../Controlador/validar.php" method="POST">             
        <div class="login-wrap">
<?php 
        if ($flagError){ ?>
        <div class="alert alert-danger alert-dismissable" style="width: 301.990908px">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <strong>ERROR!</strong> <?php echo $msgError; ?>
       </div>
     <?php } ?>            
            <p class="login-img"><i class="icon_lock_alt"></i></p>              
            <div class="input-group">
              <span class="input-group-addon"><i class="icon_profile"></i></span>
              <input type="text" class="form-control" name="nombre" placeholder="Usuario" autofocus >
            </div>
            <div class="input-group">
                <span class="input-group-addon"><i class="icon_key_alt"></i></span>
                <input type="password" class="form-control" name="pwd" placeholder="Contraseña">
            </div>
            <div class="form-group">                
                <span class="pull-right"> <a href="#">¿Olvidaste la contraseña?</a></span>
            </div><br>
            <button class="btn btn-primary btn-lg btn-block" type="submit">Enviar</button>
        
        </form>
    </div>


  </body>
</html>
