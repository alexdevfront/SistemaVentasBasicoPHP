<?php
include('header.php'); 



if (isset($_POST['envia_datos'])){
    session_start();

    include_once('includes/acceso.php');
    include_once('clases/usuario.php');
    //echo $_SESSION['idusuario'];
    //echo $_SESSION['nombres'];
    //echo $_POST['nuevopassword'];

     $idusuario = $_SESSION['idusuario'];
     $nuevopassword = $_POST['nuevopassword'];
     $conexion = connect_db();
     $ousuario = new Usuario();
     $ousuario->conectar_db($conexion);
    
    $res = $ousuario->cambiar_password($idusuario,$nuevopassword);

    if($res) {
        $_SESSION['mensaje'] = 'contraseña cambiada exitosamente';
         $_SESSION['mensaje_tipo']='success';
        
        header("location: index.php");
    } else
     echo "No se pudo cambiar la contraseña";
    
}
?>