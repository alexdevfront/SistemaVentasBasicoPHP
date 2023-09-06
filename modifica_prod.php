<?php include_once('header.php') 

?>
<?php
session_start();
if (!isset($_SESSION['login_estado']) and $_SESSION['login_estado'] != 1){
    header("location: login.php");
    exit;
}
$codigo = $_GET["codigo"];
include_once('includes/acceso.php');
include_once('clases/producto.php');
include_once("clases/proveedor.php");
include_once("clases/categoria.php"); 
$conexion = connect_db();
$oproducto = new Producto();
$oproducto->conectar_db($conexion);
$datos=$oproducto->consulta($codigo);
$oproveedor= new Proveedor();
$oproveedor->conectar_db($conexion);
$datos_prov = $oproveedor->listaproveedor();
$ocategoria= new Categoria();
$ocategoria->conectar_db($conexion);
$datos_cat = $ocategoria->listacat();

?>
<div class="container p-12">
<div class="row">

    <div class="card card-body">
        <form action="modifica_producto.php" method="post">
        <div class="form-group">
        <div class="col-md-4">Codigo:</div>
        <div class="col-md-4">
            <input type="text" name="idproducto" class="form-control" value="<?php echo $codigo;?>" readonly>
            </div>
            <div class="col">
                    <label for="inputPassword" class="col-sm-5 col-form-label">Selecione el Proveedor</label>
                    </div>

                    <select class="form-select" aria-label="Default select example" name="idprov">
                        <?php
                                while ($rcli=mysqli_fetch_array($datos_prov)){                                                              
                                    $id_cli = $rcli['idproveedor'];
                                    $nombre = $rcli['nombreproveedor'];
                                    ?>
                            <option value="<?php echo $id_cli ?>" <?php echo $id_cli===$datos['idproveedor'] ? 'selected' : ''?>><?php echo $nombre; ?></option>
                            <?php } ?>
                        </select>
            <div class="col-md-4">Descripcion:</div>
            <div class="col-md-4">
            <input type="text" name="nom" class="form-control" value="<?php echo $datos['nomproducto'];?>" >
        </div>
        <div class="col-md-4">Unidad medida:</div>
        <div class="col-md-4">
            <input type="text" name="und" class="form-control" value="<?php echo $datos['unimed'];?>">
            </div>
            <div class="col-md-4">Stock:</div>
            <div class="col-md-4">
            <input type="text" name="can" class="form-control" value="<?php echo $datos['stock'];?>">
            </div>
            <div class="col-md-4">Precio Unitario:</div>
            <div class="col-md-4">
            <input type="text" name="pre" class="form-control" value="<?php echo $datos['preuni'];?>">
            </div>
            <div class="col-md-4">Costo Unitario:</div>
            <div class="col-md-4">
            <input type="text" name="cos" class="form-control" value="<?php echo $datos['cosuni'];?>">
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
                                         <option value="<?php echo $id_cli2 ?>" <?php echo $id_cli2===$datos['idcategoria'] ? 'selected' : ''?>><?php echo $nombre2; ?></option>
                             
                                <?php } ?>
                            </select>
                            <div class="col">
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