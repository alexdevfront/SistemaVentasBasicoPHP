<?php
include('header.php'); 

if (isset($_POST['envia_datos'])){
    $nom =strtoupper($_POST['nom']);
 
      
    include_once('includes/acceso.php');
    include_once('clases/categoria.php');
    $conexion = connect_db();
    $ocategoria = new Categoria();
    $ocategoria->conectar_db($conexion);
    
    $res = $ocategoria->agrega_categoria($nom);

    if($res) {
        $_SESSION['mensaje'] = 'Categoria se agrego satisfactoriamente';
        $_SESSION['mensaje_tipo']='success';
        
        header("location: lista_categoria.php");
    } else
    echo "No se pudo agregar al cliente";
    
}
?>