<?php

if (isset($_POST['datos_detalle'])){
    $id = $_POST['idprod'];
    $cant = $_POST['cant'];
    include_once('includes/acceso.php');
    include_once('clases/producto.php');
    include_once('clases/tmp_x.php');
    $conexion = connect_db();
    $oproducto = new Producto();    
    $oproducto->conectar_db($conexion);
    $response = $oproducto->consulta($id);
     $otmp = new Tmp();
     $otmp->conectar_db($conexion);

    $response2= $otmp->agrega_tmp($response['idproducto'],$response['nomproducto'],$response['unimed'],$cant,$response['preuni'],$response['preuni']*$cant);
 
     if($response2) {

         $_SESSION['mensaje'] = 'Empleado agregado satisfactoriamente';
        $_SESSION['mensaje_tipo']='success';
          header("location: registro_ventas.php");
     } else
     echo "No se pudo modificar el producto";
    
}
?>
