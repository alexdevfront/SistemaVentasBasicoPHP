<?php
include('header.php'); 

if (isset($_POST['envia_datos'])){
    $id=$_POST['idcategoria'];
    $nom =strtoupper($_POST['nom']);

    
    include_once('includes/acceso.php');
    include_once('clases/categoria.php');
    $conexion = connect_db();
    $ocategoria = new Categoria();
    $ocategoria->conectar_db($conexion);
    
    $response = $ocategoria->modifica_categoria($id,$nom);

    if($response) {
        header("location: lista_categoria.php");
    } else
    echo "No se pudo modificar el producto";
    
}
?>
