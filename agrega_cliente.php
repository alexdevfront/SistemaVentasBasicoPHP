<?php
include('header.php'); 

if (isset($_POST['envia_datos'])){
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
    
    $res = $ocliente->agrega_cliente($nom,$dir,$ruc,$telf,$email);

    if($res) {
        $_SESSION['mensaje'] = 'Cliente agregado satisfactoriamente';
        $_SESSION['mensaje_tipo']='success';
        
        header("location: lista_cliente.php");
    } else
    echo "No se pudo agregar al cliente";
    
}
?>
