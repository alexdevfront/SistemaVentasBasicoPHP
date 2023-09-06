

<?php
session_start();
if (!isset($_SESSION['login_estado']) and $_SESSION['login_estado'] != 1){
    header("location: login.php");
    exit;
}
include_once("header.php");
include_once("footer.php");
include_once("clases/cliente.php");
include_once("clases/documento.php");
include_once("clases/producto.php");
include_once("includes/acceso.php");

// creacion objetos
$conexion = connect_db();
$ocli = new Cliente();
$ocli->conectar_db($conexion);
$datos_cli = $ocli->listacli();

$odoc = new Documento();
$odoc->conectar_db($conexion);
$datos_doc = $odoc->listadocu();
$datos_condicionventa = $odoc->listacondicionventa();


?>
<h4>Registro de Ventas</h4>
<div class="container-fluid">
<div class="container">
<form action="" method="POST">
  <div class="row">
    <div class="col">
    <label for="inputPassword" class="col-sm-2 col-form-label">Vendedor</label>
    </div>
    <div class="col">
    <input class="form-control" type="text" name="idusuario" value="<?php echo $_SESSION['nombres']; ?>" aria-label="readonly input example" readonly>
    </div>
    <div class="col">
    <label for="inputPassword" class="col-sm-2 col-form-label">Documento</label>
    </div>
    <div class="col">
    <select class="form-select" name="doc" aria-label="Default select example" >
    <!-- <option selected>Seleccione Documento</option> -->
    <?php
        while ($rdoc=mysqli_fetch_array($datos_doc)){
            $id_doc = $rdoc['idDocumento'];
            $nombre = $rdoc['nombre'];
            ?>
    <option value="<?php echo $id_doc ; ?>"><?php echo $nombre; ?></option>
    <?php } ?>
  </select>
    </div>
    <div class="col">
    <label for="inputPassword" class="col-sm-2 col-form-label">Nro. Documento</label>
    </div>
    <div class="col">
    <input class="form-control" type="text" value="" aria-label="readonly input example" name="nrodocu" readonly>
    </div>
  </div>
  <div class="row">
    <div class="col">
    <label for="inputPassword" class="col-sm-2 col-form-label">Cliente</label>
    </div>
    <div class="col">
    <select class="form-select" aria-label="Default select example" id="idcli" name="idcliente">
  ><?php
        while ($rcli=mysqli_fetch_array($datos_cli)){
            $id_cli = $rcli['idcliente'];
            $nombre = $rcli['nombrecliente'];        
            ?>
    <option value="<?php echo $id_cli; ?>"><?php echo $nombre; ?></option>
    <?php } ?>
  </select>


    </div>
    <div class="col">
    <label for="inputPassword" class="col-sm-2 col-form-label">Tipo Venta</label>
    </div>
    <div class="col">
    <select class="form-select" aria-label="Default select example" id="sel_tipoven" name="sel_tipoven">
    <?php
        while ($rdoc=mysqli_fetch_array($datos_condicionventa)){
            $idcondicion = $rdoc['idcondicion'];
            $nomcondicion = $rdoc['nomcondicion'];
            ?>
    <option value="<?php echo $idcondicion ; ?>"><?php echo $nomcondicion; ?></option>
    <?php } ?>
  
  </select>
    </div>
    <div class="col">
    <label for="inputPassword" class="col-sm-2 col-form-label">Fecha</label>
    </div>
    <div class="col">
    <input class="form-control" type="text" aria-label="readonly input example" id="fecha" name="fecha" value="<?php echo date('d-m-Y'); ?>" readonly>
    </div>
  </div>
  </div>
</form>
  <div class="container">
    <!-- Button trigger modal -->




<?php

