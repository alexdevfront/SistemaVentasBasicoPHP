<?php include_once('header.php') ?>
<?php
$codigo = $_GET["codigo"];
include_once('includes/acceso.php');
include_once('clases/categoria.php');
$conexion = connect_db();
$ocategoria = new Categoria();
$ocategoria->conectar_db($conexion);
$datos=$ocategoria->consulta($codigo);

?>
<div class="container p-12">
<div class="row">

    <div class="card card-body">
        <form action="modifica_categoria.php" method="post">
        <div class="form-group">
        <div class="col-md-4">Codigo:</div>
        <div class="col-md-4">
            <input type="text" name="idcategoria" class="form-control" value="<?php echo $codigo;?>" readonly>
            </div>
            <div class="col-md-4">Nombre del cliente :</div>
            <div class="col-md-4">
            <input type="text" name="nom" class="form-control" value="<?php echo $datos['nomcategoria'];?>" >
        </div>

            <div class="col-md-4">
            <input type="submit" class="btn btn-success btn-block" name="envia_datos" value="Enviar">
            </div>
        </form>

    </div>
  </div>
 </div>  
<?php include_once('footer.php') ?>