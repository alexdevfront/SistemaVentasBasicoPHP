<?php
include('header.php'); 

if (isset($_POST['envia_datos'])){
    $id=$_POST['idcliente'];
    $nom =strtoupper($_POST['nom']);
    $ruc = strtoupper($_POST['ruc']);
    $dir = $_POST['dir'];
    $telf = strtoupper($_POST['telf']);
    $email = strtolower($_POST['email']);
    
    include_once('includes/acceso.php');
    include_once('clases/cliente.php');
    $conexion = connect_db();
    $ocliente = new Cliente();
    $ocliente->conectar_db($conexion);
    
    $response = $ocliente->modifica_cliente($id,$nom,$dir,$ruc,$telf,$email);

    if($response) {
        header("location: lista_cliente.php");
    } else
    echo "No se pudo modificar el producto";
    
}
?>
