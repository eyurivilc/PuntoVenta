<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Administrar categorías
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
            <li><a href="#">Administrar categorías</a></li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="box">
            <div class="box-header with-border">
                <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarCategoria">
                    Agregar categoría
                </button>
            </div>
            <div class="box-body">
                <table class="table table-bordered dt-responsive table-striped tablas">
                    <thead>
                    <tr>
                        <th style="width: 10px;">#</th>
                        <th>Categoría</th>
                        <th>Acciones</th>
                    </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>EQUIPOS ELECTROMECANICOS</td>
                            <td>
                                <div class="btn-group">
                                    <button class="btn btn-warning btnEditarUsuario"><i class="fa fa-pencil"></i></button>
                                    <button class="btn btn-danger btnEliminarUsuario"><i class="fa fa-times"></i></button>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>1</td>
                            <td>EQUIPOS ELECTROMECANICOS</td>
                            <td>
                                <div class="btn-group">
                                    <button class="btn btn-warning btnEditarUsuario"><i class="fa fa-pencil"></i></button>
                                    <button class="btn btn-danger btnEliminarUsuario"><i class="fa fa-times"></i></button>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>1</td>
                            <td>EQUIPOS ELECTROMECANICOS</td>
                            <td>
                                <div class="btn-group">
                                    <button class="btn btn-warning btnEditarUsuario"><i class="fa fa-pencil"></i></button>
                                    <button class="btn btn-danger btnEliminarUsuario"><i class="fa fa-times"></i></button>
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
MODAL AGREGAR CATEGORIA
=======================================================-->

<div id="modalAgregarCategoria" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <form role="form" method="post">
                <!-- Cabeza del modal -->
                <div class="modal-header" style="background: #3c8dbc; color: #FFF;">
                    <button class="close" type="button" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Agregar categoría</h4>
                </div>
                <!-- Cuerpo del modal -->
                <div class="modal-body">
                    <div class="box-body">
                        <!--Entrada para el nombre-->
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-th"></i></span>
                                <input type="text" class="form-control input-lg" id="nuevaCategoria" name="nuevaCategoria" placeholder="Ingresar categoría" required>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>
                    <button type="submit" class="btn btn-primary">Guardar categoría</button>
                </div>
                <?php
                    $crearCategoria = new ControllerCategorias();
                    $crearCategoria -> ctrCrearCategoria();
                ?>
            </form>
        </div>
    </div>
</div>
