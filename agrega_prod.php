<?php 
session_start();
if (!isset($_SESSION['login_estado']) and $_SESSION['login_estado'] != 1){
    header("location: login.php");
    exit;
}
include_once('header.php');
include_once("footer.php");
include_once("clases/proveedor.php");
include_once("clases/categoria.php"); 
include_once("includes/acceso.php");
$conexion = connect_db();
$oproveedor= new Proveedor();
$oproveedor->conectar_db($conexion);
$datos_prov = $oproveedor->listaproveedor();
$ocategoria= new Categoria();
$ocategoria->conectar_db($conexion);
$datos_cat = $ocategoria->listacat();
?>

<div class="container p-12">
<div class="row">
<div class="col-md-4">
                <div class="card card-body">
                    <form action="agrega_producto.php" method="post">
                    <div class="col">
                    <label for="inputPassword" class="col-sm-8 col-form-label">Selecione el Proveedor</label>
                    </div>

                    <select class="form-select" aria-label="Default select example" name="idprov">
                        <?php
                                while ($rcli=mysqli_fetch_array($datos_prov)){
                                    $id_cli = $rcli['idproveedor'];
                                    $nombre = $rcli['nombreproveedor'];
                                    ?>
                            <option value="<?php echo $id_cli; ?>"><?php echo $nombre; ?></option>
                            <?php } ?>
                        </select>
                        <div class="form-group">
                        <input type="text" name="nom" class="form-control" placeholder="Nombre producto" autofocus>
                        </div>
                        <div class="form-group">
                        <input type="text" name="und" class="form-control" placeholder="Unidad">
                        </div>
                        <div class="form-group">
                        <input type="text" name="can" class="form-control" placeholder="Cantidad">
                        </div>
                        <div class="form-group">
                        <input type="text" name="pre" class="form-control" placeholder="Precio Unitario">
                        </div>
                        <div class="form-group">
                        <input type="text" name="cos" class="form-control" placeholder="Costo Unitario">
                        </div>
        
                        <div class="col">
                        <label for="inputPassword" class="col-sm-8 col-form-label">Selecione el categoria</label>
                        </div>

                        <select class="form-select" aria-label="Default select example" name="idcat">
                            <?php
                                    while ($rcli2=mysqli_fetch_array($datos_cat)){
                                        $id_cli2 = $rcli2['idcategoria'];
                                        $nombre2 = $rcli2['nomcategoria'];
                                        ?>
                                <option value="<?php echo $id_cli2; ?>"><?php echo $nombre2; ?></option>
                                <?php } ?>
                            </select>
                        <div class="col">
                        <label for="inputPassword" class="col-sm-8 col-form-label">Estado</label>
                        </div>

                        <select class="form-select" aria-label="Default select example" name="estado">
                        <option value="0">Activo</option>
                        <option value="1">Inactivo</option>
                        </select>
                        <div class="form-group">
                        <input type="submit" class="btn btn-success btn-block" name="envia_datos" value="Enviar">
                        </div>
                    </form>

                </div>

            </div>
            </div>
            </div>  
<?php include_once('footer.php') ?>