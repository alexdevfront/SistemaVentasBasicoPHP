<?php include_once('header.php') ?>
<div class="container p-12">
<div class="row">
<div class="col-md-4">
                <div class="card card-body">
                    <form action="agrega_proveedor.php" method="post">
                        <div class="form-group">
                        <input type="text" name="nom" class="form-control" placeholder="Nombre Proveedor" autofocus require>
                        </div>
                        <div class="form-group">
                        <input type="text" name="ruc" class="form-control" placeholder="RUC"  require>
                        </div>
                        <div class="form-group">
                        <input type="text" name="dir" class="form-control" placeholder="Dirección">
                        </div>
                        <div class="form-group">
                        <input type="text" name="telf" class="form-control" placeholder="Telefono">
                        </div>
                        <div class="form-group">
                        <input type="text" name="email" class="form-control" placeholder="Email">
                        </div>
                        <div class="form-group">
                        <input type="submit" class="btn btn-success btn-block" name="envia_datos" value="Enviar">
                        </div>
                    </form>

                </div>

            </div>
            </div>
            </div>  
<?php include_once('footer.php') ?>