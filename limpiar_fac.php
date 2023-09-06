<?php
    include_once('includes/acceso.php');
    include_once('clases/tmp_x.php');
    $conexion = connect_db();
    $otmp = new Tmp();
    $otmp->conectar_db($conexion);
    
    $otmp->borrar();
    header("location: registro_ventas.php");
       



   
   

?>