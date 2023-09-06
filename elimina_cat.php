<?php include_once('header.php') ?>
<?php
$codigo = $_GET["codigo"];
include_once('includes/acceso.php');
include_once('clases/categoria.php');
$conexion = connect_db();
$ocategoria = new Categoria();
$ocategoria->conectar_db($conexion);
$res=$ocategoria->borrar($codigo);
if ($res)
    header("Location: lista_categoria.php");
else
    echo "Error no se pudo eliminar..";

?>
 