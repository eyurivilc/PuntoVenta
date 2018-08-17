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
                <?php
                    $item = null;
                    $valor = null;
                    $usuarios = ControllerUsuarios::ctrMostrarUsuarios($item, $valor);

                    foreach ($usuarios as $key => $value) {
                        echo '
                        <tr>
                            <td>'.$value["id"].'</td>
                            <td>'.$value["nombre"].'</td>
                            <td>'.$value["usuario"].'</td>
                        ';
                        if ($value["foto"] != "") {
                            echo '<td><img src="'.$value["foto"].'" class="img-thumbnail" width="40px" alt="Usuario por defecto"></td>';
                        } else {
                            echo '<td><img src="views/img/users/default/anonymous.png" class="img-thumbnail" width="40px" alt="Usuario por defecto"></td>';
                        }

                        echo '<td>'.$value["perfil"].'</td>';
                        if ($value["estado"] != 0) {
                            echo '<td><button class="btn btn-success btn-xs btnActivar" idUsuario="'.$value["id"].'" estadoUsuario="0">Activado</button></td>';
                        } else {
                            echo '<td><button class="btn btn-danger btn-xs btnActivar" idUsuario="'.$value["id"].'" estadoUsuario="1">Desactivado</button></td>';
                        }
                        echo '
                            <td>'.$value["ultimo_login"].'</td>
                            <td>
                                <div class="btn-group">
                                    <button class="btn btn-warning btnEditarUsuario" idUsuario="'.$value["id"].'" data-toggle="modal" data-target="#modalEditarUsuario"><i class="fa fa-pencil"></i></button>
                                    <button class="btn btn-danger"><i class="fa fa-times"></i></button>
                                </div>
                            </td>
                        </tr>
                        ';
                    }
                ?>
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
                                <input type="text" class="form-control input-lg" name="nuevoUsuario" id="nuevoUsuario" placeholder="Ingresar usuario" required>
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
                            <input type="file" class="nuevaFoto" name="nuevaFoto">
                            <p class="help-block">Peso máximo de la foto 2MB</p>
                            <img src="views/img/users/default/anonymous.png" class="img-thumbnail previsualizar" width="100px" alt="Foto por defecto">
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

<!--======================================================
MODAL EDITAR USUARIO
=======================================================-->

<div id="modalEditarUsuario" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <form role="form" method="post" enctype="multipart/form-data">
                <div class="modal-header" style="background: #3c8dbc; color: #FFF;">
                    <button class="close" type="button" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Editar usuario</h4>
                </div>
                <div class="modal-body">
                    <div class="box-body">
                        <!--Editar para el nombre-->
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                <input type="text" class="form-control input-lg" id="editarNombre" name="editarNombre" value="" required>
                            </div>
                        </div>
                        <!--Editar para el usuario-->
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-key"></i></span>
                                <input type="text" class="form-control input-lg" id="editarUsuario" name="editarUsuario" value="" readonly>
                            </div>
                        </div>
                        <!--Editar para el password-->
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                                <input type="password" class="form-control input-lg" name="editarPassword" placeholder="Escriba la nueva contraseña">
                                <input type="hidden" id="passwordActual" name="passwordActual">
                            </div>
                        </div>
                        <!--Editar para el seleccionar perfil-->
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-users"></i></span>
                                <select name="editarPerfil" class="form-control input-lg">
                                    <option value="" id="editarPerfil"></option>
                                    <option value="Administrador">Administrador</option>
                                    <option value="Especial">Especial</option>
                                    <option value="Vendedor">Vendedor</option>
                                </select>
                            </div>
                        </div>
                        <!--Editar para el subir foto-->
                        <div class="form-group">
                            <div class="panel">SUBIR FOTO</div>
                            <input type="file" class="nuevaFoto" name="editarFoto">
                            <p class="help-block">Peso máximo de la foto 2MB</p>
                            <img src="views/img/users/default/anonymous.png" class="img-thumbnail previsualizar" width="100px" alt="Foto por defecto">
                            <input type="hidden" id="fotoActual" name="fotoActual">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>
                    <button type="submit" class="btn btn-primary">Modificar usuario</button>
                </div>
                <?php
                    $editarUsuario = new ControllerUsuarios();
                    $editarUsuario -> crtEditarUsuario();
                ?>
            </form>
        </div>
    </div>
</div>
