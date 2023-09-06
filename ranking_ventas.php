<?php
include_once('header.php');
include_once('includes/acceso.php');
include_once('clases/factura.php');
$conexion = connect_db();
$ofactura = new Factura();
$ofactura->conectar_db($conexion);
$datos = $ofactura->ranking_ventas();
if ($datos){
    ?>
    <div class="container p-12">
        <div class="row">
        <div class="container p-4">
        <h4>Ranking de ventas</h4>
        </div>  
        <div class="card card-body">
<!-- para mensajes -->
<?php if(isset($_SESSION['mensaje'])) {?>

    <div class="alert alert-<?php echo $_SESSION['mensaje_tipo'];?> role="alert">
  <?php echo $_SESSION['mensaje']; ?>
  <button type="button" class="btn-close" data-dismiss="alert" aria-label="Close">
    
  </button>
</div>
<?php session_unset(); } ?>

</div>
            <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Cliente</th>
                    <th>Vendedor</th>
                    <th>fecha</th>
                    <th>Valor de Venta</th>                                
                </tr>
            </thead>
            <tbody>
        
    <?php
    while ($row=mysqli_fetch_array($datos)){
        $id=$row['idfactura'];
        $cliente=$row['nombrecliente'];
        $vendedor=$row['nomusuario'];
        $fecha=$row['fecha'];
        $valorventa=$row['valorventa'];   
        
        ?>
                <tr>
                    <td><?php echo $id; ?></td>
                    <td><?php echo $cliente; ?></td>
                    <td><?php echo $vendedor; ?></td>
                    <td><?php echo $fecha; ?></td>
                    <td><?php echo $valorventa; ?></td>
    
                    
         
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