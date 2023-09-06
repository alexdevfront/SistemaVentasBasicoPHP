<?php include_once('header.php') ?>
<?php
$codigo = $_GET["codigo"];
include_once('includes/acceso.php');
include_once('clases/proveedor.php');
$conexion = connect_db();
$oproveedor = new Proveedor();
$oproveedor->conectar_db($conexion);
$datos=$oproveedor->consulta($codigo);

?>
<div class="container p-12">
<div class="row">

    <div class="card card-body">
        <form action="modifica_proveedor.php" method="post">
        <div class="form-group">
        <div class="col-md-4">Codigo:</div>
        <div class="col-md-4">
            <input type="text" name="idproveedor" class="form-control" value="<?php echo $codigo;?>" readonly>
            </div>
            <div class="col-md-4">Nombre del Proveedor :</div>
            <div class="col-md-4">
            <input type="text" name="nom" class="form-control" value="<?php echo $datos['nombreproveedor'];?>" >
        </div>
        <div class="col-md-4">RUC:</div>
        <div class="col-md-4">
            <input type="text" name="ruc" class="form-control" value="<?php echo $datos['rucproveedor'];?>">
            </div>
            <div class="col-md-4">Direccion:</div>
            <div class="col-md-4">
            <input type="text" name="dir" class="form-control" value="<?php echo $datos['dirproveedor'];?>">
            </div>
            <div class="col-md-4">Telefono:</div>
            <div class="col-md-4">
            <input type="text" name="telf" class="form-control" value="<?php echo $datos['telproveedor'];?>">
            </div>
            <div class="col-md-4">Email:</div>
            <div class="col-md-4">
            <input type="text" name="email" class="form-control" value="<?php echo $datos['emailproveedor'];?>">
            </div>
            <div class="col-md-4">
            <input type="submit" class="btn btn-success btn-block" name="envia_datos" value="Enviar">
            </div>
        </form>

    </div>
  </div>
 </div>  
<?php include_once('footer.php') ?>