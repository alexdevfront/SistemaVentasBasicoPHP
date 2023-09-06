
<?php
session_start();
if (!isset($_SESSION['login_estado']) and $_SESSION['login_estado'] != 1){
    header("location: login.php");
    exit;
}
include_once("header.php");
include_once("includes/acceso.php");

// creacion objetos



?>
<h4>Cambiar Contraseña</h4>
<br>
<div class="container-fluid">
<div class="container">
<form action="cambiar_pass.php" method="POST">
  <div class="row">
    <div class="col-md-4">
    <label for="inputPassword" class="col-sm-2 col-form-label">Usuario</label>
    </div>
    <div class="col-md-4">
    <input class="form-control" type="text" name="idusuario" value="<?php echo $_SESSION['nombres']; ?>" aria-label="readonly input example" readonly>
    </div>
   </div>
   <div class="row">
    <div class="col-md-4">
    <label for="inputPassword" class="col-sm-2 col-form-label">Password</label>
    </div>
    <div class="col-md-4">
    <input class="form-control" type="password" name="nuevopassword"  aria-label="readonly input example" >
    </div>
    <div class="col-md-4 ">
                        <input  type="submit" class="btn btn-primary" name="envia_datos" value="Enviar">
     </div>
   </div>

  </div>
  </div>
  
</form>




