<?php
session_start();
if (!isset($_SESSION['login_estado']) and $_SESSION['login_estado'] != 1){
    header("location: login.php");
    exit;
}
include_once('header.php');
include_once('includes/acceso.php');
include_once('clases/usuario.php');
$conexion = connect_db();
$ousuario = new Usuario();
$ousuario->conectar_db($conexion);
$datos_usu = $ousuario->lista();
if ($datos_usu){
    ?>
    <div class="container p-12">
        <div class="row">
        <div class="container p-4">
        <a href="agrega_usu.php" class="btn btn-info add-new">Nuevo</a>
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
                    <th>Usuario</th>
                    <th>Apellidos</th>
                    <th>Nombres</th>
                    <th>Email</th>
                    <th>Estado</th>
                    
                </tr>
            </thead>
            <tbody>
        
    <?php
    while ($row=mysqli_fetch_array($datos_usu)){
        $id=$row['idusuario'];
        $nom=$row['nomusuario'];
        $apell=$row['apellidos'];
        $nombre=$row['nombres'];
        $email=$row['email'];
        $estado=$row['estado'];
        
        ?>
                <tr>
                    <td><?php echo $id; ?></td>
                    <td><?php echo $nom; ?></td>
                    <td><?php echo $apell; ?></td>
                    <td><?php echo $nombre; ?></td>
                    <td><?php echo $email; ?></td>
                    <td><?php echo $estado; ?></td>
                    
                    <td>
                    <a href="modifica_usu.php?codigo=<?php echo $id; ?>" class="btn btn-info add-new">Modificar</a>   
                    <a href="elimina_usu.php?codigo=<?php echo $id; ?>" class="btn btn-info add-new">Eliminar</a>    
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