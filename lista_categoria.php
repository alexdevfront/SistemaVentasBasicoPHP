<?php
include_once('header.php');
include_once('includes/acceso.php');
include_once('clases/categoria.php');
$conexion = connect_db();
$ocategoria = new Categoria();
$ocategoria->conectar_db($conexion);
$datos = $ocategoria->listacat();
if ($datos){
    ?>
    <div class="container p-12">
        <div class="row">
        <div class="container p-4">
            <h4>Listado de Categorias...</h4>
        <a href="agrega_cat.php" class="btn btn-info add-new">Nuevo</a>
        </div>  
        <div class="card card-body">

            <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Nombre de Catgeoria</th>
                                    
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
        
    <?php
    while ($row=mysqli_fetch_array($datos)){ 
        $id=$row["idcategoria"];
        ?>
                <tr>
                    <td><?php echo $id; ?></td>
                    <td><?php echo $row['nomcategoria']; ?></td>
                                     
                    <td>
                    <a href="modifica_cat.php?codigo=<?php echo $id; ?>" class="btn btn-info add-new">Modificar</a>   
                    <a href="elimina_cat.php?codigo=<?php echo $id; ?>" class="btn btn-info add-new">Eliminar</a>    
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