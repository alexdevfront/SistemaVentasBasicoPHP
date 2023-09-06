<?php
session_start();
include('header.php'); 
// echo  $_SESSION['idusuario'];
// echo  $_COOKIE['fecha'];
// echo  $_COOKIE['idcliente'];
// echo  $_COOKIE['idcondicion'];
// echo  $_COOKIE['valorventa'];
echo $_SESSION['id_factura'];

$fecha=date('Y-m-d',strtotime($_COOKIE['fecha']));
$idcliente=$_COOKIE['idcliente'];
$idusuario=$_SESSION['idusuario'];
$fecharegistro=date('Y-m-d',strtotime($_COOKIE['fecha']));
$idcondicion=$_COOKIE['idcondicion'];
$valorventa=$_COOKIE['valorventa'];
$igv=18;

include_once('includes/acceso.php');
include_once('clases/tmp_x.php');
include_once('clases/factura.php');
$conexion = connect_db();
$otmp = new Tmp();
$otmp->conectar_db($conexion);
$datos = $otmp->lista();
$ofactura = new Factura();
$ofactura->conectar_db($conexion);

$ofactura->agrega_factura($fecha,$idcliente,$idusuario,$fecharegistro,$idcondicion,$valorventa,$igv=18);

$idfactura=$_SESSION['id_factura'];
//echo  $_SESSION['id_factura'];

while ($row=mysqli_fetch_array($datos)){
   $ofactura->agrega_detalle($idfactura,$row['codigo'],$row['cantidad'],$row['punit']);
}
$response=$otmp->borrar();

 if( $response) {
   $_SESSION['mensaje'] = 'Factura agregada satisfactoriamente';
   $_SESSION['mensaje_tipo']='success';
   //$_COOKIE['fecha']="";
   //$_COOKIE['idcliente']="";
   //$_COOKIE['fecha']="";
  // $_COOKIE['idcondicion']="";
  // $_COOKIE['valorventa']="";
  // $_SESSION['id_factura']="";

  
   header("location: registro_ventas.php");
 } else
 echo "No se pudo agregar el producto";


 header("location: registro_ventas.php");
   
?>
