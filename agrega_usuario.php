<?php
include('header.php'); 

if (isset($_POST['envia_datos'])){
    $nom =strtoupper($_POST['nom']);
     $pass = $_POST['pass'];
     $apell = strtoupper($_POST['apell']);
     $nombre = strtoupper($_POST['nombre']);
     $email = strtolower($_POST['email']);
     $estado = $_POST['estado'];          

    include_once('includes/acceso.php');
    include_once('clases/usuario.php');
    $conexion = connect_db();
    $ousuario = new Usuario();
    $ousuario->conectar_db($conexion);
    
    $res = $ousuario->agrega_usuario($nom,$pass,$apell,$nombre,$email,$estado);

    if($res) {
        $_SESSION['mensaje'] = 'Empleado agregado satisfactoriamente';
        $_SESSION['mensaje_tipo']='success';
        
        header("location: lista_usuario.php");
    } else
    echo "No se pudo agregar el producto";
    
}
?>