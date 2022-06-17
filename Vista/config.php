<?php

/**
 * Produccion
 */

$host = "127.0.0.1"; 
$dbuser = "cst64046_aleja"; 
$dbpwd = "Orquidea123";
$db = "cst64046_tutoriales";

/**
 * Desarrollo
 */

// $host = "127.0.0.1"; 
// $dbuser = "root"; 
// $dbpwd = "";
// $db = "tutoriales";

/*$connect = mysql_connect ($host, $dbuser, $dbpwd);
	if(!$connect)
		echo ("No se ha conectado a la base de datos");
	else
		$select = mysql_select_db ($db);  

*/
   $obj_conexion = 
    mysqli_connect($host,$dbuser,$dbpwd,$db);
    if(!$obj_conexion)
    {
        echo "<h3>No se ha podido conectar PHP - MySQL, verifique sus datos.</h3><hr><br>";
    }
  /* {
        echo "<h3>Conexion Exitosa PHP - MySQL</h3><hr><br>";
        header('Location: https://www.stbmsgingenieria.cl/cotizaciones/Vista/crudusuarios3.php'); 
    } */
         

	/*	 global $gbd;
        
        /* Conectar a una base de datos de MySQL invocando al controlador */
  /*      $dsn = 'mysql:dbname=cst64046_tutoriales;host=127.0.0.1';
        $usuario = 'root';
        $contraseña = '';

        try {
            $gbd = new PDO($dsn, $usuario, $contraseña);
        } catch (PDOException $e) {
            echo 'Falló la conexión: ' . $e->getMessage();
        }     
   * 
   */
?>