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
					<?php
				$item = null;
				$valor = null;
				$categorias = ControllerCategorias::ctrMostrarCategorias($item, $valor);
				foreach ($categorias as $key => $value) {
					echo '
                                <tr>
                                    <td>' . ($key + 1) . '</td>
                                    <td class="text-uppercase">' . $value["categoria"] . '</td>
                                    <td>
                                        <div class="btn-group">
                                            <button class="btn btn-warning btnEditarCategoria" idCategoria="' . $value["id"] . '" data-toggle="modal" data-target="#modalEditarCategoria"><i class="fa fa-pencil"></i></button>
                                            <button class="btn btn-danger btnEliminarCategoria" idCategoria="' . $value["id"] . '"><i class="fa fa-times"></i></button>
                                        </div>
                                    </td>
                                </tr>
							';
				} ?>
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
															$crearCategoria->ctrCrearCategoria();
															?>
			</form>
        </div>
    </div>
</div>

<!--======================================================
MODAL EDITAR CATEGORIA
=======================================================-->

<div id="modalEditarCategoria" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <form role="form" method="post">
                <!-- Cabeza del modal -->
                <div class="modal-header" style="background: #3c8dbc; color: #FFF;">
                    <button class="close" type="button" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Editar categoría</h4>
                </div>
                <!-- Cuerpo del modal -->
                <div class="modal-body">
                    <div class="box-body">
                        <!--Entrada para el nombre-->
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-th"></i></span>
                                <input type="text" class="form-control input-lg" id="editarCategoria" name="editarCategoria" required>
                                <input type="hidden" id="idCategoria" name="idCategoria" required>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>
                    <button type="submit" class="btn btn-primary">Guardar cambios</button>
                </div>
				<?php
			$editarCategoria = new ControllerCategorias();
			$editarCategoria->ctrEditarCategoria();
			?>
            </form>
        </div>
    </div>
</div>
<?php
$borrarCategoria = new ControllerCategorias();
$borrarCategoria->ctrBorrarCategoria();
?>
