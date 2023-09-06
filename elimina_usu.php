<?php include_once('header.php') ?>
<?php
$codigo = $_GET["codigo"];
include_once('includes/acceso.php');
include_once('clases/usuario.php');
$conexion = connect_db();
$ousuario = new Usuario();
$ousuario->conectar_db($conexion);
$res=$ousuario->borrar($codigo);
if ($res)
    header("Location: lista_usuario.php");
else
    echo "Error no se pudo eliminar..";

?>
 