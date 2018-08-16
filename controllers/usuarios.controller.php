<?php

class ControllerUsuarios{
	/*==================================
	INGRESO DE USUARIO
	==================================*/

	static public function ctrIngresoUsuario() {

		if(isset($_POST["ingUsuario"])) {

			if( preg_match('/^[a-zA-Z0-9]+$/', $_POST["ingUsuario"]) &&
				preg_match('/^[a-zA-Z0-9]+$/', $_POST["ingPassword"])) {

					$tabla = "usuarios";

					$item = "usuario";
					$valor = $_POST["ingUsuario"];

					$respuesta = ModelsUsuarios::MdlMostrarUsuarios($tabla, $item, $valor);

					// Trae el array de la DB
					//var_dump($respuesta["usuario"]);

                    // Validar si usuario se loguea correctamente
					if ($respuesta["usuario"] == $_POST["ingUsuario"] && $respuesta["password"] == $_POST["ingPassword"]) {
                        //echo '<br><div class="alert alert-success">Bienvenido al sistema.</div>';
                        $_SESSION["iniciarSesion"] = "ok";
                        echo '
                                <script>
                                    window.location = "inicio";
                                </script>
                        ';
                    } else {
					    echo '<br><div class="alert alert-danger">Error al ingresar, vuelve a intentarlo</div>';
                    }

				}
		}
	}

    /*==================================
    REGISTRO DE USUARIO
    ==================================*/
    static public function crtCrearUsuario() {
        if (isset($_POST["nuevoUsuario"])) {
            if (preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevoNombre"]) &&
                preg_match('/^[a-zA-Z0-9]+$/', $_POST["nuevoUsuario"]) &&
                preg_match('/^[a-zA-Z0-9]+$/', $_POST["nuevoPassword"])) {

                $tabla = "usuarios";
                $datos = array( "nombre" => $_POST["nuevoNombre"],
                                "usuario" => $_POST["nuevoUsuario"],
                                "password" => $_POST["nuevoPassword"],
                                "perfil" => $_POST["nuevoPerfil"]);

                $respuesta = ModelsUsuarios::mdlIngresarUsuario($tabla, $datos);

                if ($respuesta == "ok"){
                    echo '<script>
                        swal({
                            type: "success",
                            title: "¡El usuario ha sido guardado correctamente!",
                            showConfirmButton: true,
                            confirmButtonText: "Cerrar"                        
                        }).then((resultado) => {
                            if (resultado.value){
                                window.location = "usuarios";
                            } 
                        })
                    </script>';
                }
            } else {
                echo '<script>
                    swal({
                        type: "error",
                        title: "¡El usuario no puede ir vacío o llevar caracteres especiales!",
                        showConfirmButton: true,
                        confirmButtonText: "Cerrar"                        
                    }).then((resultado) => {
                        if (resultado.value){
                            window.location = "usuarios";
                        } 
                    })
                </script>';
            }
        }
    }
}