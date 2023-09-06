<?php include_once('header.php') ?>
<div class="container p-12">
<div class="row">
<div class="col-md-4">
                <div class="card card-body">
                    <form action="agrega_usuario.php" method="post">
                        <div class="form-group">
                        <input type="text" name="nom" class="form-control" placeholder="Nombre de Usuario" autofocus require>
                        </div>
                        <div class="form-group">
                        <input type="password" name="pass" class="form-control" placeholder="password"  require>
                        </div>
                        <div class="form-group">
                        <input type="text" name="apell" class="form-control" placeholder="Apellidos">
                        </div>
                        <div class="form-group">
                        <input type="text" name="nombre" class="form-control" placeholder="Nombres">
                        </div>
                        <div class="form-group">
                        <input type="text" name="email" class="form-control" placeholder="email">
                        </div>
                        <label for="inputPassword" class="col-sm-8 col-form-label">Estado</label>
                        </div>

                        <select class="form-select" aria-label="Default select example" name="estado">
                        <option value="0">Activo</option>
                        <option value="1">Inactivo</option>
                        </select>
                        <div class="form-group">
                        <input type="submit" class="btn btn-success btn-block" name="envia_datos" value="Enviar">
                        </div>
                    </form>

                </div>

            </div>
            </div>
            </div>  
<?php include_once('footer.php') ?>