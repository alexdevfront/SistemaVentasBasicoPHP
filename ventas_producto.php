<?php
include_once('header.php');

include_once("includes/acceso.php");
include_once("clases/producto.php");
$conexion = connect_db();
$opro = new Producto();
$opro->conectar_db($conexion);
$datos_cli = $opro->listaprodu();


    ?>
    <div class="container p-12">
        <div class="row">
        <div class="container p-4">
            <h4>Ventas por Producto</h4>
            <br>
            <form action="" method="GET">
    
                            <div class="row">                                
                                                  
                                    <select class="form-select" aria-label="Default select example" id="idcli" name="idprod">
                                     ><?php
                                        while ($rcli=mysqli_fetch_array($datos_cli)){
                                            $id_cli = $rcli['idproducto'];
                                            $nombre = $rcli['nomproducto'];        
                                            ?>
                                    <option value="<?php echo $id_cli; ?>"><?php echo $nombre; ?></option>
                                    <?php } ?>
                                    </select>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label><b></b></label> <br>
                                      <button type="submit" class="btn btn-primary">Buscar</button>
                                    </div>
                                </div>
                            </div>
                            <br>
                        </form>
        <div class="card card-body">

            <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Cliente</th>
                    <th>Cantidad</th>
                    <th>Costo Unitario</th> 
                </tr>
            </thead>
            <tbody>
        
    <?php


if(isset($_GET['idprod'])){
    include_once('includes/acceso.php');
include_once('clases/factura.php');

$conexion = connect_db();
$ofactura = new Factura();
$ofactura->conectar_db($conexion);
$datos = $ofactura->ventas_producto($_GET['idprod']);

    while ($row=mysqli_fetch_array($datos)){ 
        $id=$row["idfactura"];
        ?>
                <tr>
                    <td><?php echo $id; ?></td>
                    <td><?php echo $row['nombrecliente']; ?></td>
                    <td><?php echo $row['cant']; ?></td>
                    <td><?php echo $row['cosuni']; ?></td>
                  
                </tr>
             <?php
    }    
    ?>
    </tbody>
   </table>

            </div>

        </div>

    </div>
    
<?php
}

?>