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
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>#</th>
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
            <div class="modal-header">
                <button class="close" type="button" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Modal Header</h4>
            </div>
            <div class="modal-body">
                <p>Some text in the model.</p>
            </div>
            <div class="modal-footer">
                <button class="btn btn-default" type="button" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
