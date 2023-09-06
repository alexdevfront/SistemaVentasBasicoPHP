<?php

if (isset($_POST['envia_login'])){
   
    $nom = $_POST['usua'];
    $pass = $_POST['pass'];
    
    include_once('includes/acceso.php');
    include_once('clases/usuario.php');
    $conexion = connect_db();
    $oempleado = new Usuario();
    $oempleado->conectar_db($conexion);
    
    $res = $oempleado->lee_datos($nom);
    
    if($res) {
        // aqui validamos las credenciales
        $usuario = $res["nomusuario"];
        $clave = $res["password"];
        
        if (password_verify($pass,$clave)) {
            //echo "acceso correcto";
            session_start();
            $_SESSION['nombres'] = $res["nombres"];
            $_SESSION['idusuario']= $res["idusuario"];
            $_SESSION['login_estado'] = 1;
            header("location: index.php");
        } else
               header("location: login.php");
       

    }else
          header("location: login.php");

   
   
}
?>