<?php
include('header.php'); 

if (isset($_POST['envia_datos'])){
    $nom =strtoupper($_POST['nom']);
    $ruc = strtoupper($_POST['ruc']);
    $dir = $_POST['dir'];
    $telf = strtoupper($_POST['telf']);
    $email = strtolower($_POST['email']);
    
    include_once('includes/acceso.php');
    include_once('clases/proveedor.php');
    $conexion = connect_db();
    $oproveedor = new Proveedor();
    $oproveedor->conectar_db($conexion);
    
    $res = $oproveedor->agrega_proveedor($nom,$ruc,$dir,$telf,$email);

    if($res) {
        $_SESSION['mensaje'] = 'Proveedor agregado satisfactoriamente';
        $_SESSION['mensaje_tipo']='success';
        
        header("location: lista_proveedor.php");
    } else
    echo "No se pudo agregar el Proveedor";
    
}
?>