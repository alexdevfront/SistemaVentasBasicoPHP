<?php
include('header.php'); 

if (isset($_POST['envia_datos'])){
    $id=$_POST['idusuario'];
    $nom =strtoupper($_POST['nom']);
    $apell = strtoupper($_POST['apell']);
    $nombre = strtoupper($_POST['nombre']);
    $email = strtolower($_POST['email']);
    $estado = $_POST['estado'];   
    
    include_once('includes/acceso.php');
    include_once('clases/usuario.php');
    $conexion = connect_db();
    $ousuario = new Usuario();
    $ousuario->conectar_db($conexion);
    
    $response = $ousuario->modifica_usuario($id,$nom,$apell,$nombre,$email,$estado);

    if($response) {
        header("location: lista_usuario.php");
    } else
    echo "No se pudo modificar el usuario";
    
}
?>
