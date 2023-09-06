<?php include_once('header.php') ?>
<?php
$codigo = $_GET["codigo"];
include_once('includes/acceso.php');
include_once('clases/usuario.php');
$conexion = connect_db();
$ousuario = new Usuario();
$ousuario->conectar_db($conexion);
$datos=$ousuario->consulta($codigo);

?>
<div class="container p-12">
<div class="row">

    <div class="card card-body">
        <form action="modifica_usuario.php" method="post">
        <div class="form-group">
        <div class="col-md-4">Codigo:</div>
        <div   div class="col-md-4">
            <input type="text" name="idusuario" class="form-control" value="<?php echo $codigo;?>" readonly>
            </div>
            <div class="col-md-4">Nombre de Usuario:</div>
            <div class="col-md-4">
            <input type="text" name="nom" class="form-control" value="<?php echo $datos['nomusuario'];?>" >
            </div>
            <div class="col-md-4">Apellidos:</div>
            <div class="col-md-4">
            <input type="text" name="apell" class="form-control" value="<?php echo $datos['apellidos'];?>" >
            </div>
            <div class="col-md-4">Nombres:</div>
            <div class="col-md-4">
            <input type="text" name="nombre" class="form-control" value="<?php echo $datos['nombres'];?>" >
            </div>
            <div class="col-md-4">Email:</div>
            <div class="col-md-4">
            <input type="text" name="email" class="form-control" value="<?php echo $datos['email'];?>" >
            </div>
            <label for="inputPassword" class="col-sm-8 col-form-label">Estado</label>
                        </div>

                        <select class="form-select" aria-label="Default select example" name="estado">
                        <option value="0">Activo</option>
                        <option value="1">Inactivo</option>
                        </select>
            <div class="col-md-4">
            <input type="submit" class="btn btn-success btn-block" name="envia_datos" value="Enviar">
            </div>
        </form>

    </div>
  </div>
 </div>  
<?php include_once('footer.php') ?>