<?php
include_once('header.php');
include_once('includes/acceso.php');
include_once('clases/factura.php');
$conexion = connect_db();
$ofactura = new Factura();
$ofactura->conectar_db($conexion);
$datos = $ofactura->stock_productos();
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
                    <th>Producto</th>
                    <th>Cantidad comprada</th>
                    <th>Cantidad vendida</th>
                    <th>Stock</th>    
                    <th>Unit Medida</th>                              
                </tr>
            </thead>
            <tbody>
        
    <?php
    while ($row=mysqli_fetch_array($datos)){
        $id=$row['idproducto'];
        $nomproducto=$row['nomproducto'];
        $cant_compras=$row['cant_compras'];
        $cant_vendidas=$row['cant_vendidas'];
        $stock=$row['stock'];   
        $unimed=$row['unimed'];   
        
        
        ?>
                <tr>
                    <td><?php echo $id; ?></td>
                    <td><?php echo $nomproducto; ?></td>
                    <td><?php echo $cant_compras; ?></td>
                    <td><?php echo $cant_vendidas; ?></td>
                    <td><?php echo $stock; ?></td>
                    <td><?php echo $unimed; ?></td>
    
                    
         
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