<?php

session_start();

 /* echo "hola mundo";  */
require('../Modelo/Conexion.php');

/* Crear objeto de esta clase */
$db = new Conexion();
$db->conn();

/* Crear objeto de tipo usuario */
require('../Modelo/usuario.class.php');
$usuario = new usuario();
   
 /*   if($usuario ->validar("admin", "123")){
     echo "bienvenido";   
    }else{
        echo "no puede entrar";
    };
  */
$objUsuario = $usuario->validar( $_POST['nombre'], $_POST['pwd']);

if ($objUsuario){
 
   /* echo "Login OK";  */    
   require('../Modelo/sesion.class.php');
    $sesion = new sesion();
    $sesion->iniciar(); 
  
     
    // header('Location: https://www.stbmsgingenieria.cl/cotizaciones/Vista/index.php?'.SID);
    // var_dump($_SESSION);
    // exit;
    
    echo '<script>window.location = "https://www.stbmsgingenieria.cl/cotizaciones/Vista/index.php" </script>';

    
    exit;  
     
       
}else{
   /* echo "Login fail!!";  */

    // header('Location: https://www.stbmsgingenieria.cl/cotizaciones/Vista/login.php?error=1');   
    echo '<script>window.location = "https://www.stbmsgingenieria.cl/cotizaciones/Vista/login.php?error=1" </script>';
    exit;
};

?>