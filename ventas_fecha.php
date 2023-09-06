<?php
include_once('header.php');


    ?>
    <div class="container p-12">
        <div class="row">
        <div class="container p-4">
            <h4>Ventas por fecha</h4>
            <br>
            <form action="" method="GET">
    
                            <div class="row">
                                
                                <div class="col-md-4">
                                    
                                    <div class="form-group">
                                        <label><b>Desde</b></label>
                                        <input type="date" name="from_date" value="<?php if(isset($_GET['from_date'])){ echo $_GET['from_date']; } ?>" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label><b> Hasta</b></label>
                                        <input type="date" name="to_date" value="<?php if(isset($_GET['to_date'])){ echo $_GET['to_date']; } ?>" class="form-control">
                                    </div>
                                </div>
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
                    <th>Nombre del Cliente</th>
                    <th>Codicion</th>
                    <th>Valor de Venta</th> 
                </tr>
            </thead>
            <tbody>
        
    <?php


if(isset($_GET['from_date']) && isset($_GET['to_date'])){
    include_once('includes/acceso.php');
include_once('clases/factura.php');
$conexion = connect_db();
$ofactura = new Factura();
$ofactura->conectar_db($conexion);
$fechainicio=date('Y-m-d',strtotime($_GET['from_date']));
$fechaifin=date('Y-m-d',strtotime($_GET['to_date']));
$datos = $ofactura->ventas_fecha($fechainicio,$fechaifin);
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