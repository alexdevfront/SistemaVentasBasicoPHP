<?php
include_once('header.php');
include_once('includes/acceso.php');
include_once('clases/factura.php');
$conexion = connect_db();
$ofactura = new Factura();
$ofactura->conectar_db($conexion);
$fecha=date('d-m-Y');
$ofecha=date('Y-m-d',strtotime($fecha));
$datos = $ofactura->ventas_dia($ofecha);

if ($datos){
    ?>
    <div class="container p-12">
        <div class="row">
        <div class="container p-4">
            <h4>Ventas por dia</h4>
            <input class="form-control" type="text" aria-label="readonly input example" id="fecha" name="fecha" value="<?php echo date('d-m-Y'); ?>" readonly>
        </div>  
        <div class="card card-body">

            <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Nombre del Cliente</th>
                    <th>Codicion</th>
                    <th>Valor de Venta</th>                                 
                </tr>
            </thead>
            <tbody>
        
    <?php
    while ($row=mysqli_fetch_array($datos)){ 
        $id=$row["idfactura"];
        ?>
                <tr>
                    <td><?php echo $id; ?></td>
                    <td><?php echo $row['nombrecliente']; ?></td>
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