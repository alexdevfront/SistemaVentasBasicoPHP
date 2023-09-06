<?php
session_start();
if (!isset($_SESSION['login_estado']) and $_SESSION['login_estado'] != 1){
    header("location: login.php");
    exit;
}
include_once('header.php');
include_once('includes/acceso.php');
include_once('clases/proveedor.php');
$conexion = connect_db();
$oproveedor = new Proveedor();
$oproveedor->conectar_db($conexion);
$datos= $oproveedor->listaproveedor();
if ($datos){
    ?>
    <div class="container p-12">
        <div class="row">
        <div class="container p-4">
        <h4>Listado de Proveedores...</h4>
        <a href="agrega_prov.php" class="btn btn-info add-new">Nuevo</a>
        </div>  
        <div class="card card-body">
        
            <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Nombre de Proveedor</th>
                    <th>Ruc</th>
                    <th>Dirección</th>
                    <th>Telefono</th>
                    <th>Email</th>                    
                </tr>
            </thead>
            <tbody>
        
    <?php
    while ($row=mysqli_fetch_array($datos)){
        $id=$row['idproveedor'];
        $nom=$row['nombreproveedor'];
        $und=$row['rucproveedor'];
        $can=$row['dirproveedor'];
        $pre=$row['telproveedor'];
        $cos=$row['emailproveedor'];
        ?>
                <tr>
                    <td><?php echo $id; ?></td>
                    <td><?php echo $nom; ?></td>
                    <td><?php echo $und; ?></td>
                    <td><?php echo $can; ?></td>
                    <td><?php echo $pre; ?></td>
                    <td><?php echo $cos; ?></td>
                    <td>
                    <a href="modifica_prov.php?codigo=<?php echo $id; ?>" class="btn btn-info add-new">Modificar</a>   
                    <a href="elimina_prov.php?codigo=<?php echo $id; ?>" class="btn btn-info add-new">Eliminar</a>    
                    </td>
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