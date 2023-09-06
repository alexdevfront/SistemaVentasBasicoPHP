<?php
include('header.php'); 

if (isset($_POST['envia_datos'])){
    $id=$_POST['idproveedor'];
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
    
    $response = $oproveedor->modifica_proveedor($id,$nom,$dir,$ruc,$telf,$email);

    if($response) {
        header("location: lista_proveedor.php");
    } else
    echo "No se pudo modificar el producto";
    
}
?>
