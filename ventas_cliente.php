<?php
include_once('header.php');

include_once("includes/acceso.php");
include_once("clases/cliente.php");
$conexion = connect_db();
$ocli = new Cliente();
$ocli->conectar_db($conexion);
$datos_cli = $ocli->listacli();


    ?>
    <div class="container p-12">
        <div class="row">
        <div class="container p-4">
            <h4>Ventas por Cliente</h4>
            <br>
            <form action="" method="GET">
    
                            <div class="row">                                
                                                  
                                    <select class="form-select" aria-label="Default select example" id="idcli" name="idcliente">
                                     ><?php
                                        while ($rcli=mysqli_fetch_array($datos_cli)){
                                            $id_cli = $rcli['idcliente'];
                                            $nombre = $rcli['nombrecliente'];        
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
                    <th>vendedor</th>
                    <th>Codicion</th>
                    <th>Valor de Venta</th> 
                </tr>
            </thead>
            <tbody>
        
    <?php


if(isset($_GET['idcliente'])){
    include_once('includes/acceso.php');
include_once('clases/factura.php');

$conexion = connect_db();
$ofactura = new Factura();
$ofactura->conectar_db($conexion);
$datos = $ofactura->ventas_cliente($_GET['idcliente']);

    while ($row=mysqli_fetch_array($datos)){ 
        $id=$row["idfactura"];
        ?>
                <tr>
                    <td><?php echo $id; ?></td>
                    <td><?php echo $row['nomusuario']; ?></td>
                    <td><?php echo $row['nomcondicion']; ?></td>
                    <td><?php echo $row['valorventa']; ?></td>
                  
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