include_once('includes/acceso.php');
include_once('clases/tmp_x.php');
$conexion = connect_db();
$otmp = new Tmp();
$otmp->conectar_db($conexion);
$datos = $otmp->lista();
$oprodu = new Producto();
$oprodu->conectar_db($conexion);
$datos_produ = $oprodu->listaprodu();
$dat=$otmp->subtotal();
if ($datos){
    ?>
    <div class="container">
        <div class="row">
        <div class="container">
          <button  class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">Agregar Productos</button>
        </div>
        
        <!-- Modal -->
<div class="modal fade" id="exampleModal"   tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Agregando detalle venta</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
    <div class="modal-body">
    <form action="agrega_detallefactura.php" method="post" >
          <div class="row">
        <div class="col">
        <label for="inputPassword" class="col-sm-12 col-form-label">Producto</label>
        </div>
        <div class="col-sm-6">
        <select class="form-select" aria-label="Default select example"  name="idprod">
        ><?php
              while ($rcli=mysqli_fetch_array($datos_produ)){
                  $id_cli = $rcli['idproducto'];
                  $nomprodu = $rcli['nomproducto'];
                  ?>
        <option value="<?php echo $id_cli; ?>"><?php echo $nomprodu; ?></option>
        <?php } ?>
      </select>

        </div>

        
        <div class="col">
        <label for="inputPassword" class="col-sm-2 col-form-label">Cant</label>
        </div>
        <div class="col">
        <input class="form-control" type="text" name="cant">
        </div> 

          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
            <button type="submit"  name="datos_detalle" value="Enviar" class="btn btn-primary">Agregar</button>
          </div>
          </form>
    </div>
  </div>
</div>

</div>


        <div class="card card-body">
        
            <table class="table table-bordered">
            <thead>
                <tr>
                <th>Nro</th>
                <th>Codigo</th>
                <th>Descripcion</th>
                <th>Unidad</th>
                <th>Cant.</th>
                <th>P.Unit</th>
                <th>Importe</th>
                </tr>
            </thead>
            <tbody>
        
    <?php
    while ($row=mysqli_fetch_array($datos)){
        $nro=$row['nro'];
        $codigo=$row['codigo'];
        $descripcion=$row['descripcion'];
        $unidad=$row['unidad'];
        $cantidad=$row['cantidad'];
        $punit=$row['punit'];
        $importe=$row['importe'];
         ?>
                <tr>
                    <td><?php echo $nro; ?></td>
                    <td><?php echo $codigo; ?></td>
                    <td><?php echo $descripcion; ?></td>
                    <td><?php echo $unidad; ?></td>
                    <td><?php echo $cantidad; ?></td>
                    <td><?php echo $punit; ?></td>
                    <td><?php echo $importe; ?></td>
        
                    <td>
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

<?php

include_once('includes/acceso.php');
include_once('clases/tmp_x.php');
$conexion3 = connect_db();
$otmp3 = new Tmp();
$otmp3->conectar_db($conexion3);
$dat=$otmp3->subtotal();
$float = floatval($dat);
$to=$float *0.18;
$total=$to+$float ;



if ($dat){
  ?>

  <table class="table table-striped">
    <thead>
  
<th align="right">Subtotal</th>
<th align="right">
<input  type="submit" style="width:100; align-text:right;" name="subtotal"  value="<?php echo $dat;?>" >

</th>
    </thead>
    <thead>
<th align="right">IGV</th>
<th align="right">
<input class="form-control"  type="text" style="width:100; align-text:right;" name="igv"  value="1.8"readonly>

</th>
    </thead>
    <thead>
<th align="right">Total Venta</th>
<th align="right">
<input type="text" id="total" style="width:100; align-text:right;" name="total" value="<?php echo $total;?>" readonly>
</th>
    </thead>
</table>

<hr>
<a href="agrega_factura.php"  onclick="extraerdatos()" type="submit"  value="Enviar2" name="btn_registrar" class="btn btn-success">Registrar Venta</a>
<a href="limpiar_fac.php"  type="submit" name="btn_registrar" class="btn btn-success">Limpiar</a>
<a href="index.php" type="button" name="btn_registrar" class="btn btn-success">Salir</a>
</div>
</div>

  <?php
}
?>

<script>
   function hello() {
    alert('Hello');
  }

function extraerdatos() {
var total = document.getElementById("total").value;
var myfecha = document.getElementById("fecha").value;
var idcliente = document.getElementById("idcli");
var idcondicion = document.getElementById("sel_tipoven");
document.cookie = "fecha="+myfecha;
document.cookie = "idcliente="+idcliente.value;
document.cookie = "idcondicion="+idcondicion.value;
document.cookie = "valorventa="+total;
}


</script>






