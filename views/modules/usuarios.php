<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Administrar usuarios
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
        <li><a href="#">Administrar usuarios</a></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
            <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarUsuario">
                Agregar usuario
            </button>
        </div>
        <div class="box-body">
            <table class="table table-bordered dt-responsive table-striped tablas">
                <thead>
                    <tr>
                        <th style="width: 10px;">#</th>
                        <th>Nombre</th>
                        <th>Usuario</th>
                        <th>Foto</th>
                        <th>Perfil</th>
                        <th>Estado</th>
                        <th>Último login</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>Usuario Administrador</td>
                        <td>Admin</td>
                        <td><img src="views/img/users/default/anonymous.png" class="img-thumbnail" width="40px" alt="Usuario por defecto"></td>
                        <td>Administrador</td>
                        <td><button class="btn btn-success btn-xs">Activado</button></td>
                        <td>2018-08-10 12:05:03</td>
                        <td>
                            <div class="btn-group">
                                <button class="btn btn-warning"><i class="fa fa-pencil"></i></button>
                                <button class="btn btn-danger"><i class="fa fa-times"></i></button>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>1</td>
                        <td>Usuario Administrador</td>
                        <td>Admin</td>
                        <td><img src="views/img/users/default/anonymous.png" class="img-thumbnail" width="40px" alt="Usuario por defecto"></td>
                        <td>Administrador</td>
                        <td><button class="btn btn-success btn-xs">Activado</button></td>
                        <td>2018-08-10 12:05:03</td>
                        <td>
                            <div class="btn-group">
                                <button class="btn btn-warning"><i class="fa fa-pencil"></i></button>
                                <button class="btn btn-danger"><i class="fa fa-times"></i></button>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>1</td>
                        <td>Usuario Administrador</td>
                        <td>Admin</td>
                        <td><img src="views/img/users/default/anonymous.png" class="img-thumbnail" width="40px" alt="Usuario por defecto"></td>
                        <td>Administrador</td>
                        <td><button class="btn btn-danger btn-xs">Desactivado</button></td>
                        <td>2018-08-10 12:05:03</td>
                        <td>
                            <div class="btn-group">
                                <button class="btn btn-warning"><i class="fa fa-pencil"></i></button>
                                <button class="btn btn-danger"><i class="fa fa-times"></i></button>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->

    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<!--======================================================
MODAL AGREGAR USUARIO
=======================================================-->

<div id="modalAgregarUsuario" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <form role="form" method="post" enctype="multipart/form-data">
                <div class="modal-header" style="background: #3c8dbc; color: #FFF;">
                    <button class="close" type="button" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Agregar usuario</h4>
                </div>
                <div class="modal-body">
                    <div class="box-body">
                        <!--Entrada para el nombre-->
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                <input type="text" class="form-control input-lg" name="nuevoNombre" placeholder="Ingresar nombre" required>
                            </div>
                        </div>
                        <!--Entrada para el usuario-->
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-key"></i></span>
                                <input type="text" class="form-control input-lg" name="nuevoUsuario" placeholder="Ingresar usuario" required>
                            </div>
                        </div>
                        <!--Entrada para el password-->
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                                <input type="password" class="form-control input-lg" name="nuevoPassword" placeholder="Ingresar contraseña" required>
                            </div>
                        </div>
                        <!--Entrada para el seleccionar perfil-->
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-users"></i></span>
                                <select name="nuevoPerfil" class="form-control input-lg">
                                    <option value="">Seleccionar perfil</option>
                                    <option value="Administrador">Administrador</option>
                                    <option value="Especial">Especial</option>
                                    <option value="Vendedor">Vendedor</option>
                                </select>
                            </div>
                        </div>
                        <!--Entrada para el subir foto-->
                        <div class="form-group">
                            <div class="panel">SUBIR FOTO</div>
                            <input type="file" id="nuevaFoto" name="nuevaFoto">
                            <p class="help-block">Peso máximo de la foto 2MB</p>
                            <img src="views/img/users/default/anonymous.png" class="img-thumbnail" width="100px" alt="Foto por defecto">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>
                    <button type="submit" class="btn btn-primary">Guardar usuario</button>
                </div>
                <?php
                    $crearUsuario = new ControllerUsuarios();
                    $crearUsuario -> crtCrearUsuario();
                ?>
            </form>
        </div>
    </div>
</div>
