<?php
class ControllerCategorias {
    /*==============================
    CREAR CATEGORIAS
    ==============================*/
    static public function ctrCrearCategoria() {
        if (isset($_POST["nuevaCategoria"])) {
            if (preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevaCategoria"])) {
                $tabla = "categorias";
                $datos = $_POST["nuevaCategoria"];
                $respuesta = ModelsCategorias::mdlIngresarCategoria($tabla, $datos);
                if ($respuesta == "ok") {
                    echo '<script>
                        swal({
                            type: "success",
                            title: "¡La categoría ha sido guardada correctamente!",
                            showConfirmButton: true,
                            confirmButtonText: "Cerrar"
                        }).then((resultado) => {
                            if (resultado.value) {
                                window.location = "categorias";
                            } 
                        })
                    </script>';
                }
            } else {
                echo '<script>
                    swal({
                        type: "error",
                        title: "¡La categoría no puede ir vacía o llevar caracteres especiales!",
                        showConfirmButton: true,
                        confirmButtonText: "Cerrar",
                    }).then((resultado) => {
                        if (resultado.value) {
                            window.location = "categorias";
                        } 
                    })
                </script>';
            }
        }
    }

    /*==============================
    MOSTRAR CATEGORIAS
    ==============================*/
    static public function ctrMostrarCategorias($item, $valor) {
        $tabla = "categorias";
        $respuesta = ModelsCategorias::mdlMostrarCategorias($tabla, $item, $valor);
        return $respuesta;
	}
	
	/*==============================
    EDITAR CATEGORIAS
    ==============================*/
    static public function ctrEditarCategoria() {
        if (isset($_POST["editarCategoria"])) {
            if (preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarCategoria"])) {
                $tabla = "categorias";
				$datos = array("categoria" => $_POST["editarCategoria"],
								"id" => $_POST["idCategoria"]);
                $respuesta = ModelsCategorias::mdlEditarCategoria($tabla, $datos);
                if ($respuesta == "ok") {
                    echo '<script>
                        swal({
                            type: "success",
                            title: "¡La categoría ha sido cambiada correctamente!",
                            showConfirmButton: true,
                            confirmButtonText: "Cerrar"
                        }).then((resultado) => {
                            if (resultado.value) {
                                window.location = "categorias";
                            } 
                        })
                    </script>';
                }
            } else {
                echo '<script>
                    swal({
                        type: "error",
                        title: "¡La categoría no puede ir vacía o llevar caracteres especiales!",
                        showConfirmButton: true,
                        confirmButtonText: "Cerrar",
                    }).then((resultado) => {
                        if (resultado.value) {
                            window.location = "categorias";
                        } 
                    })
                </script>';
            }
        }
    }
}